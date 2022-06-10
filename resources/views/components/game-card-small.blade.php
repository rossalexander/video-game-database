@props(['game'])
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
