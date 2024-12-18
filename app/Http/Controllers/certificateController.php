<?php

namespace App\Http\Controllers;

use App\Models\certificateModel;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class certificateController extends Controller
{
    public function index()
    {
        // Fetch all certificates
        $certificates = certificateModel::all();
        
        // Return the view for certificates
        return view('certificate.index', compact('certificates'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'employee_id' => 'required|exists:tbl_employee,employee_id',
            'certificate_name' => 'required|string|max:255',
            'issued_by' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date',
        ]);

        // Create and save the new certificate
        $certificate = new certificateModel();
        $certificate->employee_id = $validated['employee_id'];
        $certificate->certificate_name = $validated['certificate_name'];
        $certificate->issued_by = $validated['issued_by'];
        $certificate->issue_date = $validated['issue_date'];
        $certificate->expiry_date = $validated['expiry_date'];
        $certificate->save();

        return redirect()->route('certificate.index')->with('success', 'Certificate added successfully!');
    }

    public function destroy($certificate_id)
    {
        // Find and delete the certificate record
        $certificate = certificateModel::findOrFail($certificate_id);
        $certificate->delete();

        return redirect()->route('certificate.index')->with('success', 'Certificate deleted successfully!');
    }

    public function edit($certificate_id)
    {
        // Find the certificate record for editing
        $certificate = certificateModel::findOrFail($certificate_id);
        $employees = EmployeeModel::all(); // Get all employees for the employee_id field

        return view('certificate.edit', compact('certificate', 'employees'));
    }

    public function update(Request $request, $certificate_id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'employee_id' => 'required|exists:tbl_employee,employee_id',
            'certificate_name' => 'required|string|max:255',
            'issued_by' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date',
        ]);

        // Find and update the certificate
        $certificate = certificateModel::findOrFail($certificate_id);
        $certificate->employee_id = $validated['employee_id'];
        $certificate->certificate_name = $validated['certificate_name'];
        $certificate->issued_by = $validated['issued_by'];
        $certificate->issue_date = $validated['issue_date'];
        $certificate->expiry_date = $validated['expiry_date'];
        $certificate->save();

        return redirect()->route('certificate.index')->with('success', 'Certificate updated successfully!');
    }
}
