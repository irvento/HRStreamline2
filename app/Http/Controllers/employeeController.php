<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\employeeModel;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    // Display a listing of the employees
    public function index()
    {
        $employees = employeeModel::all();
        return view('employees.index', compact('employees'));
    }

    // Show the form for creating a new employee
    public function create()
    {
        $user = Auth::user();
    $alreadySubmitted = employeeModel::where('user_id', $user->id)->exists();

    return view('employees.create', compact('alreadySubmitted'));
        // Return the 'create' Blade view
    }

    // Store a newly created employee in the database
    public function store(Request $request)
{
    // Get the authenticated user
    $user = Auth::user();

    // Check if the user has already submitted the form
    $alreadySubmitted = employeeModel::where('user_id', $user->id)->exists();
    if ($alreadySubmitted) {
        return redirect()->route('employees.index')->with('error', 'You have already submitted this form.');
    }

    // Validate the request data
    $validated = $request->validate([
        'employee_fname' => 'required|string|max:255',
        'employee_mname' => 'nullable|string|max:255',
        'employee_lname' => 'nullable|string|max:255',
        'birthdate' => 'nullable|date',
        'gender' => 'nullable|string|max:10',
        'imagePath' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'address_line_1' => 'nullable|string|max:255',
        'address_line_2' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'postal_code' => 'nullable|string|max:20',
        'country' => 'nullable|string|max:255',
        'contact1' => 'nullable|string|max:20',
    ]);

    // Store the image if uploaded
    $imagePath = null;
    if ($request->hasFile('imagePath')) {
        $imagePath = $request->file('imagePath')->store('employee_images', 'public');
    }

    // Create and save the employee
    $employee = new employeeModel();
    $employee->employee_fname = $validated['employee_fname'];
    $employee->employee_mname = $validated['employee_mname'] ?? null;
    $employee->employee_lname = $validated['employee_lname'] ?? null;
    $employee->user_id = $user->id; // Assign the authenticated user's ID
    $employee->birthdate = $validated['birthdate'] ?? null;
    $employee->gender = $validated['gender'] ?? null;
    $employee->image = $imagePath; // Store the image path
    $employee->address_line_1 = $validated['address_line_1'] ?? null;
    $employee->address_line_2 = $validated['address_line_2'] ?? null;
    $employee->city = $validated['city'] ?? null;
    $employee->state = $validated['state'] ?? null;
    $employee->postal_code = $validated['postal_code'] ?? null;
    $employee->country = $validated['country'] ?? null;
    $employee->contact1 = $validated['contact1'] ?? null;

    // Save the employee record
    $employee->save();

    // Redirect back with success message
    return redirect()->route('dashboard')->with('success', 'Employee created successfully!');
}


    // Show the form for editing the specified employee
    public function edit($id)
    {
        $employee = employeeModel::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    // Update the specified employee in the database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'employee_fname' => 'required|string|max:255',
        ]);
    
        $employee = employeeModel::findOrFail($id);
    
        $employee->update($request->all());
    
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }
    

    // Remove the specified employee from the database
    public function destroy($id)
    {
        $employee = employeeModel::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
