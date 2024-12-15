<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departmentModel;
class departmentController extends Controller
{
        public function index(){
            $department = departmentModel::all();
            return view('department', ['deparment'=> $department]);
        }
}
