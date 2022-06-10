<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(6)->timestamp;
        $after = Carbon::now()->addMonths(6)->timestamp;

        $popularGamesUnformatted = Cache::remember('popular-games', 7, function () use ($before, $after) {
            return Http::withHeaders(config('services.igdb'))
                ->withBody(
                    "
                fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;
            where (first_release_date >= {$before} & first_release_date < {$after})
            & total_rating_count > 5;
            sort total_rating_count desc;
            limit 12;",
                    "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        $this->popularGames = $this->formatForView($popularGamesUnformatted);
    }

    public function render()
    {
        return view('livewire.popular-games');
    }

    /**
     * @param $games
     * @return Collection
     */
    private function formatForView($games): Collection
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'cover-image-url' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'rating' => isset($game['rating']) ? round($game['rating']) . '%' : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            ])->toArray();
        });
    }
}
