@include('partials.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Senua Island - Skuytrips</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
  <div class="max-w-6xl mx-auto px-4 py-6">
    <!-- Hero Image -->
    <div class="rounded-xl overflow-hidden mb-6">
        <img src="{{ asset('images/senua island.jpg') }}" alt="Senua Island" class="w-full h-[350px] object-cover">
    </div>

    <!-- Title and Booking -->
    <div class="flex flex-col md:flex-row gap-6">
      <div class="flex-1">
        <h1 class="text-3xl font-bold mb-4">Senua Island</h1>
        <p class="text-gray-600 mb-4">
          <strong>Senua Island</strong> is located just off the eastern coast of Nusa Batam. Offers a breathtaking beach with soft white sand and crystal clear water, surrounded by vibrant coral reefs. Great spot for snorkeling, swimming, or simply indulging in the untouched beauty of a tropical paradise.
        </p>
        <div class="flex gap-2">
          <span class="text-sm bg-gray-200 rounded-full px-3 py-1">Beach</span>
          <span class="text-sm bg-gray-200 rounded-full px-3 py-1">Snorkeling</span>
        </div>
      </div>
      <div class="w-full md:w-1/3">
        <div class="border border-orange-400 rounded-xl p-4 shadow-md">
          <h2 class="text-lg font-bold mb-4">Booking</h2>
          <form class="space-y-3">
            <input type="text" placeholder="Full Name" class="w-full border px-3 py-2 rounded">
            <input type="number" placeholder="Total Quantity" class="w-full border px-3 py-2 rounded">
            <input type="text" placeholder="Active Phone Number" class="w-full border px-3 py-2 rounded">
            <input type="date" class="w-full border px-3 py-2 rounded">
            <button class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600">Booking Now</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Customer Reviews -->
    <div class="mt-12">
      <h2 class="text-xl font-bold mb-6">Customers Are Happy With Our Services</h2>
      <div class="grid md:grid-cols-3 gap-4">
        <div class="border rounded-xl p-4 shadow">
          <p class="text-sm mb-2">⭐⭐⭐⭐⭐</p>
          <p class="text-gray-700 text-sm mb-2">Amazing view and friendly guide!</p>
          <div class="text-xs text-gray-500">- Aulia</div>
        </div>
        <div class="border rounded-xl p-4 shadow">
          <p class="text-sm mb-2">⭐⭐⭐⭐⭐</p>
          <p class="text-gray-700 text-sm mb-2">Worth every penny! Highly recommended.</p>
          <div class="text-xs text-gray-500">- Budi</div>
        </div>
        <div class="border rounded-xl p-4 shadow">
          <p class="text-sm mb-2">⭐⭐⭐⭐⭐</p>
          <p class="text-gray-700 text-sm mb-2">Best vacation experience I ever had.</p>
          <div class="text-xs text-gray-500">- Clara</div>
        </div>
      </div>
    </div>

    <!-- More Destinations -->
    <div class="mt-16">
      <div class="grid md:grid-cols-2 gap-6">
        <div class="relative rounded-xl overflow-hidden shadow-lg">
          <img src="/images/batu sindu.jpg" alt="Batu Sindu Beach" class="w-full h-60 object-cover">
          <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/60 to-transparent text-white p-4">
            <h3 class="text-lg font-bold">Batu Sindu Beach</h3>
            <a href="#" class="mt-2 inline-block bg-white text-black text-sm font-semibold px-4 py-1 rounded-full">View More</a>
          </div>
        </div>
        <div class="relative rounded-xl overflow-hidden shadow-lg">
          <img src="/images/batu kasah.jpg" alt="Batu Kasah Beach" class="w-full h-60 object-cover">
          <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/60 to-transparent text-white p-4">
            <h3 class="text-lg font-bold">Batu Kasah Beach</h3>
            <a href="#" class="mt-2 inline-block bg-white text-black text-sm font-semibold px-4 py-1 rounded-full">View More</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="mt-16 border-t pt-6 text-center text-sm text-gray-500">
      <p>Connect With Us</p>
      <div class="mt-2 flex justify-center space-x-6">
        <a href="#">Privacy</a>
        <a href="#">Destination</a>
      </div>
      <p class="mt-4">&copy; 2025 SkuyTrips</p>
    </footer>
  </div>
</body>
</html>
