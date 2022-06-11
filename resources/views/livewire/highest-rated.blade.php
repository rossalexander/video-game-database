<div wire:init="loadRecentlyReviewed" class="w-full lg:w-3/4 mr-0 lg:mr-32">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Highest Rated</h2>
    <div class="space-y-12 mt-8">
        @forelse($games as $game)
            <div class="bg-gray-800 rounded-lg shadow-md flex p-6">
                <div class="relative flex-none">
                    <a href="{{ $game['slug'] }}">
                        <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}"
                             alt="{{$game['name']}}"
                             class="w-48 hover:opacity-75 transition-colors ease-in-out duration-150">
                    </a>
                    @if(array_key_exists('rating', $game))
                        <div id="review-{{$game['slug']}}"
                             class="absolute text-sm bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                             style="right: -20px; bottom: -20px;">
                        </div>
                    @endif
                </div>
                <div class="ml-12">
                    <a href="{{ $game['slug'] }}"
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
        @empty
            @foreach(range(1,5) as $game)
                <div class="animate-pulse bg-gray-800 rounded-lg shadow-md flex p-6">

                    <div class="relative flex-none">
                        <div class="w-48 h-64 bg-gray-800"></div>
                    </div>

                    <div class="ml-12">
                        <a href=""
                           class="text-transparent block text-lg font-semibold leading-tight mt-4">Game name here</a>
                        <div class="text-transparent mt-1">Xbox One, Playstation 4</div>
                        <p class="h-24 mt-6 text-gray-400 hidden lg:block"></p>
                    </div>
                </div>
            @endforeach
        @endforelse
    </div>
</div>

@push('scripts')
    @include('rating', [
    'event' => 'highestRatedGameWithRatingAdded'
])
@endpush
