<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Composer;
use App\Models\Lyricist;
use App\Models\Song;
use Carbon\Carbon;
use Redirect;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start_date = new Carbon('2019-01-01 00:00:00');
        $day_count = $start_date->diffInDays(Carbon::now());
        $index = (7561 * $day_count) % Song::count();
        $random_song = Song::all()[$index];
        
        $more_album = Album::get()->random(12);
        $more_artist = Artist::get()->random(12);
        $more_composer = Composer::get()->random(12);
        $more_lyricist = Lyricist::get()->random(12);
        $more_song = Song::get()->random(12);

        return view('home', compact('random_song', 'more_album', 'more_artist', 'more_composer', 'more_lyricist', 'more_song'));
    }
}
