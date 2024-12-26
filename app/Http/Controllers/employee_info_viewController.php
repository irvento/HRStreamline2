<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\employee_user_viewModel;
use App\Models\employee_info_viewModel;

use App\Models\User;
use App\Models\employee_infoModel;
use App\Models\departmentModel;
use App\Models\employeeModel;
use App\Models\Salary;
use App\Models\attendanceModel;
use App\Models\leavesModel;
use App\Models\payrollModel;
use App\Models\performanceModel;


class employee_info_viewController extends Controller
{
    //  public function index(Request $request)
    //   {




    // Fetch other data
    //    $reports = employee_info_viewModel::all();
    //     $employeeuser = employee_user_viewModel::all();
    //     $users = User::all();
    //      $employeeinfo = employee_infoModel::all();
    //       $departments = departmentModel::all();
    // //      $employees = employeeModel::all();
    //      $salary = Salary::all();
    //      $leaves = leavesModel::all();
    //      $jobs = jobModel::all();
    //       $performances = performanceModel::all();
//
    //    return view('report', [
    //         'reports' => $reports,
    //          'employeeuser' => $employeeuser,
    //          'users' => $users,
    //         'employeeinfo' => $employeeinfo,
    //         'departments' => $departments,
    //           'employees' => $employees,
    //       'salary' => $salary,
//
    //        'leaves' => $leaves,
    //         'jobs' => $jobs,
    //          'performances' => $performances,
//
    //      ]);


    // }
    public function index()
    {
        return view('reports.index');
    }



    //ATTENDANCE REPORTS
    public function attendance(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $searchQuery = $request->input('search');
    
        // Initialize the query
        $attendance = attendanceModel::query();
    
        // Apply date range filter if start and end dates are provided
        if ($startDate && $endDate) {
            // Ensure the date format is consistent, adjust as necessary
            $attendance->whereBetween('attendance_date', [
                $startDate,
                $endDate
            ]);
        }
    
        // Apply search filter if there's a search query
        if ($searchQuery) {
            $attendance->where(function($query) use ($searchQuery) {
                $query->where('attendance_id', 'like', "%{$searchQuery}%")
                      ->orWhere('employee_id', 'like', "%{$searchQuery}%");
            });
        }
    
        // Execute the query to fetch the filtered attendance records
        $attendance = $attendance->get();
    
        // Return the view with the filtered attendance data
        return view('reports.attendance', compact('attendance', 'startDate', 'endDate', 'searchQuery'));
    }
    


    //LEAVES REPORTS
    public function leaves(Request $request)
    {
        $searchQuery = $request->input('search');

        $leaves = leavesModel::query()
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where('employee_id', 'like', "%{$searchQuery}%", );
            })
            ->orWhere('leave_id', 'like', "%{$searchQuery}%")
            ->orWhere('start_date', 'like', "%{$searchQuery}%")
            ->orWhere('end_date', 'like', "%{$searchQuery}%")
            ->orWhere('leave_status', 'like', "%{$searchQuery}%")

            ->get();

        return view('reports.leaves', compact('leaves', 'searchQuery'));
    }



    //EMPLOYEE DIRECTORY REPORTS
    public function employeeDirectory(Request $request)
    {
        $searchQuery = $request->input('search');

        $employees = employee_info_viewModel::query()
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where('employee_id', 'like', "%{$searchQuery}%", );
            })
            ->orWhere('employee_id', 'like', "%{$searchQuery}%")
            ->orWhere('full_name', 'like', "%{$searchQuery}%")
            ->orWhere('full_address', 'like', "%{$searchQuery}%")
            ->orWhere('contact1', 'like', "%{$searchQuery}%")
            ->orWhere('employee_email', 'like', "%{$searchQuery}%")
            ->orWhere('department_id', 'like', "%{$searchQuery}%")
            ->orWhere('department_name', 'like', "%{$searchQuery}%")
            ->orWhere('job_id', 'like', "%{$searchQuery}%")
            ->orWhere('job_title', 'like', "%{$searchQuery}%")
            ->orWhere('salary_id', 'like', "%{$searchQuery}%")
            ->get();

        return view('reports.employee_directory', compact('employees'));
    }


    //PERFORMANCE REPORTS
    public function performance(Request $request)
    {
        $searchQuery = $request->input('search');

        $performance = performanceModel::query()
            ->when($searchQuery, function ($query) use ($searchQuery) {
                // Prioritize 'performance_id' and 'employee_id' first
                $query->where(function ($q) use ($searchQuery) {
                    $q->where('performance_id', 'like', "%{$searchQuery}%")
                        ->orWhere('employee_id', 'like', "%{$searchQuery}%");
                });

                // Then apply other filters
                $query->orWhere('total_days_present', 'like', "%{$searchQuery}%")
                    ->orWhere('total_days_absent', 'like', "%{$searchQuery}%")
                    ->orWhere('leave_days_taken', 'like', "%{$searchQuery}%")
                    ->orWhere('review_date', 'like', "%{$searchQuery}%")
                    ->orWhere('review_score', 'like', "%{$searchQuery}%")
                    ->orWhere('reviewer_id', 'like', "%{$searchQuery}%");
            })
            ->get();

        return view('reports.performance', compact('performance'));
    }



    //SALARY REPORTS

    public function salaryReports(Request $request)
    {
        $searchQuery = $request->input('search');

        // Fetch salary reports with search functionality
        $salaryReports = Salary::query()
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where('salary_id', 'like', "%{$searchQuery}%", );
            })
            ->orWhere('salary_grade', 'like', "%{$searchQuery}%")
            ->get();


        return view('reports.salary_reports', compact('salaryReports'));
    }



    //DEAPRTMENT REPORTS
    public function departmentAnalysis()
    {
        // Fetch all departments
        $departments = departmentModel::all();
        // Count the number of employees in each department
        $employeeCounts = employee_info_viewModel::select('department_id', departmentModel::raw('count(employee_id) as employee_count'))
            ->groupBy('department_id')
            ->get();



        // Prepare the data for the view
        $departmentInfo = [];
        foreach ($departments as $department) {
            // Get the employee count for the current department
            $employeeCount = $employeeCounts->firstWhere('department_id', $department->department_id);

            // Get the department head (assuming `department_head_id` is the field in `departmentModel`)
            $department_heads = employee_info_viewModel::where('employee_id', $department->department_head)->first();

            $departmentInfo[] = [
                'department' => $department,
                'employee_count' => $employeeCount ? $employeeCount->employee_count : 0,
                'department_head' => $department_heads ? $department_heads->full_name : 'N/A' // Default to 'N/A' if no head
            ];
        }

        // Return the view with department data
        return view('reports.department_analysis', compact('departmentInfo'));
    }

    // PAYROLL REPORTS
    public function payrollReports(Request $request)
    {
        $searchQuery = $request->input('search');

        // Fetch payroll reports with search functionality
        $payrollReports = payrollModel::query()
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where('employee_id', 'like', "%{$searchQuery}%")
                    ->orWhere('payroll_status', 'like', "%{$searchQuery}%")
                    ->orWhere('pay_period', 'like', "%{$searchQuery}%")
                    ->orWhere('payment_date', 'like', "%{$searchQuery}%");
            })
            ->get();

        // Return the view with payroll data
        return view('reports.payroll_reports', compact('payrollReports'));
    }




}
