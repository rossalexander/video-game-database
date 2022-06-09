@extends('layouts.app')
@section('content')

    {{--    Popular Games--}}
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
        {{--        Grid--}}
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 text-sm pb-16">

            {{--            Game--}}
            <div class="mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="/" alt=""
                             class="w-48 h-64 bg-gray-700 hover:opacity-75 transition-colors ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                         style="right:-20px;bottom:-20px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">Title of
                    Game</a>
                <div class="text-gray-400">Platform</div>
            </div>


        </div>{{--    End Popular Games--}}

        <div class="flex flex-col lg:flex-row my-10">
            {{--        Recently Reviewed--}}
            <div class="w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>

                <div class="space-y-12 mt-8">

                    {{--                    Game card--}}
                    <div class="bg-gray-800 rounded-lg shadow-md flex p-6">
                        <div class="relative flex-none">
                            <a href="">
                                <img src="" alt="game cover"
                                     class="w-56 h-80 bg-gray-600 hover:opacity-75 transition-colors ease-in-out duration-150">
                            </a>
                            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                                 style="right: -20px; bottom: -20px;">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                            </div>
                        </div>
                        <div class="ml-12">
                            <a href="" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">Final
                                Fantasy VII Remake</a>
                            <div class="text-gray-400 mt-1">Playstation 4</div>
                            <p class="mt-6 text-gray-400 hidden lg:block">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem beatae consequatur
                                cumque itaque labore maiores modi mollitia necessitatibus perspiciatis quisquam?
                                Consequatur dolores enim qui saepe. Aliquid atque culpa dignissimos doloremque eaque,
                                ipsum itaque mollitia natus, perspiciatis provident quam quas rerum.
                            </p>
                        </div>
                    </div>

                    {{--                    Game card--}}
                    <div class="bg-gray-800 rounded-lg shadow-md flex p-6">
                        <div class="relative flex-none">
                            <a href="">
                                <img src="" alt="game cover"
                                     class="w-56 h-80 bg-gray-600 hover:opacity-75 transition-colors ease-in-out duration-150">
                            </a>
                            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                                 style="right: -20px; bottom: -20px;">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                            </div>
                        </div>
                        <div class="ml-12">
                            <a href="" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">Final
                                Fantasy VII Remake</a>
                            <div class="text-gray-400 mt-1">Playstation 4</div>
                            <p class="mt-6 text-gray-400">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem beatae consequatur
                                cumque itaque labore maiores modi mollitia necessitatibus perspiciatis quisquam?
                                Consequatur dolores enim qui saepe. Aliquid atque culpa dignissimos doloremque eaque,
                                ipsum itaque mollitia natus, perspiciatis provident quam quas rerum.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{--        Most Anticipated--}}
            <div class="w-full lg:w-1/4 mt-12 lg:mt-0">

                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>
                <div class="space-y-10 mt-8">
                    <div class="flex">
                        <a href="">
                            <img src="" alt="game cover"
                                 class="w-16 h-24 bg-gray-600 hover:opacity-75 transition-colors ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="hover:text-gray-300">Cyberpunk 2077</a>
                            <div class="text-gray-400 text-sm mt-1">September 16, 2020</div>
                        </div>
                    </div>
                </div>

                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-20">Coming Soon</h2>
                <div class="space-y-10 mt-8">
                    <div class="flex">
                        <a href="">
                            <img src="" alt="game cover"
                                 class="w-16 h-24 bg-gray-600 hover:opacity-75 transition-colors ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="" class="hover:text-gray-300">Cyberpunk 2077</a>
                            <div class="text-gray-400 text-sm mt-1">September 16, 2020</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
