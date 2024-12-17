<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\attendanceModel;
use App\Models\employeeModel;
use Illuminate\Support\Facades\Auth;

class attendanceController extends Controller
{
    // Show the attendance form for login/logout
    public function index()
    {
        return view('attendance');
    }

    // Handle login (Clock In)
    public function login(Request $request)
    {
        $user = Auth::user();

        // Find employee associated with user
        $employee = employeeModel::where('user_id', $user->id)->first();

        if (!$employee) {
            return redirect()->route('attendance.index')->with('error', 'Employee record not found.');
        }

        // Check if the employee has already clocked in today
        $existingAttendance = attendanceModel::where('employee_id', $employee->employee_id)
            ->where('attendance_date', now()->toDateString())
            ->first();

        if ($existingAttendance) {
            return redirect()->route('attendance.index')->with('error', 'You have already logged in today.');
        }

        // Record time_in
        attendanceModel::create([
            'employee_id' => $employee->employee_id,
            'attendance_date' => now()->toDateString(),
            'time_in' => now()->toTimeString(),
        ]);

        return redirect()->route('attendance.index')->with('success', 'Logged in successfully!');
    }

    // Handle logout (Clock Out)
    public function logout(Request $request)
    {
        $user = Auth::user();

 
        $employee = employeeModel::where('user_id', $user->id)->first();

        if (!$employee) {
            return redirect()->route('attendance.index')->with('error', 'Employee record not found.');
        }

        // Find today's attendance record
        $attendance = attendanceModel::where('employee_id', $employee->employee_id)
            ->where('attendance_date', now()->toDateString())
            ->first();

        if (!$attendance) {
            return redirect()->route('attendance.index')->with('error', 'You have not logged in today.');
        }

        if ($attendance->time_out) {
            return redirect()->route('attendance.index')->with('error', 'You have already logged out today.');
        }


        $attendance->update([
            'time_out' => now()->toTimeString(),
        ]);

        return redirect()->route('attendance.index')->with('success', 'Logged out successfully!');
    }

    // Display attendance history
    public function showAttendance()
    {
        $user = Auth::user();

        $employee = employeeModel::where('user_id', $user->id)->first();

        if (!$employee) {
            return redirect()->route('attendance.index')->with('error', 'Employee record not found.');
        }

        // Get all attendance records for the employee
        $attendances = attendanceModel::where('employee_id', $employee->employee_id)->get();

        return view('attendance.history', compact('attendances'));
    }
}
