<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
    
    <!-- Tailwind CDN !-->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class='sticky top-0 flex shadow-lg py-4 px-4 sm:px-10 bg-white font-[sans-serif] min-h-[70px] tracking-wide z-50'>
        @include('layouts.header')
    </header>

    <main class="min-h-screen mx-auto mt-8">
        @yield('content')
    </main>

    <footer class="font-sans tracking-wide bg-gray-50 px-10 pt-12 pb-6">
        @include('layouts.footer')
    </footer>
</body>
</html>