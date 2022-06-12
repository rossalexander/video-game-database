<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video Game Database</title>
    <link rel="stylesheet" href="/css/app.css">
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Open+Sans:wght@400;600&display=swap"
          rel="stylesheet">
</head>
<body class="bg-slate-900 text-white">
<header class="border-b border-gray-800">
    <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">

        <div class="flex flex-col lg:flex-row items-center">
            <a class="w-8 flex-none mr-2" href="/">
                <img src="/media/video-game-database-logo.svg" alt="Video Game Database">
            </a>
            <a href="/" class="mt-2 lg:mt-0 text-gray-300" style="font-family: 'Comfortaa', cursive;">Video Game
                Database</a>
        </div>

        <div class="flex items-center mt-6 lg:mt-0">
            <livewire:search-dropdown/>
        </div>

    </nav>
</header>

<main class="py-8">
    <div class="container mx-auto px-4">
        @yield('content')
    </div>
</main>

<footer class="border-t border-gray-800">
    <div class="container flex justify-between mx-auto px-4 py-6 text-sm text-gray-400">
        <span>Powered by <a target="_blank" href="https://api-docs.igdb.com/#about"
                            class="text-lime-500 hover:text-lime-400">IGDB API</a></span>
        <span>Developed by <a target="_blank" class="text-lime-500 hover:text-lime-400"
                              href="https://github.com/rossalexander/video-game-database">Ross Alexander</a></span>
    </div>
</footer>
@livewireScripts
<script src="/js/app.js"></script>
@stack('scripts')
</body>
</html>
