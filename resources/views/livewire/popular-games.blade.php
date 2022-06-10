<div>
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
    <div wire:init="loadPopularGames"
         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 text-sm pb-16">
        @forelse($games as $game)
            <x-game-card :game="$game"/>
        @empty
            @foreach(range(1,12) as $game)
                <x-game-card-skeleton/>
            @endforeach
        @endforelse
    </div>

</div>
