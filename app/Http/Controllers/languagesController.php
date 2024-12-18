<?php

namespace App\Http\Controllers;

use App\Models\languagesModel;
use App\Models\languageSetupModel;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class languagesController extends Controller
{
    public function index()
    {
        // Fetch all languages
        $languages = languagesModel::all();
        
        // Return the view for languages
        return view('languages.index', compact('languages'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'employee_id' => 'required|exists:tbl_employee,employee_id',
            'languagesetup_id' => 'required|exists:languagesetup,languagesetup_id',
            'proficiency_level' => 'required|string|max:255',
        ]);

        // Create and save the new language record
        $language = new languagesModel();
        $language->employee_id = $validated['employee_id'];
        $language->languagesetup_id = $validated['languagesetup_id'];
        $language->proficiency_level = $validated['proficiency_level'];
        $language->save();

        return redirect()->route('languages.index')->with('success', 'Language added successfully!');
    }

    public function destroy($language_id)
    {
        // Find and delete the language record
        $language = languagesModel::findOrFail($language_id);
        $language->delete();

        return redirect()->route('languages.index')->with('success', 'Language deleted successfully!');
    }

    public function edit($language_id)
    {
        // Find the language record for editing
        $language = languagesModel::findOrFail($language_id);
        $languagesetups = languageSetupModel::all(); // Get all language setups
        $employees = EmployeeModel::all(); // Get all employees for the employee_id field

        return view('languages.edit', compact('language', 'languagesetups', 'employees'));
    }

    public function update(Request $request, $language_id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'employee_id' => 'required|exists:tbl_employee,employee_id',
            'languagesetup_id' => 'required|exists:languagesetup,languagesetup_id',
            'proficiency_level' => 'required|string|max:255',
        ]);

        // Find and update the language record
        $language = languagesModel::findOrFail($language_id);
        $language->employee_id = $validated['employee_id'];
        $language->languagesetup_id = $validated['languagesetup_id'];
        $language->proficiency_level = $validated['proficiency_level'];
        $language->save();

        return redirect()->route('languages.index')->with('success', 'Language updated successfully!');
    }
}
