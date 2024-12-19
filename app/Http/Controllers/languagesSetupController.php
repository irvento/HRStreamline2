<?php

namespace App\Http\Controllers;

use App\Models\languagesSetupModel;
use Illuminate\Http\Request;

class languagesSetupController extends Controller
{
    public function index()
    {
        // Fetch all language setups
        $languageSetups = languagesSetupModel::all();

        // Return the view for language setups
        return view('languageSetup.index', compact('languageSetups'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',  // Description is optional
        ]);

        // Create and save the new language setup record
        $setup = new languagesSetupModel();
        $setup->name = $validated['name'];
        $setup->description = $validated['description'] ?? null;  // Handle nullable description
        $setup->save();

        // Redirect back with success message
        return redirect()->to('/qualifications#Languages_Setup')->with('success', 'Language setup added successfully!');
    }


    public function destroy($languagesetup_id)
    {
        // Find and delete the language setup record
        $setup = languagesSetupModel::findOrFail($languagesetup_id);
        $setup->delete();

        // Redirect back to the qualifications page with the anchor for the Language Setup section
        return redirect()->to('/qualifications#Languages_Setup')
            ->with('success', 'Language setup deleted successfully!');
    }

    public function edit($languagesetup_id)
    {
        // Find the language setup record for editing
        $setup = languagesSetupModel::findOrFail($languagesetup_id);

        return view('languageSetup.edit', compact('setup'));
    }

    public function update(Request $request, $languagesetup_id)
    {
        // Find the language setup record by its ID
        $setup = languagesSetupModel::findOrFail($languagesetup_id);

        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the setup record with the validated data
        $setup->update($validatedData);

        return redirect()->to('/qualifications#Languages_Setup')
            ->with('success', 'Language updated successfully!');
    }
}
