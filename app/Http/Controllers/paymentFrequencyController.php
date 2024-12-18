<?php

namespace App\Http\Controllers;

use App\Models\PaymentFrequencyModel;
use Illuminate\Http\Request;

class paymentFrequencyController extends Controller
{
    // Display a list of payment frequencies
    public function index()
    {
        $paymentFrequencies = PaymentFrequencyModel::all();
        return view('payment-frequency.index', compact('paymentFrequencies'));
    }

    // Show the form to create a new payment frequency
    public function create()
    {
        return view('payment-frequency.create');
    }

    // Store a new payment frequency in the database
    public function store(Request $request)
    {
        $request->validate([
            'payment_name' => 'required|string|max:255',
        ]);

        PaymentFrequencyModel::create([
            'payment_name' => $request->input('payment_name'),
        ]);

        // Redirect to the salaries page with the anchor for PaymentFrequencyType tab
        return redirect()->to('/salaries#PaymentFrequencyType')
            ->with('success', 'Payment frequency created successfully.');
    }

    // Show a specific payment frequency
    public function show($id)
    {
        // Find the payment frequency by ID
        $paymentFrequency = PaymentFrequencyModel::findOrFail($id);
    
        // Return the view for displaying the payment frequency details
        return view('payment-frequency.show', compact('paymentFrequency'));
    }
    

    // Show the form to edit an existing payment frequency
    public function edit($id)
    {
        $paymentFrequency = PaymentFrequencyModel::findOrFail($id);
        return view('payment-frequency.edit', compact('paymentFrequency'));
    }

    // Update an existing payment frequency
    public function update(Request $request, $id)
    {
        $request->validate([
            'payment_name' => 'required|string|max:255',
        ]);

        $paymentFrequency = PaymentFrequencyModel::findOrFail($id);
        $paymentFrequency->update([
            'payment_name' => $request->input('payment_name'),
        ]);

        // Redirect to the salaries page with the anchor for PaymentFrequencyType tab
        return redirect()->to('/salaries#PaymentFrequencyType')
            ->with('success', 'Payment frequency updated successfully.');
    }

    // Delete a payment frequency
    public function destroy($id)
    {
        $paymentFrequency = PaymentFrequencyModel::findOrFail($id);
        $paymentFrequency->delete();

        // Redirect to the salaries page with the anchor for PaymentFrequencyType tab
        return redirect()->to('/salaries#PaymentFrequencyType')
            ->with('success', 'Payment frequency deleted successfully.');
    }
}
