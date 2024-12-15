<?php

namespace App\Http\Controllers;

use App\Models\performanceModel;
use Illuminate\Http\Request;

class performanceController extends Controller
{
    public function index(){
        $performance = performanceModel::all();
        return view('performance', ['performance'=> $performance]);
    }
}
