<?php

namespace App\Http\Controllers;

use App\Models\employeeModel;
use App\Models\leavesModel;

class dashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = employeeModel::count(); // Replace with your actual model
        $pendingLeaves = leavesModel::where('leave_status', 'pending')->count(); // Replace with your leave model

        return view('dashboard', compact('totalEmployees', 'pendingLeaves'));
    }


}
