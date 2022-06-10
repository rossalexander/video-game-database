<div wire:init="loadComingSoonGames" class="space-y-10 mt-8">
    @forelse($comingSoonGames as $game)
        <div class="flex">
            <a href="#">
                <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}"
                     alt="{{$game['name']}}"
                     class="w-16 hover:opacity-75 transition-colors ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a href="" class="hover:text-gray-300">{{$game['name']}}</a>
                <div
                    class="text-gray-400 text-sm mt-1">{{ Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y')}}</div>
            </div>
        </div>
    @empty
        @foreach(range(1,5) as $game)
            <div class="flex animate-pulse">
                <div class="w-16 h24 bg-gray-800"></div>
                <div class="ml-4">
                    <div  class="text-transparent bg-gray-700">Game name here</div>
                    <div
                        class="text-transparent bg-gray-700 text-sm mt-1">January 1, 2022</div>
                </div>
            </div>
        @endforeach
    @endforelse

</div>
