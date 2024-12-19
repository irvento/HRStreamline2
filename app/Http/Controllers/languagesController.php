<?php
namespace App\Http\Controllers;

use App\Models\languagesModel;
use App\Models\languagesSetupModel;
use App\Models\employeeModel;
use Illuminate\Http\Request;

class languagesController extends Controller
{
    public function index()
    {
        // Fetch all languages along with their related employee and language setup details
        $languages = languagesModel::all();
        $languageSetup = languagesSetupModel::all(); // Get all available languages for the dropdown

        // Return the view for languages
        return view('languages.index', compact('languages', 'languageSetup '));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'employee_id' => 'required|exists:tbl_employee,employee_id',
            'languagesetup_id' => 'nullable|exists:languagesetup,languagesetup_id',
            'proficiency_level' => 'required|in:basic,fluent,native',
        ]);

        // Create and save the new language record
        $language = new languagesModel();
        $language->employee_id = $validated['employee_id'];
        $language->languagesetup_id = $validated['languagesetup_id'] ?? null; // Handle null languagesetup_id
        $language->proficiency_level = $validated['proficiency_level'];
        $language->save();

        // Redirect back to the qualifications page with the anchor for the Languages tab
        return redirect()->to('/qualifications#Languages')
            ->with('success', 'Language added successfully!');
    }

    public function destroy($language_id)
    {
        // Find and delete the language record
        $language = languagesModel::findOrFail($language_id);
        $language->delete();

        // Redirect back to the qualifications page with the anchor for the Languages tab
        return redirect()->to('/qualifications#Languages')
            ->with('success', 'Language deleted successfully!');
    }

    public function edit($language_id)
    {
        // Find the language record for editing
        $language = languagesModel::findOrFail($language_id);
        $languageSetup = languagesSetupModel::all(); // Get all language setups for the dropdown
        $employees = employeeModel::all(); // Get all employees for employee selection

        return view('languages.edit', compact('language', 'languageSetup', 'employees'));
    }

    public function update(Request $request, $language_id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'employee_id' => 'required|exists:tbl_employee,employee_id',
            'languagesetup_id' => 'nullable|exists:languagesetup,languagesetup_id',
            'proficiency_level' => 'required|in:basic,fluent,native',
        ]);

        // Find and update the language record
        $language = languagesModel::findOrFail($language_id);
        $language->employee_id = $validated['employee_id'];
        $language->languagesetup_id = $validated['languagesetup_id'] ?? null; // Handle null languagesetup_id
        $language->proficiency_level = $validated['proficiency_level'];
        $language->save();

        // Redirect back to the qualifications page with the anchor for the Languages tab
        return redirect()->to('/qualifications#Languages')
            ->with('success', 'Language updated successfully!');
    }

    public function show($language_id)
    {
        // Fetch the specific language record along with its associated employee and language setup
        $language = languagesModel::with(['employee', 'languagesSetup'])->findOrFail($language_id);

        return view('languages.show', compact('language'));
    }
}
