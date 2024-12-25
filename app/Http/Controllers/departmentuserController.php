<?php

namespace App\Http\Controllers;

use App\Models\departmentModel;
use Illuminate\Http\Request;

class departmentuserController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

    $department = departmentModel::query()
        ->when($search, function ($query, $search) {
            return $query->where('department_name', 'like', '%' . $search . '%');
        })
        ->leftJoin('tbl_employee', 'tbl_department.department_head', '=', 'tbl_employee.employee_id')
        ->select('tbl_department.*', 'tbl_employee.employee_fname as department_head_fname', 'tbl_employee.employee_lname as department_head_lname')
        ->paginate(10);

        return view('userview.department',['departments'=>$department]);
    }
 }
