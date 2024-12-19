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

}
