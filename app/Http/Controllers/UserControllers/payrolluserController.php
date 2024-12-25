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
        $payrollusers = payrollModel::leftjoin('tbl_employee', 'tbl_payroll.employee_id', '=', 'tbl_employee.employee_id')
    ->select('tbl_payroll.*', 'tbl_employee.employee_fname', 'tbl_employee.employee_lname', 'tbl_employee.user_id')
    ->where('tbl_employee.user_id', $user->id)
    ->paginate(50);

        // Return the view with payroll data for the current user
     return view('userview.payroll', compact('payrollusers', 'search'));

    }


}
