<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\leavesModel;
use App\Models\employeeModel;
use App\Models\employee_user_viewModel;


class leavesuserController extends Controller
{

    public function index(Request $request)
{
    $search = $request->input('search');
    $user = Auth::user(); // Get the authenticated user

    // Build the query with optional search filters
    $query = leavesModel::where('employee_id', $user->id);

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('leave_status', 'LIKE', "%{$search}%")
              ->orWhere('remarks', 'LIKE', "%{$search}%");
        });
    }

    // Paginate the results (10 items per page)
    $leavesuser = $query->paginate(10);

    return view('userview.leaves', compact('leavesuser'));
}




public function create()
{
    return view('leaves.create');
}


public function update(Request $request, $id)
{
    $leave = leavesModel::findOrFail($id);

    $validated = $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'leave_status' => 'nullable|string|max:20',
        'remarks' => 'nullable|string',
    ]);

    $leave->update($validated);

    return redirect()->route('leaveuser.index')->with('success', 'Leave updated successfully!');
}


public function store(Request $request)
{
    $user = Auth::user();
    


    $employeeuser = employee_user_viewModel::where('user_id', $user->id)->first();

    if (!$employeeuser) {
        return redirect()->back()->with('error', 'No employee record found for the current user.');
    }


    $validated = $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'leave_status' => 'nullable|string|max:20',
        'remarks' => 'nullable|string',
    ]);



    $leaves = new leavesModel();
    $leaves->start_date = $validated['start_date'];
    $leaves->end_date = $validated['end_date'];
    $leaves->leave_status = $validated['leave_status'] ?? 'Pending';
    $leaves->employee_id = $employeeuser->employee_id;
    $leaves->remarks = $validated['remarks'] ?? null;

    $leaves->save();

    return redirect()->route('leaveuser.index');
}



public function edit($id, $employee_id)
{
    $user = Auth::user();

    // Find the employee based on employee_id
    $employee = employeeModel::find($employee_id);

    // Check if the leave belongs to the correct employee
    $leave = leavesModel::where('employee_id', $employee->employee_id)
                         ->where('leave_id', $id)
                         ->first();

    // Check if the employee exists and is related to the authenticated user, and if the leave exists
    if ($employee && $employee->user_id === $user->id && $leave) {
        return view('userview.leaves.edit', compact('leave'));
    } else {
        return redirect()->route('leaveuser.index')->with('Failed', 'You got no access!');
    }
}


public function destroy($id)
{
    $leave = leavesModel::findOrFail($id);
    $leave->delete();

    return redirect()->route('leaveuser.index')->with('success', 'Leave deleted successfully!');
}


}
