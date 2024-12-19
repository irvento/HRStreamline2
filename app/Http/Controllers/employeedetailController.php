<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\employee_info_viewModel;
use App\Models\employeeModel;
class employeedetailController extends Controller
{
    public function index($id)
    {

        $employee = employee_info_viewModel::where('employee_id', $id)->first();
        $employeess = employeeModel::with(['certificates', 'skills', 'education', 'languages'])
            ->where('employee_id', $id)
            ->first();

        return view('employees.index', ['employee' => $employee, 'employeess' => $employeess]);
    }
}
