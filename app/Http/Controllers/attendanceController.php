<?php

namespace App\Http\Controllers;

use App\Models\attendanceModel;
use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function index(){
        $attendance = attendanceModel::all();
        return view('attendance', ['attendance'=> $attendance]);
    }
}
