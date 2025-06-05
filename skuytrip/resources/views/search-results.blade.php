@extends('layouts.app')

@section('content')
    <!-- Search Input -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form action="{{ route('search') }}" method="GET" class="flex gap-2 max-w-2xl mx-auto">
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" name="query" value="{{ request('query') }}" placeholder="Bintan" class="w-full pl-10 pr-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
            </div>
            <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-opacity-90 transition-all">Search</button>
        </form>
    </div>

    <!-- Popular Beach Section -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-6">Popular Beach</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($results as $destination)
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden group hover:shadow-xl transition-all">
                    <a href="{{ route('destination.show', $destination->id) }}" class="block">
                        <div class="relative h-48">
                            <img src="{{ $destination->image_url }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="{{ $destination->name }}">
                        </div>
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-lg font-semibold">{{ $destination->name }}</h3>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="ml-1 font-semibold">{{ $destination->rating }}</span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">{{ $destination->location }}</p>
                            <div class="text-sm text-gray-500 mb-4">
                                @if(isset($destination->features))
                                    <ul class="list-disc list-inside">
                                        @foreach(json_decode($destination->features) as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-semibold">Rp{{ number_format($destination->price, 0, ',', '.') }}</span>
                                <span class="text-sm text-gray-500">per person</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Another Beach Section -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-6">Another Beach On Kepulauan Riau</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($recommendations as $destination)
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <div class="relative h-48">
                        <img src="{{ $destination->image_url }}" class="w-full h-full object-cover" alt="{{ $destination->name }}">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold">{{ $destination->name }}</h3>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="ml-1 font-semibold">{{ $destination->rating }}</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">{{ $destination->location }}</p>
                        <div class="text-sm text-gray-500 mb-4">
                            @if(isset($destination->features))
                                <ul class="list-disc list-inside">
                                    @foreach(json_decode($destination->features) as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-semibold">Rp{{ number_format($destination->price, 0, ',', '.') }}</span>
                            <span class="text-sm text-gray-500">per person</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="flex justify-center mt-8 gap-2">
                <button class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center hover:bg-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center hover:bg-opacity-90">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>
@endsection 