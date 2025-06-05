@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative min-h-screen">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1571366343168-631c5bcca7a4?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover" alt="Kepulauan Riau">
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        </div>
        
        <!-- Hero Content -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen flex flex-col justify-center">
            <div class="max-w-3xl">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white mb-4">Welcome to<br>Kepulauan Riau</h1>
                <p class="text-lg sm:text-xl text-white mb-8">Adventure and Tranquility</p>
                
                <!-- Search Form -->
                <div class="bg-white p-4 sm:p-6 rounded-xl shadow-lg max-w-md">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-6">
                        <h2 class="text-xl font-semibold">Discover Place</h2>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 text-sm bg-gray-100 rounded-full">LANDMARKS</span>
                            <span class="px-3 py-1 text-sm bg-gray-100 rounded-full">EXPLORE</span>
                            <span class="px-3 py-1 text-sm bg-gray-100 rounded-full">TRAVEL</span>
                        </div>
                    </div>
                    <form action="{{ route('search') }}" method="GET" class="space-y-4">
                        <input type="text" name="query" placeholder="Place Name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <button type="submit" class="w-full bg-black text-white py-3 rounded-lg hover:bg-opacity-90 transition-all">Search Place</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Destinations -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Image Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="rounded-3xl overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1596394516093-501ba68a0ba6" alt="Beach 1" class="w-full h-48 object-cover">
                </div>
                <div class="rounded-3xl overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1597466599360-3b9775841aec" alt="Beach 2" class="w-full h-48 object-cover">
                </div>
                <div class="rounded-3xl overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1596394516093-501ba68a0ba6" alt="Beach 3" class="w-full h-48 object-cover">
                </div>
            </div>

            <!-- Title Section -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold mb-2">An Unmissable<br>Tourist Attraction</h2>
                    <div class="flex items-center gap-2">
                        <div class="flex -space-x-2">
                            <img src="https://ui-avatars.com/api/?name=User1" alt="User" class="w-8 h-8 rounded-full border-2 border-white">
                            <img src="https://ui-avatars.com/api/?name=User2" alt="User" class="w-8 h-8 rounded-full border-2 border-white">
                            <img src="https://ui-avatars.com/api/?name=User3" alt="User" class="w-8 h-8 rounded-full border-2 border-white">
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="ml-1 font-semibold">4.8</span>
                            <span class="ml-1 text-gray-500">(2.7k reviews)</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2">
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

            <!-- Beach Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Beach Card 1 -->
                <div class="relative rounded-3xl overflow-hidden h-[400px] group">
                    <img src="https://images.unsplash.com/photo-1596394516093-501ba68a0ba6" alt="Beach" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/70"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-3 py-1 text-sm bg-white/20 backdrop-blur-sm rounded-full text-white">Trending</span>
                            <span class="px-3 py-1 text-sm bg-white/20 backdrop-blur-sm rounded-full text-white">Beach</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Tanjung Aan Beach</h3>
                        <p class="text-white/80 text-sm mb-4">Experience crystal clear waters and pristine white sand beaches in this tropical paradise.</p>
                        <a href="#" class="inline-flex items-center text-white group-hover:gap-2 transition-all">
                            Booking Now
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Beach Card 2 -->
                <div class="relative rounded-3xl overflow-hidden h-[400px] group">
                    <img src="https://images.unsplash.com/photo-1597466599360-3b9775841aec" alt="Beach" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/70"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-3 py-1 text-sm bg-white/20 backdrop-blur-sm rounded-full text-white">Popular</span>
                            <span class="px-3 py-1 text-sm bg-white/20 backdrop-blur-sm rounded-full text-white">Beach</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Selong Belanak Beach</h3>
                        <p class="text-white/80 text-sm mb-4">A hidden gem with perfect waves for surfing and stunning sunset views.</p>
                        <a href="#" class="inline-flex items-center text-white group-hover:gap-2 transition-all">
                            Booking Now
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Connect Section -->
    <div class="py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start gap-8">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-bold mb-4">Connect<br>With Us</h2>
                    <p class="text-gray-600">Best Hotels & Tours In One Click! only In<br>Skytrips</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-600 hover:text-primary">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-primary">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-primary">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.897 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.897-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
