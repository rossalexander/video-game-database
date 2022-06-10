<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class HighestRated extends Component
{
    public $games = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(12)->timestamp;
        $current = Carbon::today()->timestamp;

        $this->games = Cache::remember('highest-rated', 60, function () use ($before, $current) {
            return Http::withHeaders(config('services.igdb'))
                ->withBody(
                    "
                fields name, summary, first_release_date, platforms.abbreviation, cover.url, rating, total_rating_count, slug;
            where first_release_date != null
            & cover.url != null
            & rating != null
            & (first_release_date >= {$before} & first_release_date < {$current});
            sort rating desc;
            limit 5;",
                    "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });
    }

    public
    function render()
    {
        return view('livewire.highest-rated');
    }
}
