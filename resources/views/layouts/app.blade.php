<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video Game Database</title>
    <link rel="stylesheet" href="/css/app.css">
    @livewireStyles
</head>
<body class="bg-slate-900 text-white">
<header class="border-b border-gray-800">
    <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">

        <div class="flex flex-col lg:flex-row items-center">
            <a class="w-8 flex-none" href="/">
                <img src="/media/video-game-database-logo.svg" alt="Video Game Database">
            </a>
            <ul class="flex ml-0 lg:ml-16 mt-6 lg:mt-0 space-x-8">
                <li><a href="#" class="hover:text-gray-400">Games</a></li>
                <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
            </ul>
        </div>

        <div class="flex items-center mt-6 lg:mt-0">

            <livewire:search-dropdown/>

            <div class="ml-6">
                <a href="#"><img src="/media/avatar.svg" class="w-8 flex-none" alt=""></a>
            </div>
        </div>

    </nav>
</header>

<main class="py-8">
    <div class="container mx-auto px-4">
        @yield('content')
    </div>
</main>

<footer class="border-t border-gray-800">
    <div class="container mx-auto px-4 py-6">
        Powered by <a href="#" class="text-lime-500 hover:text-lime-400">IGDB API</a>
    </div>
</footer>
@livewireScripts
<script src="/js/app.js"></script>
@stack('scripts')
</body>
</html>
