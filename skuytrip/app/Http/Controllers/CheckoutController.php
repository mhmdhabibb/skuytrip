<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'quantity' => 'required|integer|min:1',
            'phone' => 'required|string|max:20',
            'visit_date' => 'required|date',
        ]);

        $destination = Destination::findOrFail($request->destination_id);
        
        // Create booking
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'destination_id' => $destination->id,
            'name' => $request->name,
            'email' => $request->email,
            'quantity' => $request->quantity,
            'phone' => $request->phone,
            'visit_date' => $request->visit_date,
            'total_price' => $destination->price * $request->quantity,
            'status' => 'pending'
        ]);

        return redirect()->route('checkout.show', $booking);
    }

    public function show(Booking $booking)
    {
        // Ensure user can only view their own bookings
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        return view('checkout', compact('booking'));
    }
} 