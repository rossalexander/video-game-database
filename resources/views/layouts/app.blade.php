<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video Game Database</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="bg-slate-900 text-white">
<header class="border-b border-gray-800">
    <nav class="container mx-auto flex items-center justify-between px-4 py-6">

        <div class="flex items-center">
            <a class="w-8 flex-none mr-8" href="/">
                <img src="/media/video-game-database-logo.svg" alt="Video Game Database">
            </a>
            <ul class="flex space-x-8">
                <li><a href="#" class="hover:text-gray-400">Games</a></li>
                <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
            </ul>
        </div>

        <div class="flex items-center">
            <div class="relative">
                <input type="text" class="focus:shadow-outline bg-gray-800 text-sm rounded-full px-3 py-1 w-64"
                       placeholder="Search...">
            </div>
            <div class="ml-6">
                <a href="#"><img src="/media/avatar.svg" class="w-8 flex-none" alt=""></a>
            </div>
        </div>

    </nav>
</header>

<main class="py-8">
    @yield('content')
</main>

<footer class="border-t border-stone-800">
    <div class="container mx-auto px-4 py-6">
        Powered by <a href="#" class="text-lime-500 hover:text-lime-400">IGDB API</a>
    </div>
</footer>

</body>
</html>
