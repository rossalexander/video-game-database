@extends('layouts.app')
@section('content')

    {{--    Popular Games--}}
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
        {{--        Grid--}}
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 text-sm pb-16">

            @foreach($popularGames as $game)
                <div class="mt-8">
                    <div class="relative inline-block">
                        <a href="#">
                            <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}"
                                 alt="{{$game['name']}}"
                                 class="hover:opacity-75 transition-colors ease-in-out duration-150">
                        </a>
                        @if(array_key_exists('rating', $game))
                            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                                 style="right:-20px;bottom:-20px;">
                                <div
                                    class="font-semibold text-xs flex justify-center items-center h-full">{{round($game['rating']).'%'}}
                                </div>
                            </div>
                        @endif

                    </div>
                    <a href="#"
                       class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
                    <div class="text-gray-400">
                        @foreach($game['platforms'] as $platform)
                            @if(array_key_exists('abbreviation', $platform))
                                {{$platform['abbreviation']}},
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach


        </div>{{--    End Popular Games--}}

        <div class="flex flex-col lg:flex-row my-10">
            {{--        Recently Reviewed--}}
            <div class="w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>

                <div class="space-y-12 mt-8">

                    @foreach($recentlyReviewed as $game)
                        <div class="bg-gray-800 rounded-lg shadow-md flex p-6">
                            <div class="relative flex-none">
                                <a href="">
                                    <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}"
                                         alt="{{$game['name']}}"
                                         class="w-48 hover:opacity-75 transition-colors ease-in-out duration-150">
                                </a>
                                @if(array_key_exists('rating', $game))
                                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                                         style="right: -20px; bottom: -20px;">
                                        <div
                                            class="font-semibold text-xs flex justify-center items-center h-full">{{round($game['rating']).'%'}}</div>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-12">
                                <a href=""
                                   class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">{{$game['name']}}</a>
                                <div class="text-gray-400 mt-1">
                                    @foreach($game['platforms'] as $platform)
                                        @if(array_key_exists('abbreviation', $platform))
                                            {{$platform['abbreviation']}},
                                        @endif
                                    @endforeach
                                </div>
                                <p class="mt-6 text-gray-400 hidden lg:block">
                                    {{$game['summary']}}
                                </p>
                            </div>
                        </div>
                    @endforeach


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
