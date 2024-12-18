<?php

namespace App\Http\Controllers;

use App\Models\jobModel;
use App\Models\Salary; 
use Illuminate\Http\Request;

class jobController extends Controller
{
    // Display a list of jobs
    public function index(Request $request)
    {
        $query = jobModel::with('salary');
    
        // Check if there's a search query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('job_title', 'like', "%$search%")
                  ->orWhere('job_description', 'like', "%$search%");
        }
    
        // Paginate the results
        $jobs = $query->paginate(10);
    
        // Pass the jobs and search query to the view
        return view('job', compact('jobs'));
    }
    

    // Show the form for creating a new job
    public function create()
    {
        $salaries = Salary::all(); // Fetch salary data for the dropdown
        return view('job.create', compact('salaries'));
    }

    // Store a new job
    public function store(Request $request)
{
   
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'nullable|string',
            'salary_id' => 'required|exists:tbl_salary,salary_id',
        ]);

        $jobtable = new jobModel();

        $jobtable->job_title = $validated['job_title'];
        $jobtable->job_description = $validated['job_description'];
        $jobtable->salary_id = $validated['salary_id'];

        $jobtable->save();
        
        return redirect()->route('job.index')->with('success', 'Job added successfully.');
    
}


    // Show the form for editing a job
    public function edit($id)
    {
        $job = jobModel::findOrFail($id);
        $salaries = Salary::all();
        return view('job.edit', compact('job', 'salaries'));
    }

    // Update a job
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'nullable|string',
            'salary_id' => 'required|exists:tbl_salary,salary_id',
        ]);

        $job = jobModel::findOrFail($id);
        $job->update($validated);

        return redirect()->route('job.index')->with('success', 'Job updated successfully.');
    }

    // Delete a job
    public function destroy($id)
    {
        $job = jobModel::findOrFail($id);
        $job->delete();

        return redirect()->route('job.index')->with('success', 'Job deleted successfully.');
    }
}
