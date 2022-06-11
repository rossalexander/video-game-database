<div class="relative">
    <input wire:model.debounce.600ms="search" type="text"
           class="focus:shadow-outline bg-gray-800 text-sm rounded-full px-3 py-1 w-64"
           placeholder="Search...">

    <svg wire:loading class="absolute top-1 right-0 animate-spin -ml-1 mr-3 h-5 w-5 text-white"
         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>

    @if(strlen($search) >= 2)
        <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2">
            @if(count($searchResults) > 0)
                <ul>
                    @foreach($searchResults as $game)
                        <li class="border-b border-gray-700">
                            <a href="{{$game['slug']}}"
                               class="block hover:bg-gray-700 p-3 flex items-center transition ease-in-out duration-150 ">
                                @if(isset($game['cover']))
                                    <img class="w-10 mr-4"
                                         src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}"
                                         alt="cover">
                                @else
                                    <img src="https://via.placeholder.com/264x352" alt="Placeholder" class="w-10"/>
                                @endif
                                <span>{{$game['name']}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="p3">No results</div>
            @endif
        </div>
    @endif


</div>
