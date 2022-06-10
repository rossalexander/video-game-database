<div wire:init="loadPopularGames"
     class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 text-sm pb-16">
    @forelse($popularGames as $game)
        <div class="mt-8">
            <div class="relative inline-block">
                <a href="{{route('game.show', $game['slug'])}}">
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
            <a href="{{route('game.show', $game['slug'])}}"
               class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
            <div class="text-gray-400">
                @foreach($game['platforms'] as $platform)
                    @if(array_key_exists('abbreviation', $platform))
                        {{$platform['abbreviation']}},
                    @endif
                @endforeach
            </div>
        </div>
    @empty
        @foreach(range(1,12) as $game)
            <div class="mt-8 animate-pulse">
                <div class="relative inline-block">
                    <div class="bg-gray-800 w-52 h-72"></div>
                </div>
                <div class="block text-transparent text-lg bg-gray-700 rounded leading-tight mt-4">Title goes here</div>
                <div class="text-transparent bg-gray-700 rounded inline-block mt-3">Xbox One, Playstation 4</div>
            </div>
        @endforeach
    @endforelse
</div>
