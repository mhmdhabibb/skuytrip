@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <x-profile-sidebar />

            <!-- Main Content -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Profile Settings -->
                <div id="profile" class="bg-white rounded-3xl shadow-lg p-6">
                    <h3 class="text-xl font-bold mb-6">Profile Settings</h3>
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50" readonly>
                        </div>
                        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-opacity-90 transition-all">
                            Save Changes
                        </button>
                    </form>
                </div>
                <!-- Change Password -->
                <div id="change-password" class="bg-white rounded-3xl shadow-lg p-6">
                    <h3 class="text-xl font-bold mb-6">Change Password</h3>
                    <form action="{{ route('profile.password.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                            <input type="password" name="current_password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                            @error('current_password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-opacity-90 transition-all">
                            Update Password
                        </button>
                    </form>
                </div>
                <!-- Purchase History -->
                <div id="purchases" class="bg-white rounded-3xl shadow-lg p-6">
                    <h3 class="text-xl font-bold mb-6">Purchase History</h3>
                    @if($purchases->isEmpty())
                        <div class="text-center py-12">
                            <div class="w-24 h-24 mx-auto mb-6 text-gray-300">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 5h-14l1.5-2h11l1.5 2zm-14.5 2h15l-1.5 9h-12l-1.5-9zm6.5 10c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm7 0c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No purchases yet</h3>
                            <p class="text-gray-500 mb-6">Start exploring amazing destinations!</p>
                            <a href="{{ route('destinations') }}" class="inline-flex items-center text-primary hover:text-primary-dark">
                                <span>Browse Destinations</span>
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    @else
                        <div class="space-y-6">
                            @foreach($purchases as $purchase)
                                <div class="flex items-center justify-between p-6 bg-gray-50 rounded-2xl">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ $purchase->destination->image_url }}" alt="{{ $purchase->destination->name }}" class="w-20 h-20 rounded-lg object-cover">
                                        <div>
                                            <h4 class="font-semibold">{{ $purchase->destination->name }}</h4>
                                            <p class="text-sm text-gray-500">{{ $purchase->created_at->format('d M Y') }}</p>
                                            <p class="text-sm text-gray-500">{{ $purchase->ticket_quantity }} ticket(s) • {{ $purchase->duration }} day(s)</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold">Rp{{ number_format($purchase->total_amount, 0, ',', '.') }}</p>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $purchase->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst($purchase->status) }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 