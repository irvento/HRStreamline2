<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use App\Models\employee_user_viewModel;
use App\Models\employeeModel;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    // Display a listing of the employees
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = employeeModel::query();
    
        if ($search) {
            $query->where('employee_fname', 'LIKE', "%{$search}%")
                  ->orWhere('employee_lname', 'LIKE', "%{$search}%")
                  ->orWhere('contact1', 'LIKE', "%{$search}%");
        }
    
        $employees = $query->paginate(10)->withQueryString(); // Paginate with query strings
    
        return view('employee', ['employees' => $employees, 'search' => $search]); // Pass search term to the view
    }
   
    public function create()
    {
        $user = Auth::user();
    $alreadySubmitted = employeeModel::where('user_id', $user->id)->exists();

    return view('employees.create', compact('alreadySubmitted'));
    }

    public function store(Request $request)
{
    $user = Auth::user();

    $alreadySubmitted = employeeModel::where('user_id', $user->id)->exists();
    if ($alreadySubmitted) {
        return redirect()->route('employees.index')->with('error', 'You have already submitted this form.');
    }

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

    $imagePath = null;
    if ($request->hasFile('imagePath')) {
        $imagePath = $request->file('imagePath')->store('employee_images', 'public');
    }

    $employee = new employeeModel();
    
    $employee->employee_fname = $validated['employee_fname'];
    $employee->employee_mname = $validated['employee_mname'] ?? null;
    $employee->employee_lname = $validated['employee_lname'] ?? null;
    $employee->user_id = $user->id; 
    $employee->birthdate = $validated['birthdate'] ?? null;
    $employee->gender = $validated['gender'] ?? null;
    $employee->image = $imagePath;
    $employee->address_line_1 = $validated['address_line_1'] ?? null;
    $employee->address_line_2 = $validated['address_line_2'] ?? null;
    $employee->city = $validated['city'] ?? null;
    $employee->state = $validated['state'] ?? null;
    $employee->postal_code = $validated['postal_code'] ?? null;
    $employee->country = $validated['country'] ?? null;
    $employee->contact1 = $validated['contact1'] ?? null;

    $employee->save();

    return redirect()->route('dashboard')->with('success', 'Employee created successfully!');
}


    public function edit($id)
    {
        $employee = employeeModel::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
{
    // Validate incoming data
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

    // Find the employee by ID
    $employee = employeeModel::findOrFail($id);

    // Handle image upload if exists
    if ($request->hasFile('imagePath')) {
        $imagePath = $request->file('imagePath')->store('employee_images', 'public');
        $validated['image'] = $imagePath;  // Store the image path if uploaded
    }

    // Update the employee record
    $employee->update($validated);


    // Redirect back to the employee listing with success message
   return redirect()->route('employees')->with('success', 'Employee updated successfully!');
}

    

  public function destroy($id)
{
    $employee = employeeModel::findOrFail($id);
    $employee->delete();


        return redirect()->route('employees')->with('success', 'Employee deleted successfully!');
    }


    public function show($id)
    {
        // Fetch the employee by their primary key (employee_id)
        $employees = employeeModel::findOrFail($id);
       // $employeeuser = employee_user_viewModel::

        // Return the 'details' view and pass the employee data
        return view('employees.index', ['employee' => $employees]);
    }
}
