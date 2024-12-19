<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departmentModel;
use App\Models\employeeModel;
use App\Models\employee_info_viewModel;

class departmentController extends Controller
{
    // Display a listing of departments
    public function index(Request $request)
{
    $search = $request->input('search');

    $departments = departmentModel::query()
        ->when($search, function ($query, $search) {
            return $query->where('department_name', 'like', '%' . $search . '%');
        })
        ->leftJoin('tbl_employee', 'tbl_department.department_head', '=', 'tbl_employee.employee_id')
        ->select('tbl_department.*', 'tbl_employee.employee_fname as department_head_fname', 'tbl_employee.employee_lname as department_head_lname')
        ->paginate(10);

    return view('department.index', compact('departments', 'search'));
}


    // Show the form for creating a new department
    public function create()
    {
        $employees = employeeModel::select('employee_id', 'employee_fname', 'employee_lname')->get(); // Fetch employee ID and name
        return view('department.create', compact('employees'));
    }
    
    

    public function store(Request $request)
{
    $alreadyExists = departmentModel::where('department_name', $request->department_name)->exists();

    if ($alreadyExists) {
        return redirect()->route('department.index')->with('error', 'Department already exists.');
    }

    $validated = $request->validate([
        'department_name' => 'required|string|max:50',
        'department_head' => 'required|exists:tbl_employee,employee_id', // Ensure the selected head exists in the employee table
    ]);

    $department = new departmentModel();
    $department->department_name = $validated['department_name'];
    $department->department_head = $validated['department_head']; // Save the department head
    $department->save();

    return redirect()->route('department.index')->with('success', 'Department created successfully!');
}


    // Show the form for editing the specified department
    public function edit($id)
    {
        $department = departmentModel::where('department_id', $id)->firstOrFail();
        $employees = employeeModel::select('employee_id', 'employee_fname', 'employee_lname')->get();
        return view('department.edit', compact('department', 'employees'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'department_head' => 'required|exists:tbl_employee,employee_id', // Ensure the selected head exists in the employee table
        ]);
    
        $department = departmentModel::findOrFail($id);
        $department->department_name = $request->input('department_name');
        $department->department_head = $request->input('department_head'); // Update the department head
        $department->save();
    
        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }
    

    // Remove the specified department from storage
    public function destroy($id)
    {
        $department = departmentModel::findOrFail($id);
        $department->delete();

        return redirect()->route('department.index')->with('success', 'Department deleted successfully!');
    }

    // Method to show the delete confirmation modal (via session)
    public function showDeleteConfirmation($id)
    {
        $department = departmentModel::findOrFail($id);
        
        session([
            'delete_id' => $department->department_id,
            'delete_name' => $department->department_name,
        ]);

        return redirect()->route('department.index');
    }
    public function view($id)
{
    // Fetch the department details using a LEFT JOIN to include department head information
    $department = departmentModel::leftJoin('tbl_employee', 'tbl_department.department_head', '=', 'tbl_employee.employee_id')
        ->where('tbl_department.department_id', $id)
        ->select(
            'tbl_department.*',
            'tbl_employee.employee_fname as department_head_fname',
            'tbl_employee.employee_lname as department_head_lname'
        )
        ->firstOrFail();

    // Count the number of employees in this department
    $employeeCount = employee_info_viewModel::where('department_id', $id)->count();

    // Fetch employees in the department by joining the employee_info_viewModel and tbl_employee
    $employees = employee_info_viewModel::where('employee_info_view.department_id', $id)
        ->join('tbl_employee', 'tbl_employee.employee_id', '=', 'employee_info_view.employee_id')
        ->select('tbl_employee.employee_fname', 'tbl_employee.employee_lname')
        ->get();

    // Return the view with the department details, employee count, and employee list
    return view('department.view', compact('department', 'employeeCount', 'employees'));
}


    

}
