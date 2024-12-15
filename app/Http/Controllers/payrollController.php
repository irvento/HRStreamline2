<?php

namespace App\Http\Controllers;

use App\Models\payrollModel;
use Illuminate\Http\Request;

class payrollController extends Controller
{
    public function index(){
        $payroll = payrollModel::all();
        return view('payroll', ['payroll'=> $payroll]);
    }
}
