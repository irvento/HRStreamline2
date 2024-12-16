<?php

namespace App\Http\Controllers;

use App\Models\employeeModel;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function index()
{
    $employees = employeeModel::all();
    return view('employees.index', compact('employees'));
}


    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'employee_fname' => 'required|string|max:255',
            // Validate other fields
        ]);

        // Create a new employee
        $employee = employeeModel::create([
            'name' => $request->name,
            'employee_fname' => $request->employee_fname,
            'employee_lname' => $request->employee_lname,
            'employee_mname' => $request->employee_mname,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'user_id' => $request->user_id,
            'image' => $request->image,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'phonenumber' => $request->phonenumber,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    public function edit($id)
{
    $employee = employeeModel::findOrFail($id);
    return view('employees.edit', compact('employee'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'employee_fname' => 'required|string|max:255',
        // Validate other fields
    ]);

    $employee = employeeModel::findOrFail($id);
    $employee->update([
        'name' => $request->name,
        'employee_fname' => $request->employee_fname,
        'employee_lname' => $request->employee_lname,
        'employee_mname' => $request->employee_mname,
        'birthdate' => $request->birthdate,
        'gender' => $request->gender,
        'user_id' => $request->user_id,
        'image' => $request->image,
        'address_line_1' => $request->address_line_1,
        'address_line_2' => $request->address_line_2,
        'city' => $request->city,
        'state' => $request->state,
        'postal_code' => $request->postal_code,
        'country' => $request->country,
        'phonenumber' => $request->phonenumber,
    ]);

    return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }
    public function destroy($id)
    {
        $employee = employeeModel::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }

}
