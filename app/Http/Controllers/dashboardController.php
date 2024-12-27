<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\employeeModel;
use App\Models\leavesModel;
use App\Models\jobModel;
use App\Models\payrollModel;
use App\Models\departmentModel;
use App\Models\performanceModel;
use App\Models\attendanceModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        //ADMIN
        // Basic Stats
        $totalEmployees = employeeModel::count();
        $pendingLeaves = leavesModel::where('leave_status', 'pending')->count();

        // Additional Stats
        $totalJobs = jobModel::count(); // Total active jobs
        $totalPayroll = payrollModel::sum('payroll_amount'); // Total payroll
        $activeEmployees = employeeModel::where('status', 'active')->count(); // Active departments
        $totalDepartments = departmentModel::count();
        $totalPerformance = performanceModel::avg('review_score'); // Total performance score

        $today = Carbon::today()->toDateString(); // Get today's date
        $employeesLoggedInToday = attendanceModel::whereDate('attendance_date', $today)
            ->distinct('employee_id')
            ->count('employee_id'); // Count unique employees logged in today

        // In your controller
        $maleEmployees = employeeModel::where('gender', 'male')->count();
        $femaleEmployees = employeeModel::where('gender', 'female')->count();

        // Calculating the gender ratio (if applicable)
        $genderRatio = $maleEmployees > 0 && $femaleEmployees > 0
            ? round($maleEmployees / $femaleEmployees, 2) . ':1'
            : 'N/A'; // In case one of the genders is not present



        //USER
        $user = Auth::user();

        $employeeuser = employeeModel::where('user_id', $user->id)->pluck('employee_id');

        //leaves
        $leaveusercount = leavesModel::where('employee_id', $employeeuser)->count();

        $leaveuserstatuspendingcount = leavesModel::where('leave_status', 'Pending')
            ->whereIn('employee_id', $employeeuser)
            ->count();

        $leaveuserstatusapprovedcount = leavesModel::where('leave_status', 'Approved')
            ->whereIn('employee_id', $employeeuser)
            ->count();

        $leaveuserstatusrejectedcount = leavesModel::where('leave_status', 'Rejected')
            ->whereIn('employee_id', $employeeuser)
            ->count();

        //$payroll
        $salaryuserstatuspendingcount = payrollModel::where('payroll_status', 'Pending')
        ->whereIn('employee_id', $employeeuser)
        ->count();
        $salaryuserstatuscompletedcount = payrollModel::where('payroll_status', 'Completed')
        ->whereIn('employee_id', $employeeuser)
        ->count();
        $salaryuserstatuscancelledcount = payrollModel::where('payroll_status', 'Cancelled')
        ->whereIn('employee_id', $employeeuser)
        ->count();

        //salaries
        $salaryuser = payrollModel::whereIn('employee_id', $employeeuser)
        ->sum('payroll_amount');
        $salaryuseraverage = payrollModel::whereIn('employee_id', $employeeuser)
        ->avg('payroll_amount');

        //performance
        $totaluserreviews = performanceModel::whereIn('employee_id', $employeeuser)
        ->count();
        $averageuserperformance = performanceModel::whereIn('employee_id', $employeeuser)
        ->avg('review_score');

        return view('dashboard', compact(
            'totalEmployees',
            'pendingLeaves',
            'totalJobs',
            'totalPayroll',
            'activeEmployees',
            'totalPerformance',
            'employeesLoggedInToday',
            'maleEmployees',
            'femaleEmployees',
            'genderRatio',
            'totalDepartments',
            'leaveusercount',
            'leaveuserstatuspendingcount',
            'leaveuserstatusapprovedcount',
            'leaveuserstatusrejectedcount',
            'salaryuser',
            'salaryuseraverage',
            'totaluserreviews',
            'averageuserperformance',
            'salaryuserstatuspendingcount',
            'salaryuserstatuscompletedcount',
            'salaryuserstatuscancelledcount'
            

        ));
    }
}


