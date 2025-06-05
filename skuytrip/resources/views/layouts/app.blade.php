<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Date Range Picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    <style>
        [x-cloak] { display: none !important; }
        .daterangepicker {
            @apply rounded-xl shadow-lg border-0;
        }
        .daterangepicker .calendar-table {
            @apply rounded-xl;
        }
        .daterangepicker td.active, .daterangepicker td.active:hover {
            @apply bg-primary;
        }
        .daterangepicker td.in-range {
            @apply bg-primary/10;
        }
        .daterangepicker td.available:hover {
            @apply bg-gray-100;
        }
        .daterangepicker .drp-buttons .btn {
            @apply px-4 py-2 rounded-lg;
        }
        .daterangepicker .drp-buttons .btn.btn-primary {
            @apply bg-primary text-white;
        }
        .daterangepicker .drp-buttons .btn.btn-default {
            @apply bg-gray-100 text-gray-700;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md rounded-3xl shadow-lg mt-6 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="text-xl font-bold">SKYTRIPS</a>
                <div class="hidden sm:flex space-x-8">
                    <a href="/" class="text-gray-600 hover:text-gray-900">Home</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Operators</a>
                </div>
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                        <a href="{{ route('register') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-all">Register</a>
                    @else
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                                    <span class="text-sm font-medium text-primary">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <span class="text-gray-600">{{ Auth::user()->name }}</span>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            
                            <div x-show="open" 
                                @click.away="open = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 rounded-xl bg-white shadow-lg py-1"
                            >
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Profile Settings
                                </a>
                                <a href="{{ route('profile') }}#purchases" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Purchase History
                                </a>
                                <hr class="my-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <!-- Notifications -->
        <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md mx-4 space-y-4">
            @if (session('success'))
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-init="setTimeout(() => show = false, 2000)"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform translate-y-2"
                    class="bg-green-100 border border-green-400 text-green-700 px-6 py-3 rounded-lg shadow-lg flex items-center justify-between"
                >
                    <p>{{ session('success') }}</p>
                    <button @click="show = false" class="text-green-700 hover:text-green-900 focus:outline-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-init="setTimeout(() => show = false, 2000)"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform translate-y-2"
                    class="bg-red-100 border border-red-400 text-red-700 px-6 py-3 rounded-lg shadow-lg flex items-center justify-between"
                >
                    <p>{{ session('error') }}</p>
                    <button @click="show = false" class="text-red-700 hover:text-red-900 focus:outline-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            @endif
        </div>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-sm text-gray-500">
                © 2024 Copyright By SkyTrips
            </div>
        </div>
    </footer>

    <script>
        $(function() {
            $('#daterange').daterangepicker({
                opens: 'left',
                minDate: moment(),
                locale: {
                    format: 'DD MMM YYYY'
                }
            }, function(start, end, label) {
                $('#start_date').val(start.format('YYYY-MM-DD'));
                $('#end_date').val(end.format('YYYY-MM-DD'));
                const days = end.diff(start, 'days') + 1;
                $('#duration').val(days);
            });
        });
    </script>
</body>
</html> 