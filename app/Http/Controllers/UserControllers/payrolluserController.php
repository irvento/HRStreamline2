<?php

namespace App\Http\Controllers\UserControllers;

use Illuminate\Support\Facades\Auth;
use App\Models\employeeModel;
use App\Models\payrollModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class payrolluserController extends Controller
{
    // Show the list of payroll records for the current user
    public function index(Request $request)
    {
        // Capture the search query
        $search = $request->input('search');
        $user = Auth::user();

        // Query payrolls for the current user with optional search
        $payrollusers = payrollModel::join('tbl_employee', 'tbl_payroll.employee_id', '=', 'tbl_employee.employee_id')
            ->select('tbl_payroll.*', 'tbl_employee.employee_fname', 'tbl_employee.employee_lname')
            ->when($search, function ($query, $search) {
                $query->where('tbl_employee.employee_fname', 'like', "%{$search}%")
                    ->orWhere('tbl_employee.employee_lname', 'like', "%{$search}%")
                    ->orWhere('tbl_payroll.payroll_status', 'like', "%{$search}%")
                    ->orWhere('tbl_payroll.pay_period', 'like', "%{$search}%");
            })
            // Ensure that only records for the current user are returned
            ->where('tbl_employee.employee_id', $user->id)
            ->paginate(10);

        // Return the view with payroll data for the current user
        return view('userview.payroll', compact('payrollusers', 'search'));
    }


}
