@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img class="" src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}"
                     alt="{{$game['name']}}">
            </div>

            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl mt-4 lg:mt-0">{{$game['name']}}</h2>
                <div class="text-gray-400 mt-2">
                    <p>
                        @foreach($game['genres'] as $genre)
                            {{$genre['name']}},
                        @endforeach
                    </p>
                    <p>{{$game['involved_companies'][0]['company']['name']}}</p>

                    @if(array_key_exists('platforms', $game))
                        <p>
                            @foreach($game['platforms'] as $platform)
                                @if(array_key_exists('abbreviation', $platform))
                                    {{$platform['abbreviation']}},
                                @endif
                            @endforeach
                        </p>
                    @endif

                </div>

                <div class="flex flex-wrap items-center mt-8">

                    {{--                    Member Score--}}
                    @if(array_key_exists('rating', $game))
                        <div class="flex items-center">
                            <div class="w-16 h-16 bg-gray-800 rounded-full">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">

                                    {{round($game['rating']).'%'}}
                                </div>
                            </div>
                            <div class="ml-4 text-xs">Member<br>Score</div>
                        </div>
                    @endif

                    {{--                    Critic Score--}}
                    @if(array_key_exists('aggregated_rating', $game))
                        <div class="flex items-center ml-12">
                            <div class="w-16 h-16 bg-gray-800 rounded-full">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">88%</div>
                            </div>
                            <div class="ml-4 text-xs">Critic<br>Score</div>
                        </div>
                    @endif

                    <div class="flex items-center space-x-4 mt-4 lg:mt-0 lg:ml-12">
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400">
                                <svg class="w-5 h-5" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/>
                                    <g data-name="twitter bird social media trending"
                                       id="twitter_bird_social_media_trending">
                                        <path fill="white"
                                              d="M28.77,8.11a.87.87,0,0,0-.23-.2A4.69,4.69,0,0,0,29,6.54a1,1,0,0,0-.44-1,1,1,0,0,0-1.1,0,6.42,6.42,0,0,1-2.28.92,6.21,6.21,0,0,0-7.08-1A6.07,6.07,0,0,0,15,12.2a1,1,0,0,0,2-.4A4.08,4.08,0,0,1,19,7.28a4.24,4.24,0,0,1,5.12,1,1,1,0,0,0,.88.28l.25,0a1,1,0,0,0,.34,1.62,1,1,0,0,0-.36.88,13.07,13.07,0,0,1-4.89,11.24A12.75,12.75,0,0,1,7.69,24.61a9.06,9.06,0,0,0,4.54-2.18,1,1,0,0,0,.15-1.09,1,1,0,0,0-.93-.57,4,4,0,0,1-3-1.39,3.63,3.63,0,0,0,1-.35A1,1,0,0,0,10,18a1,1,0,0,0-.76-.84,4.42,4.42,0,0,1-3-2.48c.24,0,.48.05.74.06a1,1,0,0,0,1-.62A1,1,0,0,0,7.67,13C6,11.48,5.59,9.85,5.83,8.7a13.88,13.88,0,0,0,7,4,1,1,0,1,0,.38-2A12.1,12.1,0,0,1,6.39,6.31a1,1,0,0,0-.75-.38,1,1,0,0,0-.78.33,5.34,5.34,0,0,0-.31,6l-.09,0a1,1,0,0,0-.52.81,5.84,5.84,0,0,0,1.95,4.47,1,1,0,0,0-.18,1,6.63,6.63,0,0,0,3.18,3.57A13.89,13.89,0,0,1,4,23a1,1,0,0,0-.5,1.86A16.84,16.84,0,0,0,12,27.35a15.16,15.16,0,0,0,9.6-3.57,15.12,15.12,0,0,0,5.69-12.42,4.62,4.62,0,0,0,1.62-2.25A1,1,0,0,0,28.77,8.11Z"/>
                                    </g>
                                </svg>
                            </a>
                        </div>

                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400">
                                <svg class="w-5 h-5" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 56.7 56.7" xml:space="preserve">
<g>
    <path fill="white" d="M28.2,16.7c-7,0-12.8,5.7-12.8,12.8s5.7,12.8,12.8,12.8S41,36.5,41,29.5S35.2,16.7,28.2,16.7z M28.2,37.7
		c-4.5,0-8.2-3.7-8.2-8.2s3.7-8.2,8.2-8.2s8.2,3.7,8.2,8.2S32.7,37.7,28.2,37.7z"/>
    <circle fill="white" cx="41.5" cy="16.4" r="2.9"/>
    <path fill="white" d="M49,8.9c-2.6-2.7-6.3-4.1-10.5-4.1H17.9c-8.7,0-14.5,5.8-14.5,14.5v20.5c0,4.3,1.4,8,4.2,10.7c2.7,2.6,6.3,3.9,10.4,3.9
		h20.4c4.3,0,7.9-1.4,10.5-3.9c2.7-2.6,4.1-6.3,4.1-10.6V19.3C53,15.1,51.6,11.5,49,8.9z M48.6,39.9c0,3.1-1.1,5.6-2.9,7.3
		s-4.3,2.6-7.3,2.6H18c-3,0-5.5-0.9-7.3-2.6C8.9,45.4,8,42.9,8,39.8V19.3c0-3,0.9-5.5,2.7-7.3c1.7-1.7,4.3-2.6,7.3-2.6h20.6
		c3,0,5.5,0.9,7.3,2.7c1.7,1.8,2.7,4.3,2.7,7.2V39.9L48.6,39.9z"/>
</g>
</svg>

                            </a>
                        </div>

                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400">
                                <svg class="w-4 h-4" viewBox="0 0 512 512" width="100%" xml:space="preserve"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path
                                        fill="white"
                                        d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-106.468,0l0,-192.915l66.6,0l12.672,-82.621l-79.272,0l0,-53.617c0,-22.603 11.073,-44.636 46.58,-44.636l36.042,0l0,-70.34c0,0 -32.71,-5.582 -63.982,-5.582c-65.288,0 -107.96,39.569 -107.96,111.204l0,62.971l-72.573,0l0,82.621l72.573,0l0,192.915l-191.104,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Z"/></svg>
                            </a>
                        </div>

                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400">
                                <svg class="w-5 h-5" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="white"
                                          d="M288 0C146.6 0 32 114.6 32 256s114.6 256 256 256s256-114.6 256-256S429.4 0 288 0zM490.2 208h-26.7c-8.477 0-15.5 7-15.5 15.5v6.875c0 5.875-3.27 11.25-8.477 13.88L424 252c-4.965 2.5-10.9 2.125-15.5-1l-18.16-12.12c-3.996-2.625-8.961-3.375-13.56-1.75L374.1 238c-9.688 3.125-13.56 14.75-7.992 23.25l13.32 19.88C382.2 285.4 387.1 288 392.3 288h8.234c8.598 0 15.5 7 15.5 15.5v11.38c0 3.375-1.09 6.625-3.148 9.25l-18.65 25c-1.453 1.875-2.422 4.125-2.906 6.375l-4.238 22.88c-.6055 3.25-2.301 6.25-4.844 8.625c-9.445 8.625-17.8 18.38-24.95 29.12l-13.08 19.5c-1.535 2.336-3.902 3.758-6.012 5.488c-8.477 2.305-17.16 4.074-26.06 5.199c-6.711-2.328-12.45-7.047-15.76-13.69c-5.449-10.88-8.355-23-8.355-35.25V367.5C288 359 281.1 352 272.5 352H246.6c-14.41 0-28.34-5.75-38.63-16C197.8 325.8 192 311.9 192 297.4V283.3c0-17.12 8.113-33.38 21.92-43.63l27.49-20.75C250.9 211.9 262.4 208 274.2 208h.8477c8.477 0 16.95 2 24.46 5.75l14.77 7.375C317.9 223 322.2 223.3 326.1 222l47.35-15.75c6.297-2.125 10.66-8.125 10.66-14.75c0-8.625-7.023-15.5-15.5-15.5h-10.17c-4.117 0-7.992-1.625-10.9-4.5l-6.902-7C337.7 161.6 333.7 160 329.6 160H239.5c-8.477 0-15.5-7-15.5-15.5V140.1c0-7.125 4.844-13.38 11.75-15.12l14.53-3.5c3.754-1 7.023-3.25 9.082-6.5l8.113-12.12C270.3 98.63 275.2 96 280.3 96h24.22c8.598 0 15.5-7 15.5-15.5V50.72C403.6 63.73 470.8 126.6 490.2 208z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>

                <p class="mt-12">{{$game['summary']}}</p>

                @if($game['videos'])
                    <div class="mt-12">
                        <a href="https://youtube.com/watch/{{ $game['videos'][0]['video_id'] }}"
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

        @if($game['screenshots'])
            <div class="border-b border-gray-800 pb-12 mt-8">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                    @foreach($game['screenshots'] as $screenshot)
                        <a href="{{ Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']) }}">
                            <img src="{{ Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']) }}" alt=""
                                 class="bg-gray-700 hover:opacity-75 transition-colors ease-in-out duration-150">
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Games</h2>
            {{--        Grid--}}
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 text-sm">

                @foreach($game['similar_games'] as $game)
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

                            @if(isset($game['rating']))
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                                     style="right:-20px;bottom:-20px;">
                                    <div
                                        class="font-semibold text-xs flex justify-center items-center h-full">{{round($game['rating']).'%'}}</div>
                                </div>
                            @endif

                        </div>
                        <a href="#"
                           class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
                        @if(array_key_exists('platforms', $game))
                            @foreach($game['platforms'] as $platform)
                                @if(array_key_exists('abbreviation', $platform))
                                    {{$platform['abbreviation']}},
                                @endif
                            @endforeach
                        @endif
                    </div>

                @endforeach


            </div>
        </div>{{--    End Similar Games--}}

    </div>
@endsection
