<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return View
     */
    public function show($slug)
    {
        $game = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                fields hypes, follows, name, cover.url, first_release_date, platforms.abbreviation, aggregated_rating, rating, rating_count, slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*,
                similar_games.cover.url, similar_games.name, similar_games.rating, similar_games.platforms.abbreviation, similar_games.slug;

            where slug=\"{$slug}\";
            ",
                "text/plain"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();
        abort_if(!$game, 404);
        return view('show', [
            'game' => $this->formatGameForView($game[0])
        ]);
    }

    public function formatGameForView($game)
    {
        // todo: refactor array_key_exists check to DRY collection
        $temp = collect($game)
            ->merge([
                'cover-image-url' => array_key_exists('genres', $game) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : null,
                'genres' => array_key_exists('genres', $game) ? collect($game['genres'])->pluck('name')->implode(', ') : null,
                'involved-companies' => array_key_exists('rating', $game) ? collect($game['involved_companies'])[0]['company']['name'] : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
                'member-rating' => array_key_exists('rating', $game) ? round($game['rating']) : null,
                'critic-rating' => array_key_exists('aggregated_rating', $game) ? round($game['aggregated_rating']) : null,
                'video' => array_key_exists('videos', $game) ? 'https://youtube.com/embed/' . $game['videos'][0]['video_id'] : null,
                'social' => [
                    'website' => array_key_exists('websites', $game) ? collect($game['websites'])->first() : null,
                    'facebook' => array_key_exists('websites', $game) ? collect($game['websites'])->filter(fn($website) => Str::contains($website['url'], 'facebook'))->first() : null,
                    'twitter' => array_key_exists('websites', $game) ? collect($game['websites'])->filter(fn($website) => Str::contains($website['url'], 'twitter'))->first() : null,
                    'instagram' => array_key_exists('websites', $game) ? collect($game['websites'])->filter(fn($website) => Str::contains($website['url'], 'instagram'))->first() : null,
                ],
                'screenshots' => array_key_exists('screenshots', $game) ? collect($game['screenshots'])->map(function ($screenshot) {
                    return [
                        'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                        'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                    ];
                })->take(9) : null,
                'similar-games' => array_key_exists('similar_games', $game) ?
                    collect($game['similar_games'])->map(function ($game) {
                        return collect($game)->merge([
                            'cover-image-url' => array_key_exists('cover', $game)
                                ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])
                                : 'https://via.placeholder.com/264x352',
                            'rating' => isset($game['rating'])
                                ? round($game['rating'])
                                : null,
                            'platforms' => array_key_exists('platforms', $game)
                                ? collect($game['platforms'])->pluck('abbreviation')->implode(', ')
                                : null,
                        ]);
                    })->take(6)
                    : null
            ])
            ->toArray();

        return $temp;
    }
}
