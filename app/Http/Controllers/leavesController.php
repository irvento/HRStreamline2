<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\leavesModel;
use App\Models\employee_user_viewModel;
use App\Models\employeeModel;
class leavesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = leavesModel::query();

        if ($search) {
            $query->where('leave_status', 'LIKE', "%{$search}%")
                  ->orWhere('remarks', 'LIKE', "%{$search}%");
        }
        $user = Auth::user(); 
        $leavesuser = leavesModel::where('employee_id', $user->id)->get(); 
        $leaves = $query->paginate(10)->withQueryString();
        
        return view('leaves', compact('leaves', 'search', 'leavesuser'));
    }

    public function create()
    {
        $employee = employeeModel::all();
        return view('leaves.create', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $leave = leavesModel::findOrFail($id);

        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'leave_status' => 'required|string|max:20',
            'remarks' => 'nullable|string',
        ]);

        $leave->update($validated);

        return redirect()->route('leaves.index')->with('success', 'Leave updated successfully!');
    }
    public function store(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user
    
        // If the user is an admin, they can choose an employee
        if ($user->role === 'admin') {
            $employee_id = $request->input('employee_id');
        } else {
            // If the user is not an admin, associate the leave with their own employee_id
            $employeeuser = employee_user_viewModel::where('user_id', $user->id)->first();
            if (!$employeeuser) {
                return redirect()->back()->with('error', 'No employee record found for the current user.');
            }
            $employee_id = $employeeuser->employee_id;
        }
    
        // Validate the input
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'leave_status' => 'required|string|max:20',
            'remarks' => 'nullable|string',
        ]);
    
        // Create a new leave record
        $leaves = new leavesModel();
        $leaves->start_date = $validated['start_date'];
        $leaves->end_date = $validated['end_date'];
        $leaves->leave_status = $validated['leave_status'] ?? 'Pending';
        $leaves->employee_id = $employee_id; // Use the selected or authenticated employee_id
        $leaves->remarks = $validated['remarks'] ?? null;
    
        // Save the leave record
        $leaves->save();
    
        // Redirect with success message
        return redirect()->route('leaves.index');
    }
    

    public function edit($id)
    {
        $leave = leavesModel::findOrFail($id);
        return view('leaves.edit', compact('leave'));
    }

    

    public function destroy($id)
    {
        $leave = leavesModel::findOrFail($id);
        $leave->delete();

        return redirect()->route('leaves.index')->with('success', 'Leave deleted successfully!');
    }

    public function show($id)
    {
        $leave = leavesModel::findOrFail($id);
        return view('leaves.show', compact('leave'));
    }
}
