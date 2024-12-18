<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departmentModel;

class departmentController extends Controller
{
    // Display a listing of departments
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = departmentModel::query();

        if ($search) {
            $query->where('department_name', 'LIKE', "%{$search}%");
        }

        $departments = $query->paginate(10)->withQueryString();

        return view('department.index', ['departments' => $departments, 'search' => $search]);
    }

    // Show the form for creating a new department
    public function create()
    {
        return view('department.create');
    }
    

    public function store(Request $request)
    {
        $department = new departmentModel();
    
        $alreadyExists = departmentModel::where('department_name', $request->department_name)->exists();
    
        if ($alreadyExists) {
            return redirect()->route('department.index')->with('error', 'Department already exists.');
        }
    
        $validated = $request->validate([
            'department_name' => 'required|string|max:50',
        ]);
    
        $department->department_name = $validated['department_name'];
    
        $department->save();
    
        return redirect()->route('department.index')->with('success', 'Department created successfully!');
    }

    // Show the form for editing the specified department
    public function edit($id)
{
    $department = departmentModel::where('department_id', $id)->firstOrFail();
    return view('department.edit', compact('department'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'department_name' => 'required|string|max:255',
    ]);

    $department = departmentModel::findOrFail($id);
    $department->department_name = $request->input('department_name'); // Corrected field name

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
}
