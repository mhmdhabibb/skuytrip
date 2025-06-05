@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://images.unsplash.com/photo-1597466599360-3b9775841aec?q=80&w=2064');">
    <div class="bg-white p-12 rounded-[32px] shadow-2xl w-full max-w-[480px] mx-4">
        <h1 class="text-[32px] font-bold mb-2">Login</h1>
        <p class="text-gray-600 mb-8">Login to access your travelwise account</p>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative">
                    <input type="email" name="email" value="{{ old('email') }}" 
                        class="w-full px-4 py-3.5 rounded-2xl border border-gray-200 focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent placeholder-gray-400 @error('email') border-red-500 @enderror" 
                        placeholder="john.doe@gmail.com" 
                        required
                    >
                </div>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" name="password" 
                        class="w-full px-4 py-3.5 rounded-2xl border border-gray-200 focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent @error('password') border-red-500 @enderror" 
                        required
                    >
                    <button type="button" 
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none" 
                        onclick="togglePassword(this)"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between pt-2">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-[#4F46E5] focus:ring-[#4F46E5]">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-[#4F46E5] hover:text-[#4338CA] transition-colors">
                    Forgot Password
                </a>
            </div>

            <button type="submit" class="w-full bg-[#4F46E5] text-white py-4 rounded-2xl hover:bg-[#4338CA] transition-colors font-medium mt-6">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-[#4F46E5] hover:text-[#4338CA] transition-colors">Sign up</a>
        </p>
    </div>
</div>

<script>
function togglePassword(button) {
    const input = button.parentElement.querySelector('input');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
@endsection 