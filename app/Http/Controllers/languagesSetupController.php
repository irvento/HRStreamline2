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
    
    // Return the view for language setups (updated path)
    return view('qualifications.languages_setup.index', compact('languageSetups'));
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);

        // Create and save the new language setup record
        $setup = new languagesSetupModel();
        $setup->name = $validated['name'];
        $setup->description = $validated['description'];
        $setup->save();

        return redirect()->route('languageSetup.index')->with('success', 'Language setup added successfully!');
    }

    public function destroy($languagesetup_id)
    {
        // Find and delete the language setup record
        $setup = languagesSetupModel::findOrFail($languagesetup_id);
        $setup->delete();

        return redirect()->route('languageSetup.index')->with('success', 'Language setup deleted successfully!');
    }

    public function edit($languagesetup_id)
    {
        // Find the language setup record for editing
        $setup = languagesSetupModel::findOrFail($languagesetup_id);

        return view('languageSetup.edit', compact('setup'));
    }

    public function update(Request $request, $languagesetup_id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);

        // Find and update the language setup record
        $setup = languagesSetupModel::findOrFail($languagesetup_id);
        $setup->name = $validated['name'];
        $setup->description = $validated['description'];
        $setup->save();

        return redirect()->route('languageSetup.index')->with('success', 'Language setup updated successfully!');
    }
}
