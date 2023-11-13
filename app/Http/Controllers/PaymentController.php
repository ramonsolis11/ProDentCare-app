<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }


    public function create()
    {

        return view('payments.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')
                        ->with('success','Payment registered successfully.');
    }


    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }


    public function edit(Payment $payment)
    {

        return view('payments.edit', compact('payment'));
    }


    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')
                        ->with('success','Payment updated successfully.');
    }


    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')
                        ->with('success','Payment deleted successfully.');
    }
}

