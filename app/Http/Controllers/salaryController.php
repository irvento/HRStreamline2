<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\paymentFrequencyModel;
use Illuminate\Http\Request;

class salaryController extends Controller
{
    public function index()
    {
        // Fetch all salaries securely
        $salaries = Salary::all();
        $paymentFrequencies = paymentFrequencyModel::all(); // Fetch payment frequency data
    
        // Return the view only for authenticated users
        return view('salary.index', compact('salaries', 'paymentFrequencies'));
    }
    
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'salary_grade' => 'required|string|max:255',
            'salary_amount' => 'required|numeric',
            'payment_frequency_id' => 'required|string|max:255',
        ]);
    
        // Create and save the new salary (auto-increment handles salary_id)
        $salary = new Salary();
        $salary->salary_grade = $validated['salary_grade'];
        $salary->salary_amount = $validated['salary_amount'];
        $salary->payment_frequency_id = $validated['payment_frequency_id'];
    
        // Save the salary record
        $salary->save();
    
        // Redirect back to the salary index page with a success message
        return redirect()->route('salary.index')->with('success', 'Salary added successfully!');
    }

    public function destroy($salary_id)
{
    // Find the salary record by its ID
    $salary = Salary::findOrFail($salary_id);

    // Delete the salary record
    $salary->delete();

    // Redirect back to the salary index page with a success message
    return redirect()->route('salary')->with('success', 'Salary deleted successfully!');
}


    public function show($salary_id)
    {
        // Find the salary record by its ID
        $salary = Salary::findOrFail($salary_id);

        // Return a view for the salary details
        return view('salary.view', compact('salary'));
    }

    public function edit($salary_id)
    {
        // Find the salary record by its ID
        $salary = Salary::findOrFail($salary_id);

        // Fetch the payment frequencies for the select dropdown in the form
        $paymentFrequencies = PaymentFrequencyModel::all();

        // Return the view for editing the salary
        return view('salary.edit', compact('salary', 'paymentFrequencies'));
    }

    public function update(Request $request, $salary_id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'salary_grade' => 'required|string|max:255',
            'salary_amount' => 'required|numeric',
            'payment_frequency_id' => 'required|string|max:255',
        ]);

        // Find the salary record by its ID
        $salary = Salary::findOrFail($salary_id);

        // Update the salary record
        $salary->salary_grade = $validated['salary_grade'];
        $salary->salary_amount = $validated['salary_amount'];
        $salary->payment_frequency_id = $validated['payment_frequency_id'];

        // Save the updated salary record
        $salary->save();

        // Redirect back to the salary index page with a success message
        return redirect()->route('salary.index')->with('success', 'Salary updated successfully!');
    }
}
