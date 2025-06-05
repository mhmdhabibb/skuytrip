@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative w-full h-[80vh] min-h-[600px]">
        <img src="{{ $destination->image_url }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/0 via-black/0 to-black/60"></div>
        <div class="absolute bottom-0 w-full">
            <div class="max-w-[1440px] mx-auto px-12 pb-12">
                <h1 class="text-5xl font-bold text-white">{{ $destination->name }}</h1>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-[1440px] mx-auto px-12 py-16">
        <div class="flex gap-20">
            <!-- Left Column -->
            <div class="flex-1">
                <!-- Overview -->
                <section class="mb-16">
                    <h2 class="text-2xl font-bold mb-6">Overview</h2>
                    <p class="text-gray-600 leading-relaxed mb-8">{{ $destination->description }}</p>
                    <div class="flex gap-3">
                        <span class="px-6 py-2 bg-gray-100 rounded-full text-sm">Beach</span>
                        <span class="px-6 py-2 bg-gray-100 rounded-full text-sm">Natural</span>
                        <span class="px-6 py-2 bg-gray-100 rounded-full text-sm">Island</span>
                    </div>
                </section>

                <!-- Reviews -->
                <section class="mb-16">
                    <h2 class="text-2xl font-bold mb-2">Customers Are Happy</h2>
                    <p class="text-gray-600 mb-8">With Our Services</p>
                    <div class="flex gap-6 overflow-x-auto pb-4 -mx-4 px-4 scrollbar-hide">
                        @foreach(range(1,3) as $i)
                        <div class="min-w-[360px] bg-white rounded-2xl p-6 border border-gray-100">
                            <div class="flex gap-1 text-yellow-400 mb-4">
                                @for ($star = 0; $star < 5; $star++)
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-gray-600 mb-6">"Super convenient! I just picked the direction, paid online, and got the e-ticket instantly. No more waiting in long lines. Highly recommended!"</p>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-sm">
                                    {{ $i === 1 ? 'IN' : ($i === 2 ? 'SL' : 'AR') }}
                                </div>
                                <div>
                                    <h4 class="font-medium">{{ $i === 1 ? 'Intan' : ($i === 2 ? 'Sarah Lopez' : 'Adit R') }}</h4>
                                    <p class="text-sm text-gray-500">Customer</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- Connect Section -->
                <section>
                    <h2 class="text-3xl font-bold mb-2">Connect</h2>
                    <h2 class="text-3xl font-bold mb-4">With Us</h2>
                    <p class="text-gray-600">Best Hotels & Tours in One Click! only in Skytrips</p>
                </section>
            </div>

            <!-- Right Column - Booking Form -->
            <div class="w-[480px]">
                <div class="sticky top-24 bg-white rounded-3xl border border-[#FF4D00]/20 p-8">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-8 h-8 rounded-lg bg-[#FF4D00]/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#FF4D00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold">Booking</h3>
                    </div>
                    <form action="{{ route('checkout.process') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-4 flex items-center">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full pl-12 pr-4 py-4 bg-gray-50 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF4D00] focus:bg-white transition-colors">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-4 flex items-center">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full pl-12 pr-4 py-4 bg-gray-100 rounded-xl text-gray-500 cursor-not-allowed" readonly>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ticket Quantity</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-4 flex items-center">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                    </svg>
                                </div>
                                <input type="number" name="quantity" min="1" value="1" class="w-full pl-12 pr-4 py-4 bg-gray-50 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF4D00] focus:bg-white transition-colors">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Active Phone Number</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-4 flex items-center">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <input type="tel" name="phone" placeholder="Place Phone Number" class="w-full pl-12 pr-4 py-4 bg-gray-50 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF4D00] focus:bg-white transition-colors" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Visit Date</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-4 flex items-center">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="text" name="visit_date" id="daterange" placeholder="Date" class="w-full pl-12 pr-4 py-4 bg-gray-50 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF4D00] focus:bg-white transition-colors" readonly required>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-[#FF4D00] text-white py-4 rounded-xl hover:bg-opacity-90 transition-colors font-medium">
                            Booking Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
/* Hide scrollbar for Chrome, Safari and Opera */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.scrollbar-hide {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}

/* Base styles */
body {
    @apply bg-white;
}

/* Form styles */
input:focus {
    outline: none;
}

/* Card hover effects */
.group:hover .group-hover\:gap-2 {
    gap: 0.5rem;
}

/* Line clamp */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style> 