<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skytrips - Explore Kepulauan Riau</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css'])

    <style>
        .bg-overlay {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3));
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="relative">
        @yield('content')
    </div>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</body>
</html> 