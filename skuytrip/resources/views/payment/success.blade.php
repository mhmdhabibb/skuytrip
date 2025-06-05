@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center">
    <div class="max-w-2xl mx-auto px-4 text-center">
        <div class="mb-8">
            <div class="w-24 h-24 mx-auto bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>
        
        <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-primary to-primary-dark bg-clip-text text-transparent">
            Payment Successful!
        </h1>
        
        @if($purchase)
            <div class="bg-white rounded-3xl shadow-lg p-6 mb-8">
                <div class="flex items-center space-x-4 mb-6">
                    <img src="{{ $purchase->destination->image_url }}" alt="{{ $purchase->destination->name }}" class="w-24 h-24 rounded-xl object-cover">
                    <div class="text-left">
                        <h3 class="text-xl font-semibold">{{ $purchase->destination->name }}</h3>
                        <p class="text-gray-500">{{ $purchase->destination->location }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 text-left">
                    <div>
                        <p class="text-sm text-gray-500">Duration</p>
                        <p class="font-medium">{{ $purchase->duration }} day(s)</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tickets</p>
                        <p class="font-medium">{{ $purchase->ticket_quantity }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Status</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            {{ ucfirst($purchase->status) }}
                        </span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Amount</p>
                        <p class="font-medium">Rp{{ number_format($purchase->total_amount, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @else
            <p class="text-gray-600 mb-8">Your payment has been processed successfully.</p>
        @endif

        <div class="space-x-4">
            <a href="{{ route('profile') }}#purchases" class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-xl hover:bg-opacity-90 transition-all">
                View My Purchases
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="{{ route('destinations') }}" class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all">
                Browse More
            </a>
        </div>
    </div>
</div>

<!-- Confetti Animation -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script>
    // Trigger confetti animation
    confetti({
        particleCount: 100,
        spread: 70,
        origin: { y: 0.6 }
    });
</script>
@endsection 