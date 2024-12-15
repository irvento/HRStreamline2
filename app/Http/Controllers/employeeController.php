<?php

namespace App\Http\Controllers;

use App\Models\employeeModel;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function show(){

        $employee = employeeModel::all();

                return view('employee', ['employee' => $employee]);

    }


}
