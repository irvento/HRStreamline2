<?php

namespace App\Http\Controllers;

use App\Models\educationModel;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class educationController extends Controller
{
    public function index()
    {
        // Fetch all education records
        $educations = educationModel::all();
        $employees = EmployeeModel::all(); // Fetch employees for possible use in the view

        // Return the view for education
        return view('education.index', compact('educations', 'employees'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'employee_id' => 'required|exists:tbl_employee,employee_id',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'institution_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        // Create and save the new education record
        $education = new educationModel();
        $education->employee_id = $validated['employee_id'];
        $education->degree = $validated['degree'];
        $education->field_of_study = $validated['field_of_study'];
        $education->institution_name = $validated['institution_name'];
        $education->start_date = $validated['start_date'];
        $education->end_date = $validated['end_date'];
        $education->save();

        // Redirect back to the qualifications page with the anchor for the Education tab
        return redirect()->to('/qualifications#Education')
            ->with('success', 'Education added successfully!');
    }

    public function destroy($education_id)
    {
        // Find and delete the education record
        $education = educationModel::findOrFail($education_id);
        $education->delete();

        // Redirect back to the qualifications page with the anchor for the Education tab
        return redirect()->to('/qualifications#Education')
            ->with('success', 'Education deleted successfully!');
    }

    public function edit($education_id)
    {
        // Find the education record for editing
        $education = educationModel::findOrFail($education_id);
        $employees = EmployeeModel::all(); // Get all employees for the employee_id field

        return view('education.edit', compact('education', 'employees'));
    }

    public function update(Request $request, $education_id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'employee_id' => 'required|exists:tbl_employee,employee_id',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'institution_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        // Find and update the education record
        $education = educationModel::findOrFail($education_id);
        $education->employee_id = $validated['employee_id'];
        $education->degree = $validated['degree'];
        $education->field_of_study = $validated['field_of_study'];
        $education->institution_name = $validated['institution_name'];
        $education->start_date = $validated['start_date'];
        $education->end_date = $validated['end_date'];
        $education->save();

        // Redirect back to the qualifications page with the anchor for the Education tab
        return redirect()->to('/qualifications#Education')
            ->with('success', 'Education updated successfully!');
    }

    public function show($education_id)
    {
        // Fetch the specific education record and its associated employee
        $education = educationModel::with('employee')->findOrFail($education_id);

        return view('education.show', compact('education'));
    }
}
