<?php

namespace App\Http\Controllers;
use App\Models\certificateModel;
use App\Models\educationModel;
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
        $languageSetupModel = languagesSetupModel::all(); 
    
        return view('qualifications.index', compact('certificates', 'educations', 'skills', 'languages', 'languageSetupModel'));  // Use $languageSetupModel
    }
    
}
