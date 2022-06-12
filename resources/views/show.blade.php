@extends('layouts.app')
@section('content')

    <div class="flex border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
        <div class="flex-none">
            <img class="" src="{{ $game['cover-image-url'] }}"
                 alt="{{$game['name']}}">
        </div>

        <div class="lg:ml-12 lg:mr-64">
            <h2 class="font-semibold text-4xl mt-4 lg:mt-0">{{$game['name']}}</h2>
            <div class="text-gray-400 mt-2">

                @if($game['genres'])
                    <p>{{$game['genres']}}</p>
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
                        <div id="member-rating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                            @push('scripts')
                                @include('rating', [
                                            'slug' => 'member-rating',
                                            'rating' => $game['member-rating'],
                                            'event' => null,
                                        ])
                            @endpush
                        </div>
                        <div class="ml-4 text-xs">Member<br>Score</div>
                    </div>
                @endif

                {{--                    Critic Score--}}
                @if($game['critic-rating'])
                    <div class="flex items-center ml-12">
                        <div id="critic-rating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                            @push('scripts')
                                @include('rating', [
                                            'slug' => 'critic-rating',
                                            'rating' => $game['critic-rating'],
                                            'event' => null,
                                        ])
                            @endpush
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

            {{--                Summary--}}
            @if(array_key_exists('summary', $game))
                <p class="mt-12">{{$game['summary']}}</p>
            @endif

            {{--                Video--}}
            @if($game['video'])
                <div x-data="{ isTrailerModalVisible: false }" class="mt-12">
                    <button
                        @click="isTrailerModalVisible = true"
                        {{--                        href="{{$game['video']}}"--}}
                        class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-400 rounded transition ease-in-out duration-150">
                        <svg class="w-6 mt-px" fill="white" viewBox="0 0 24 24" width="24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                  d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23Z"
                                  fill="currentColor" fill-rule="evenodd"/>
                            <path d="M16 12L10 16.3301V7.66987L16 12Z" fill="currentColor"/>
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>

                    {{--                    Video modal--}}
                    <template x-if="isTrailerModalVisible">
                        <div x-cloak class="fixed z-50 inset-0 overflow-y-auto">
                            <div
                                class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-gray-800 rounded">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button @click="isTrailerModalVisible = false"
                                                    @keydown.escape.window="isTrailerModalVisible = false"
                                                    class="text-3xl leading-none hover:text-gray-300">&times;
                                            </button>
                                        </div>
                                        <div class="p-8">
                                            <div class="overflow-hidden relative" style="padding-top:56.25%;">
                                                <iframe width="560" height="315"
                                                        class="absolute top-0 left-0 w-full h-full"
                                                        src="https://www.youtube.com/embed/{{$game['video']}}"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            @endif

        </div>
    </div><!-- End game details -->

    {{--        Screenshots --}}
    @if(array_key_exists('screenshots', $game))

        @if($game['screenshots'])
            <div x-data="{ isImageModalVisible: false, image: ''}" class="border-b border-gray-800 pb-12 mt-8">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                    @foreach($game['screenshots'] as $screenshot)
                        <a @click.prevent="isImageModalVisible = true; image='{{$screenshot['huge']}}' " href="#">
                            <img src="{{ $screenshot['big']  }}" alt=""
                                 class="bg-gray-700 hover:opacity-75 transition-colors ease-in-out duration-150">
                        </a>
                    @endforeach
                </div>

                {{--                    Screenshots modal--}}
                <template x-if="isImageModalVisible">
                    <div x-cloak class="fixed z-50 inset-0 overflow-y-auto">
                        <div
                            class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-800 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button @click="isImageModalVisible = false"
                                                @keydown.escape.window="isImageModalVisible = false"
                                                class="text-3xl leading-none hover:text-gray-300">&times;
                                        </button>
                                    </div>
                                    <div class="p-8">
                                        <img :src="image" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

            </div>
        @endif
    @endif{{--        End Screenshots--}}


    {{--        Similar Games--}}
    <div class="pb-12 mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Games</h2>
        {{--        Grid--}}
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 text-sm">

            @if($game['similar-games'])

                @foreach($game['similar-games'] as $game)
                    <x-game-card :game="$game"/>
                @endforeach
            @endif


        </div>
    </div>{{--    End Similar Games--}}
@endsection
