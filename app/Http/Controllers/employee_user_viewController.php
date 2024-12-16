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
    // Get the logged-in user
    $user = auth()->user();

    if (!$user) {
        // Handle case where user is not logged in
        return redirect()->route('login')->with('error', 'You need to log in first.');
    }

    // Find the employee data that corresponds to the logged-in user
    $employee = employee_user_viewModel::where('user_id', $user->id)->first();

    if (!$employee) {
        // Redirect to create employee if no employee record is found
        return redirect()->route('employees.create')->with('info', 'No employee record found. Please create one.');
    }

    // Pass the employee data to the view
    return view('profile.profile-information', ['employee' => $employee]);
}

}
