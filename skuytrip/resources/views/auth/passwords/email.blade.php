@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1596394516093-501ba68a0ba6');">
    <div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md mx-4">
        <h1 class="text-3xl font-bold mb-2">Reset Password</h1>
        <p class="text-gray-600 mb-8">Enter your email address and we'll send you a link to reset your password.</p>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            
            <div>
                <label class="text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent @error('email') border-red-500 @enderror" required>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl hover:bg-opacity-90 transition-all">
                Send Password Reset Link
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Remember your password? 
            <a href="{{ route('login') }}" class="text-primary hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection 