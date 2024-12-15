<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;

use Illuminate\Http\Request;
use App\Models\employee_user_viewModel;
class employee_user_viewController extends Controller
{

   

    public function show(){

        $employeeuser = employee_user_viewModel::all();

                return view('employee', ['employeeuser' => $employeeuser]);

    }

    public function index()
    {
        // Fetch the logged-in user
        $user = Auth::user();
    
        // Find the employee data that corresponds to the logged-in user
        $employee = employee_user_viewModel::where('user_id', $user->id)->first();
    
        // Check if the user ID matches the employee's user_id
        if ($user->id === $employee->user_id) {
            // Pass the employee data to the view
            return view('profile.profile-information', data: ['employee' => $employee]);
        }
    
        // If no match is found, return a suitable response (e.g., error or redirect)
        return redirect()->route('dashboard')->withErrors('Employee data not found or access denied.');
    }

}
