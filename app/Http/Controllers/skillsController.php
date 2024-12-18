<?php

namespace App\Http\Controllers;

use App\Models\skillsModel;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class skillsController extends Controller
{
    public function index()
    {
        // Fetch all skills
        $skills = skillsModel::all();
        
        // Return the view for skills
        return view('skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'employee_id' => 'required|exists:tbl_employee,employee_id',
            'skill_name' => 'required|string|max:255',
            'proficiency_level' => 'required|string|max:255',
            'last_used_date' => 'nullable|date',
        ]);

        // Create and save the new skill record
        $skill = new skillsModel();
        $skill->employee_id = $validated['employee_id'];
        $skill->skill_name = $validated['skill_name'];
        $skill->proficiency_level = $validated['proficiency_level'];
        $skill->last_used_date = $validated['last_used_date'];
        $skill->save();

        return redirect()->route('skills.index')->with('success', 'Skill added successfully!');
    }

    public function destroy($skill_id)
    {
        // Find and delete the skill record
        $skill = skillsModel::findOrFail($skill_id);
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully!');
    }

    public function edit($skill_id)
    {
        // Find the skill record for editing
        $skill = skillsModel::findOrFail($skill_id);
        $employees = EmployeeModel::all(); // Get all employees for the employee_id field

        return view('skills.edit', compact('skill', 'employees'));
    }

    public function update(Request $request, $skill_id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'employee_id' => 'required|exists:tbl_employee,employee_id',
            'skill_name' => 'required|string|max:255',
            'proficiency_level' => 'required|string|max:255',
            'last_used_date' => 'nullable|date',
        ]);

        // Find and update the skill record
        $skill = skillsModel::findOrFail($skill_id);
        $skill->employee_id = $validated['employee_id'];
        $skill->skill_name = $validated['skill_name'];
        $skill->proficiency_level = $validated['proficiency_level'];
        $skill->last_used_date = $validated['last_used_date'];
        $skill->save();

        return redirect()->route('skills.index')->with('success', 'Skill updated successfully!');
    }
}
