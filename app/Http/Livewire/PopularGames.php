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
    public $games = [];

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(6)->timestamp;
        $now = Carbon::now()->timestamp;

        $gamesRaw = Cache::remember('popular-games', 60, function () use ($before, $now) {
            return Http::withHeaders(config('services.igdb'))
                ->withBody(
                    "
                fields name, cover.url, first_release_date, platforms.abbreviation, rating, slug, follows;
            where (first_release_date >= {$before} & first_release_date <= {$now})
            & follows != null;
            sort follows desc;
            limit 12;",
                    "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        $this->games = $this->formatGames($gamesRaw);

        collect($this->games)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('gameWithRatingAdded', [
                'slug' => $game['slug'],
                'rating' => $game['rating'] / 100
            ]);
        });
//        $this->emit('postAdded', 2);
    }

    public function render()
    {
        return view('livewire.popular-games');
    }

    /**
     * @param $games
     * @return Collection
     */
    private function formatGames($games): Collection
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'cover-image-url' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            ])->toArray();
        });
    }
}
