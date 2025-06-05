@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4">Explore Amazing Destinations</h1>
            <p class="text-xl text-gray-600">Discover beautiful places and create unforgettable memories</p>
        </div>

        <!-- Destinations Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($destinations as $destination)
            <div class="bg-white rounded-[32px] overflow-hidden shadow-lg group hover:shadow-xl transition-shadow">
                <a href="{{ route('destination.show', $destination->id) }}" class="block">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="{{ $destination->image_url }}" alt="{{ $destination->name }}" 
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/60"></div>
                        <div class="absolute top-6 left-6 flex gap-2">
                            @foreach(json_decode($destination->features, true) as $feature)
                                @if($loop->first)
                                <span class="px-4 py-2 text-sm bg-white/20 backdrop-blur-sm rounded-full text-white font-medium">
                                    {{ $feature }}
                                </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-xl font-bold">{{ $destination->name }}</h3>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="ml-1 font-medium">{{ number_format($destination->rating, 1) }}</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $destination->description }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-sm text-gray-500">Starting from</span>
                                <p class="text-lg font-bold text-primary">Rp{{ number_format($destination->price, 0, ',', '.') }}</p>
                            </div>
                            <span class="inline-flex items-center text-primary group-hover:gap-2 transition-all">
                                View Details
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection 