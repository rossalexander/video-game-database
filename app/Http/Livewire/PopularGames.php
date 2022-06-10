<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $this->popularGames = Cache::remember('popular-games', 7, function () use ($before, $after) {
            sleep(3);
            return Http::withHeaders(config('services.igdb'))
                ->withBody(
                    "
                fields name, first_release_date, platforms.abbreviation, cover.url, rating;
            where first_release_date != null
            & cover.url != null
            & (first_release_date >= {$before} & first_release_date < {$after});
            sort first_release_date desc;
            limit 12;",
                    "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}