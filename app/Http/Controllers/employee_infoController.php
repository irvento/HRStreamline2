<?php

namespace App\Http\Controllers;

use App\Models\employee_infoModel;
use App\Models\departmentModel;
use App\Models\jobModel;
use App\Models\performanceModel;
use App\Models\employeeModel;
use Illuminate\Http\Request;

class employee_infoController extends Controller
{
    public function index()
    {
        
        $employeeInfos = employee_infoModel::with(['department', 'job', 'performance', 'employee'])->get();
        return view('assign', compact('employeeInfos'));
    }

    public function create()
    {
        $departments = departmentModel::all();
        $jobs = jobModel::all();
        $performances = performanceModel::all();
        $employees = employeeModel::all();
        return view('employee_info.create', compact('departments', 'jobs', 'performances', 'employees'));
    }

 public function store(Request $request)
{
    $validated = $request->validate([
        'department_id' => 'required|exists:tbl_department,department_id',
        'job_id' => 'required|exists:tbl_job,job_id',
        'performance_id' => 'nullable|unique:tbl_employee_info,performance_id|exists:tbl_performance,performance_id',
        'employee_id' => 'required|unique:tbl_employee_info,employee_id|exists:tbl_employee,employee_id',
    ], [
        'employee_id.unique' => 'This employee has already been assigned.',
        'performance_id.unique' => 'This performance ID has already been assigned.',
    ]);

    employee_infoModel::create($validated);
    return redirect()->route('employee_info.index')->with('success', 'Employee Info added successfully.');
}



    public function edit($id)
{
    $employeeInfo = employee_infoModel::findOrFail($id);
    $departments = departmentModel::all();
    $jobs = jobModel::all();
    $performances = performanceModel::all();
    $employees = employeeModel::all();

    return view('employee_info.edit', compact('employeeInfo', 'departments', 'jobs', 'performances', 'employees'));
}


public function update(Request $request, $id)
{
    $validated = $request->validate([
        'department_id' => 'required|exists:tbl_department,department_id',
        'job_id' => 'required|exists:tbl_job,job_id',
        'performance_id' => 'nullable|unique:tbl_employee_info,performance_id,' . $id . ',info_id|exists:tbl_performance,performance_id',
        'employee_id' => 'required|unique:tbl_employee_info,employee_id,' . $id . ',info_id|exists:tbl_employee,employee_id',
    ], [
        'employee_id.unique' => 'This employee has already been assigned.',
        'performance_id.unique' => 'This performance ID has already been assigned.',
    ]);

    $employeeInfo = employee_infoModel::where('info_id', $id)->firstOrFail();
    $employeeInfo->update($validated);

    return redirect()->route('employee_info.index')->with('success', 'Employee Info updated successfully.');
}



    public function destroy($id)
    {
        $employeeInfo = employee_infoModel::findOrFail($id);
        $employeeInfo->delete();
        return redirect()->route('employee_info.index')->with('success', 'Employee Info deleted successfully.');
    }
}
