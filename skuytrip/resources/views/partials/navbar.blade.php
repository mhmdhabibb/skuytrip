<nav class="flex items-center justify-between p-4 bg-white shadow-sm">
  <!-- Logo -->
  <div class="text-2xl font-bold text-gray-800">
    <a href="{{ url('/') }}">SKUYTRIPS</a>
  </div>

  <!-- Menu -->
  <div class="space-x-6 hidden md:flex">
    <a href="{{ url('/') }}" class="text-gray-700 font-medium hover:text-blue-600 transition">Home</a>
    <a href="{{ url('/destinations') }}" class="text-gray-700 font-medium hover:text-blue-600 transition">Destination</a>
  </div>

  <!-- Profile Icon -->
  <div>
    <img src="{{ asset('images/pariz.jpg') }}" alt="User" class="w-10 h-10 rounded-full object-cover">
  </div>
</nav>
