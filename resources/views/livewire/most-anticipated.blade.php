<div>
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>
    <div wire:init="loadMostAnticipated" class="space-y-10 mt-8">
        @forelse($games as $game)
            <x-game-card-small :game="$game"/>
        @empty
            @foreach(range(1,5) as $game)
                <x-game-card-small-skeleton/>
            @endforeach
        @endforelse

    </div>
</div>

