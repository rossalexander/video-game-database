<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::today()->timestamp;

        $this->recentlyReviewed = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                fields name, summary, first_release_date, platforms.abbreviation, cover.url, rating, rating_count;
            where first_release_date != null
            & cover.url != null
            & (first_release_date >= {$before} & first_release_date < {$current});
            sort first_release_date desc;
            limit 5;",
                "text/plain"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
