@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-16">
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
        <div class="p-8">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-8 h-8 rounded-lg bg-[#FF4D00]/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#FF4D00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold">Checkout</h1>
            </div>

            <!-- Booking Details -->
            <div class="space-y-6 mb-8">
                <div class="flex justify-between pb-6 border-b border-gray-100">
                    <div>
                        <h2 class="font-medium mb-1">{{ $booking->destination->name }}</h2>
                        <p class="text-sm text-gray-500">{{ $booking->visit_date->format('l, F j, Y') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium mb-1">{{ number_format($booking->quantity) }} Ticket(s)</p>
                        <p class="text-sm text-gray-500">Rp{{ number_format($booking->destination->price) }} / ticket</p>
                    </div>
                </div>

                <!-- Customer Details -->
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Name</span>
                        <span class="font-medium">{{ $booking->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Email</span>
                        <span class="font-medium">{{ $booking->email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Phone</span>
                        <span class="font-medium">{{ $booking->phone }}</span>
                    </div>
                </div>

                <!-- Total -->
                <div class="pt-6 border-t border-gray-100">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-medium">Total</span>
                        <span class="text-2xl font-bold">Rp{{ number_format($booking->total_price) }}</span>
                    </div>
                </div>
            </div>

            <!-- Payment Options -->
            <form action="{{ route('payment.process') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                
                <div class="space-y-4">
                    <label class="block">
                        <input type="radio" name="payment_method" value="credit_card" class="sr-only peer">
                        <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 cursor-pointer peer-checked:border-[#FF4D00] peer-checked:bg-[#FF4D00]/5">
                            <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium">Credit Card</h3>
                                <p class="text-sm text-gray-500">Pay with credit card</p>
                            </div>
                        </div>
                    </label>

                    <label class="block">
                        <input type="radio" name="payment_method" value="bank_transfer" class="sr-only peer" checked>
                        <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 cursor-pointer peer-checked:border-[#FF4D00] peer-checked:bg-[#FF4D00]/5">
                            <div class="w-12 h-12 rounded-lg bg-green-50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium">Bank Transfer</h3>
                                <p class="text-sm text-gray-500">Pay via bank transfer</p>
                            </div>
                        </div>
                    </label>
                </div>

                <button type="submit" class="w-full bg-[#FF4D00] text-white py-4 rounded-xl hover:bg-opacity-90 transition-colors font-medium">
                    Continue to Payment
                </button>
            </form>
        </div>
    </div>
</div>
@endsection 