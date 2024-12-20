<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\employeeModel;
use App\Models\payrollModel;
use Illuminate\Http\Request;


class payrollController extends Controller
{
    // Show the list of payroll records
    public function index(Request $request)
    {
        // Capture the search query
        $search = $request->input('search');
        $user = Auth::user();
    
        // Query payrolls with optional search for admins
        $payrolls = payrollModel::join('tbl_employee', 'tbl_payroll.employee_id', '=', 'tbl_employee.employee_id')
            ->select('tbl_payroll.*', 'tbl_employee.employee_fname', 'tbl_employee.employee_lname')
            ->when($search, function ($query, $search) {
                $query->where('tbl_employee.employee_fname', 'like', "%{$search}%")
                    ->orWhere('tbl_employee.employee_lname', 'like', "%{$search}%")
                    ->orWhere('tbl_payroll.payroll_status', 'like', "%{$search}%")
                    ->orWhere('tbl_payroll.pay_period', 'like', "%{$search}%");
            })
            ->paginate(10);
    
            $payrollusers = payrollModel::join('tbl_employee', 'tbl_payroll.employee_id', '=', 'tbl_employee.employee_id')
            ->select('tbl_payroll.*', 'tbl_employee.employee_fname', 'tbl_employee.employee_lname')
            ->when($search, function ($query, $search) {
                $query->where('tbl_employee.employee_fname', 'like', "%{$search}%")
                    ->orWhere('tbl_employee.employee_lname', 'like', "%{$search}%")
                    ->orWhere('tbl_payroll.payroll_status', 'like', "%{$search}%")
                    ->orWhere('tbl_payroll.pay_period', 'like', "%{$search}%");
            })
            ->where('tbl_employee.employee_id', $user->id)
            ->paginate(10);
    
        // Return the view with payroll data
        return view('Salary.payroll', compact('payrolls', 'search', 'payrollusers'));
    }

    // Show the form to create a new payroll
    public function create()
    {
        // Retrieve all employees from employeeModel
        $employees = employeeModel::all();
        
        // Return the view with employees data
        return view('Salary.create', compact('employees'));
    }

    // Store a new payroll record
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'employee_id' => 'required|integer',
            'payroll_status' => 'required|string',
            'pay_period' => 'required|string',
            'payment_date' => 'required|date',
        ]);

        // Create the payroll record
        payrollModel::create([
            'employee_id' => $request->employee_id,
            'payroll_status' => $request->payroll_status,
            'pay_period' => $request->pay_period,
            'payment_date' => $request->payment_date,
        ]);

        // Redirect to payroll index with success message
        return redirect()->route('payroll.index')->with('success', 'Payroll record created successfully.');
    }

    // Show the form to edit a specific payroll record
    public function edit($id)
    {
        // Retrieve the payroll record by its payroll_id
        $payroll = payrollModel::findOrFail($id);
        $employees = employeeModel::all();

        // Return the edit view with payroll details
        return view('Salary.edit-payroll', compact('payroll', 'employees'));
    }

    // Update payroll record
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'employee_id' => 'required|integer',
            'payroll_status' => 'required|string',
            'pay_period' => 'required|date',
            'payment_date' => 'required|date',
        ]);

        // Find the payroll record by its payroll_id
        $payroll = payrollModel::findOrFail($id);

        // Update the payroll record with the new data
        $payroll->update([
            'employee_id' => $request->employee_id,
            'payroll_status' => $request->payroll_status,
            'pay_period' => $request->pay_period,
            'payment_date' => $request->payment_date,
        ]);

        // Redirect to payroll index with a success message
        return redirect()->route('payroll.index')->with('success', 'Payroll record updated successfully.');
    }

    // Delete payroll record
    public function delete($id)
    {
        // Find the payroll record by its payroll_id
        $payroll = payrollModel::findOrFail($id);

        // Delete the payroll record
        $payroll->delete();

        // Redirect to payroll index with a success message
        return redirect()->route('payroll.index')->with('success', 'Payroll record deleted successfully.');
    }
}
