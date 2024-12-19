<?php
namespace App\Http\Controllers;

use App\Models\certificateModel;
use App\Models\employeeModel;
use Illuminate\Http\Request;

class certificatesController extends Controller
{
    public function index()
    {
        // Fetch the certificates and employees
        $certificates = certificateModel::all(); // Fetch certificates
        $employees = employeeModel::all(); // Fetch employees

        // Pass both to the view
        return view('certificates.index', compact('certificates', 'employees'));
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

        // Redirect back to the qualifications page with the anchor for the Certificates tab
        return redirect()->to('/qualifications#Certificates')
            ->with('success', 'Certificate added successfully!');
    }

    public function destroy($certificate_id)
    {
        // Find and delete the certificate record
        $certificate = certificateModel::findOrFail($certificate_id);
        $certificate->delete();

        // Redirect back to the qualifications page with the anchor for the Certificates tab
        return redirect()->to('/qualifications#Certificates')
            ->with('success', 'Certificate deleted successfully!');
    }

    public function edit($certificate_id)
    {
        $certificate = certificateModel::findOrFail($certificate_id);
        $employees = employeeModel::all(); // Get all employees

        return view('certificates.edit', compact('certificate', 'employees'));
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

        // Redirect back to the qualifications page with the anchor for the Certificates tab
        return redirect()->to('/qualifications#Certificates')
            ->with('success', 'Certificate updated successfully!');
    }
    public function show($id)
    {
        // Fetch the specific certificate and its associated employee  
        $certificate = certificateModel::with('employee')->findOrFail($id);
        return view('certificates.show', compact('certificate'));  // Make sure the path is correct  
    }
}
