<?php

namespace App\Http\Controllers;

use App\Models\employeeModel;
use App\Models\performanceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class performanceController extends Controller
{
    // Show the form to rate an employee
    public function create()
    {
        // Check if the logged-in user is an employee
        $user = Auth::user();
        $isEmployee = employeeModel::where('user_id', $user->id)->exists();

        if (!$isEmployee) {
            return redirect()->route('home')->with('error', 'You are not an employee!');
        }

        // Get all employees to select from (except the reviewer)
        $employees = employeeModel::where('user_id', '!=', $user->id)->get();

        return view('performance.create', compact('employees'));
    }

    // Store the performance rating
    public function store(Request $request)
    {
        $request->validate([

            'total_days_present' => 'required|integer',
            'total_days_absent' => 'required|integer',
            'leave_days_taken' => 'required|integer',
            'review_date' => 'required|date',
            'review_score' => 'nullable|numeric|min:0|max:5',
        ]);

        // Store the rating
        performanceModel::create([
            'employee_id' => $request->employee_id,
            'total_days_present' => $request->total_days_present,
            'total_days_absent' => $request->total_days_absent,
            'leave_days_taken' => $request->leave_days_taken,
            'review_date' => $request->review_date,
            'review_score' => $request->review_score,
            'reviewer_id' => Auth::id(),  // Reviewer is the logged-in user
        ]);

        return redirect()->route('performance.index')->with('success', 'Performance rated successfully!');
    }

    // Show a list of performance ratings
    public function index()
    {
        // Fetch performance ratings, join with employee details
        $performance = performanceModel::with('employee')->get();

        return view('performance', compact('performance'));
    }
}
