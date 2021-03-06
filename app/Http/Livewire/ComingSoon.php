<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ComingSoon extends Component
{
    public $games = [];

    public function loadComingSoonGames()
    {
        $current = Carbon::today()->timestamp;
        $after = Carbon::today()->addMonths(6)->timestamp;

        $this->games = Cache::remember('coming-soon', 3600, function () use ($current, $after) {
            return Http::withHeaders(config('services.igdb'))
                ->withBody(
                    "
                fields name, first_release_date, platforms.abbreviation, cover.url, slug;
            where first_release_date != null
            & cover.url != null
            & (first_release_date >= {$current} & first_release_date <= {$after});
            sort first_release_date asc;
            limit 5;",
                    "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
