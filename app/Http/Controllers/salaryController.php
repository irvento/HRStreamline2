<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\payment_frequencyModel;
use Illuminate\Http\Request;

class salaryController extends Controller
{
    public function index()
    {
        // Fetch all salaries securely
        $salaries = Salary::all();
        $paymentFrequencies = payment_frequencyModel::all(); // Fetch payment frequency data
    
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
        return redirect()->route('salary')->with('success', 'Salary added successfully!');
    }
    
}
