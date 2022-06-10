@props(['game'])
<div class="mt-8">
    <div class="relative inline-block">
        <a href="{{route('game.show', $game['slug'])}}">
            <img src="{{ $game['cover-image-url'] }}"
                 alt="{{$game['name']}}"
                 class="hover:opacity-75 transition-colors ease-in-out duration-150">
        </a>
        @if($game['rating'])
            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                 style="right:-20px;bottom:-20px;">
                <div
                    class="font-semibold text-xs flex justify-center items-center h-full">{{$game['rating']}}
                </div>
            </div>
        @endif

    </div>
    <a href="{{route('game.show', $game['slug'])}}"
       class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
    <div class="text-gray-400">
        {{$game['platforms']}}
    </div>
</div>
