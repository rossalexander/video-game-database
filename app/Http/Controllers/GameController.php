<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
                fields name, cover.url, first_release_date, aggregated_rating, rating, rating_count, slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*,
                similar_games.cover.url, similar_games.name, similar_games.rating, similar_games.platforms.abbreviation, similar_games.slug;

            where slug=\"{$slug}\";
            ",
                "text/plain"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();
        abort_if(!$game, 404);

        return view('show', ['game' => $game[0]]);
    }
}
