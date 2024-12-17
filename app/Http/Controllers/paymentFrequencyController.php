<?php

namespace App\Http\Controllers;

use App\Models\payment_frequencyModel;
use Illuminate\Http\Request;

class paymentFrequencyController extends Controller
{
    public function index()
    {
        // Fetch all payment frequency records
        $paymentFrequencies = payment_frequencyModel::all();

        // Pass the data to the view
        return view('payment_frequency.index', compact('paymentFrequencies'));
    }
}