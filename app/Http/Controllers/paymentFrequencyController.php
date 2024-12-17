<?php

namespace App\Http\Controllers;

use App\Models\paymentFrequencyModel;
use Illuminate\Http\Request;

class paymentFrequencyController extends Controller
{
    public function index()
    {
        // Fetch all payment frequency records
        $paymentFrequencies = paymentFrequencyModel::all();

        // Pass the data to the view
        return view('payment_frequency.index', compact('paymentFrequencies'));
    }
}