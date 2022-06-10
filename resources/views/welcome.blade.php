@extends('layouts.app')
@section('content')

    {{--    Popular Games--}}
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
        <livewire:popular-games>

            <div class="flex flex-col lg:flex-row my-10">
            <livewire:recently-reviewed>

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
                    <livewire:coming-soon>

                </div>
            </div>
    </div>

@endsection
