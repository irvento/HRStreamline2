<?php

namespace App\Http\Controllers;

use App\Models\leavesModel;
use Illuminate\Http\Request;

class leavesController extends Controller
{
    public function index(){
        $leaves = leavesModel::all();
        return view('leaves', ['leaves'=> $leaves]);
    }
}
