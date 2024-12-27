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

class DashboardController extends Controller
{
    public function index()
    {
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
        ));
    }
}
