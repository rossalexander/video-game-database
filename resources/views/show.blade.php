@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img class="" src="{{ $game['cover-image-url'] }}"
                     alt="{{$game['name']}}">
            </div>

            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl mt-4 lg:mt-0">{{$game['name']}}</h2>
                <div class="text-gray-400 mt-2">

                    @if($game['genres'])
                        <p>
                            {{$game['genres']}}
                        </p>
                    @endif

                    @if($game['involved-companies'])
                        <p>{{$game['involved-companies']}}</p>
                    @endif

                    @if($game['platforms'])
                        <p>{{$game['platforms']}}</p>
                    @endif

                </div>

                <div class="flex flex-wrap items-center mt-8">

                    {{--                    Member Score--}}
                    @if($game['member-rating'])
                        <div class="flex items-center">
                            <div class="w-16 h-16 bg-gray-800 rounded-full">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">
                                    {{$game['member-rating']}}
                                </div>
                            </div>
                            <div class="ml-4 text-xs">Member<br>Score</div>
                        </div>
                    @endif

                    {{--                    Critic Score--}}
                    @if($game['critic-rating'])
                        <div class="flex items-center ml-12">
                            <div class="w-16 h-16 bg-gray-800 rounded-full">
                                <div
                                    class="font-semibold text-xs flex justify-center items-center h-full">
                                    {{$game['critic-rating']}}
                                </div>
                            </div>
                            <div class="ml-4 text-xs">Critic<br>Score</div>
                        </div>
                    @endif

                    <div class="flex items-center space-x-4 mt-4 lg:mt-0 lg:ml-12">
                        @if($game['social']['website'])
                            @include('social.website')
                        @endif
                        @if($game['social']['twitter'])
                            @include('social.twitter')
                        @endif
                        @if($game['social']['facebook'])
                            @include('social.facebook')
                        @endif
                        @if($game['social']['instagram'])
                            @include('social.instagram')
                        @endif
                    </div>

                </div>

                @if(array_key_exists('summary', $game))
                    <p class="mt-12">{{$game['summary']}}</p>
                @endif


                @if($game['video'])
                    <div class="mt-12">
                        <a href="{{$game['video']}}"
                           class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-400 rounded transition ease-in-out duration-150">
                            <svg class="w-6 mt-px" fill="white" viewBox="0 0 24 24" width="24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                      d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23Z"
                                      fill="currentColor" fill-rule="evenodd"/>
                                <path d="M16 12L10 16.3301V7.66987L16 12Z" fill="currentColor"/>
                            </svg>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                @endif


            </div>
        </div><!-- end game details -->

        @if(array_key_exists('videos', $game))

            @if($game['screenshots'])
                <div class="border-b border-gray-800 pb-12 mt-8">
                    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                        @foreach($game['screenshots'] as $screenshot)
                            <a href="{{$screenshot['huge']}}">
                                <img src="{{ $screenshot['big']  }}" alt=""
                                     class="bg-gray-700 hover:opacity-75 transition-colors ease-in-out duration-150">
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif

        <div class="pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Games</h2>
            {{--        Grid--}}
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 text-sm">

                @if($game['similar-games'])

                    @foreach($game['similar-games'] as $game)
                        {{--            Game--}}
                        <div class="mt-8">
                            <div class="relative inline-block">

                                @if(array_key_exists('cover', $game))
                                    <a href="{{$game['slug']}}">
                                        <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}"
                                             alt="{{$game['name']}}"
                                             class="w-48 h-64 bg-gray-700 hover:opacity-75 transition-colors ease-in-out duration-150">
                                    </a>
                                @endif

                                @if($game['rating'])
                                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                                         style="right:-20px;bottom:-20px;">
                                        <div
                                            class="font-semibold text-xs flex justify-center items-center h-full">{{ $game['rating'] }}</div>
                                    </div>
                                @endif

                            </div>
                            <a href="#"
                               class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                                {{ $game['name'] }}
                            </a>


                            {{ $game['platforms'] }}


                        </div>

                    @endforeach
                @endif


            </div>
        </div>{{--    End Similar Games--}}

    </div>
@endsection
