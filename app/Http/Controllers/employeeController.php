<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\employee_infoModel;
use App\Models\jobModel;
use App\Models\departmentModel;
use App\Models\employeeModel;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = employeeModel::query();

        if ($search) {
            $query->where('employee_fname', 'LIKE', "%{$search}%")
                ->orWhere('employee_lname', 'LIKE', "%{$search}%")
                ->orWhere('contact1', 'LIKE', "%{$search}%");
        }

        $employees = $query->paginate(10)->withQueryString();
        return view('employee', ['employees' => $employees, 'search' => $search]);
    }

    public function create()
    {
        $user = Auth::user();
        $alreadySubmitted = employeeModel::where('user_id', $user->id)->exists();
        $departments = departmentModel::all();
        $jobs = jobModel::all();

        return view('employees.create', compact('alreadySubmitted', 'departments', 'jobs'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $alreadySubmitted = employeeModel::where('user_id', $user->id)->exists();

        if ($alreadySubmitted) {
            return redirect()->route('dashboard')->with('error', 'You have already submitted this form.');
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
            'department_id' => 'required|exists:tbl_department,department_id',
            'job_id' => 'required|exists:tbl_job,job_id',
        ]);

        $imagePath = null;
        if ($request->hasFile('imagePath')) {
            $imagePath = $request->file('imagePath')->store('employee_images', 'public');
        }

        $employee_info = new employee_infoModel();
        $employee = new employeeModel();
        $employee->fill($validated);
        $employee->user_id = $user->id;
        $employee->employee_email = $user->email;
        $employee->image = $imagePath;
        

        $employee->save();

        $employee_info->employee_id = $employee->employee_id;
        $employee_info->job_id = $validated['job_id'];
        $employee_info->department_id = $validated['department_id'];
        $employee_info -> save();

        return redirect()->route('dashboard')->with('success', 'Employee created successfully!');
    }

    public function edit($id)
    {
        $employee = employeeModel::findOrFail($id);
        $departments = departmentModel::all();
        $jobs = jobModel::all();

        return view('employees.edit', compact('employee', 'departments', 'jobs'));
    }

    public function update(Request $request, $id)
    {
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

        $employee = employeeModel::findOrFail($id);

        if ($request->hasFile('imagePath')) {
            $validated['image'] = $request->file('imagePath')->store('employee_images', 'public');
        }

        $employee->update($validated);

        return redirect()->route('employees')->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = employeeModel::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees')->with('success', 'Employee deleted successfully!');
    }
}
