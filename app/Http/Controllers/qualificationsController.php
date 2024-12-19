<?php

namespace App\Http\Controllers;
use App\Models\certificateModel;
use App\Models\educationModel;
use App\Models\employeeModel;
use App\Models\languagesSetupModel;
use App\Models\languagesModel;
use App\Models\skillsModel;

class qualificationsController extends Controller
{
    public function index()
    {
        // Get all the qualifications data
        $certificates = certificateModel::all();
        $educations = educationModel::all();
        $skills = skillsModel::all();
        $languages = languagesModel::all();
        $languageSetup = languagesSetupModel::all();
        $employees = employeeModel::all();

        return view('qualifications.index', compact('certificates', 'educations', 'skills', 'languages', 'languageSetup', 'employees'));  // Use $languageSetupModel
    }


    public function show($employee_id)
    {
        // Fetch the specific employee
        $employee = employeeModel::findOrFail($employee_id);

        // Fetch qualifications specific to this employee
        $certificates = certificateModel::where('employee_id', $employee_id)->get();
        $educations = educationModel::where('employee_id', $employee_id)->get();
        $skills = skillsModel::where('employee_id', $employee_id)->get();
        $languages = languagesModel::where('employee_id', $employee_id)->get();

        return view('qualifications.show', compact('employee', 'certificates', 'educations', 'skills', 'languages'));
    }

}
