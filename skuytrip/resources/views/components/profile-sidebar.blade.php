<div class="lg:col-span-1">
    <div class="bg-white rounded-3xl shadow-lg p-6 space-y-4">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center">
                <span class="text-2xl font-bold text-primary">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
            <div>
                <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <hr>
        <nav class="space-y-2">
            <a href="#profile" class="block px-4 py-2 rounded-xl hover:bg-primary/5 text-primary font-medium">Profile Settings</a>
            <a href="#change-password" class="block px-4 py-2 rounded-xl hover:bg-primary/5 text-gray-600 hover:text-gray-900">Change Password</a>
            <a href="#purchases" class="block px-4 py-2 rounded-xl hover:bg-primary/5 text-gray-600 hover:text-gray-900">Purchase History</a>
        </nav>
    </div>
</div> 