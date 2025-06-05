<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function process(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'ticket_quantity' => 'required|integer|min:1',
            'duration' => 'required|integer|min:1',
            'payment_method' => 'required|in:visa,mastercard,paypal'
        ]);

        $destination = Destination::findOrFail($validated['destination_id']);
        
        // Calculate total amount
        $total_amount = $destination->price * $validated['ticket_quantity'] * $validated['duration'];
        
        // Create purchase record
        $purchase = Purchase::create([
            'user_id' => Auth::id(),
            'destination_id' => $destination->id,
            'ticket_quantity' => $validated['ticket_quantity'],
            'duration' => $validated['duration'],
            'total_amount' => $total_amount,
            'status' => 'completed'
        ]);

        return redirect()->route('payment.success')->with('purchase_id', $purchase->id);
    }

    public function success()
    {
        $purchase = null;
        if (session('purchase_id')) {
            $purchase = Purchase::with('destination')->find(session('purchase_id'));
        }
        return view('payment.success', compact('purchase'));
    }

    public function transactions()
    {
        return redirect()->route('profile', ['#purchases']);
    }
} 