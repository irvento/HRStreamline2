<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\employee_infoModel;
use Illuminate\Support\Facades\DB;
use App\Models\jobModel;
use App\Models\departmentModel;
use App\Models\employeeModel;
use Illuminate\Http\Request;

class employeeController extends Controller
{

    public function checkEmployeeRegistration($employee_id)
    {
        // Check if an entry exists for the employee in the employee_info_view
        $isRegistered = DB::table('employee_info_view') // Change to the correct table or view name
            ->where('employee_id', $employee_id)
            ->exists();

        return $isRegistered;
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status', 'all'); // Default to 'all'
        $query = employeeModel::query();

        // Apply search filter
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('employee_fname', 'LIKE', "%{$search}%")
                    ->orWhere('employee_lname', 'LIKE', "%{$search}%")
                    ->orWhere('contact1', 'LIKE', "%{$search}%");
            });
        }

        // Apply status filter
        if ($status === 'active') {
            $query->where('status', 'active');
        } elseif ($status === 'inactive') {
            $query->where('status', 'inactive');
        }

        // Fetch the employees and map them to add the 'is_registered' flag
        $employees = $query->paginate(10)->withQueryString();

        $employees->getCollection()->transform(function ($employee) {
            $employee->is_registered = $this->checkEmployeeRegistration($employee->employee_id);
            return $employee;
        });

        return view('employee', [
            'employees' => $employees,
            'search' => $search,
            'status' => $status, // Pass the current status filter
        ]);
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
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'contact1' => 'required|string|max:20',
            'department_id' => 'required|exists:tbl_department,department_id',
            'job_id' => 'required|exists:tbl_job,job_id',
        ], [
            'employee_fname.required' => 'Please complete the first name.',
            'contact1.required' => 'Please provide a contact number.',
            'department_id.required' => 'Please select a department.',
            'job_id.required' => 'Please select a job.',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'storage/app/public/employee_images/';
            $image->move($path, $filename);
            $imagePath = $path . $filename;
        } else {
            // Assign a default image based on gender
            $imagePath = $validated['gender'] === 'Female'
                ? 'storage/app/public/employee_images/female_icon.png'
                : 'storage/app/public/employee_images/male_icon.png';
        }

        $employee = new employeeModel();
        $employee->fill($validated);
        $employee->user_id = $user->id;
        $employee->employee_email = $user->email;
        $employee->image = $imagePath; // Save image path in the database
        $employee->save();

        $employee_info = new employee_infoModel();
        $employee_info->employee_id = $employee->employee_id;
        $employee_info->job_id = $validated['job_id'];
        $employee_info->department_id = $validated['department_id'];
        $employee_info->save();

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
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'contact1' => 'nullable|string|max:20',
        ]);

        $employee = employeeModel::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'storage/employee_images/';
            $image->move($path, $filename);
            $validated['image'] = $path . $filename;
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

    public function show($employee_id)
    {
        $employee = employeeModel::with(['certificates', 'skills', 'education', 'languages'])->findOrFail($employee_id);

        return view('employee.show', compact('employee'));
    }

    public function activate($id)
    {
        $employee = employeeModel::findOrFail($id);
        $employee->activate();

        return redirect()->back()->with('success', 'Employee activated successfully.');
    }

    public function deactivate($id)
    {
        $employee = employeeModel::findOrFail($id);
        $employee->deactivate();

        return redirect()->back()->with('success', 'Employee deactivated successfully.');
    }
    public function toggleStatus($id)
    {
        $employee = employeeModel::findOrFail($id);
        $employee->status = $employee->status === 'active' ? 'inactive' : 'active';
        $employee->save();

        return redirect()->back()->with('success', 'Employee status updated successfully.');
    }

}
