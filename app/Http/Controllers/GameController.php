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
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $current = Carbon::today()->timestamp;

        $popularGames = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                fields name, first_release_date, platforms.abbreviation, cover.url, rating;
            where first_release_date != null
            & rating != null
            & cover.url != null
            & (first_release_date >= {$before} & first_release_date < {$after});
            sort first_release_date desc;
            limit 12;",
                "text/plain"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();

        $recentlyReviewed = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                fields name, summary, first_release_date, platforms.abbreviation, cover.url, rating, rating_count;
            where first_release_date != null
            & rating != null
            & cover.url != null
            & (first_release_date >= {$before} & first_release_date < {$current});
            sort first_release_date desc;
            limit 3;",
                "text/plain"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();

//        dd($recentlyReviewed);
        return view('welcome', [
            'popularGames' => $popularGames,
            'recentlyReviewed' => $recentlyReviewed,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
