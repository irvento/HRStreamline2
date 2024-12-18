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

    public function store(Request $request)
{
    $request->validate([
        'employee_id' => 'required|exists:tbl_employee,employee_id',
        'total_days_present' => 'required|integer',
        'total_days_absent' => 'required|integer',
        'leave_days_taken' => 'required|integer',
        'review_date' => 'required|date',
        'review_score' => 'nullable|numeric|min:0|max:5',
    ]);

    // Retrieve the employee ID of the logged-in user
    $reviewer = employeeModel::where('user_id', Auth::id())->first();

    if (!$reviewer) {
        return redirect()->route('performance.index')->with('error', 'Reviewer is not a registered employee.');
    }

    // Store the performance rating
    performanceModel::create([
        'employee_id' => $request->employee_id,
        'total_days_present' => $request->total_days_present,
        'total_days_absent' => $request->total_days_absent,
        'leave_days_taken' => $request->leave_days_taken,
        'review_date' => $request->review_date,
        'review_score' => $request->review_score,
        'reviewer_id' => $reviewer->employee_id, // Use the logged-in user's employee_id
    ]);

    return redirect()->route('performance.index')->with('success', 'Performance rated successfully!');
}


    public function index(Request $request)
{
    $query = performanceModel::with('employee');

    if ($request->has('search') && !empty($request->search)) {
        $searchTerm = $request->search;

        $query->whereHas('employee', function ($q) use ($searchTerm) {
            $q->where('employee_fname', 'like', "%{$searchTerm}%")
              ->orWhere('employee_lname', 'like', "%{$searchTerm}%");
        })->orWhere('performance_id', 'like', "%{$searchTerm}%");
    }

    $performance = $query->paginate(10); // Paginate results

    return view('performance', compact('performance'));
}
public function edit($id)
{
    $performance = performanceModel::with('employee')->findOrFail($id);
    $employees = employeeModel::all(); // Fetch all employees for the dropdown

    return view('performance.edit', compact('performance', 'employees'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'employee_id' => 'required|exists:tbl_employee,employee_id',
        'total_days_present' => 'required|integer',
        'total_days_absent' => 'required|integer',
        'leave_days_taken' => 'required|integer',
        'review_date' => 'required|date',
        'review_score' => 'nullable|numeric|min:0|max:5',
    ]);

    $performance = performanceModel::findOrFail($id);

    $performance->update([
        'employee_id' => $request->employee_id,
        'total_days_present' => $request->total_days_present,
        'total_days_absent' => $request->total_days_absent,
        'leave_days_taken' => $request->leave_days_taken,
        'review_date' => $request->review_date,
        'review_score' => $request->review_score,
    ]);

    return redirect()->route('performance.index')->with('success', 'Performance updated successfully!');
}

public function destroy($id)
{
    $performance = performanceModel::findOrFail($id);
    $performance->delete();

    return redirect()->route('performance.index')->with('success', 'Performance deleted successfully!');
}
}
