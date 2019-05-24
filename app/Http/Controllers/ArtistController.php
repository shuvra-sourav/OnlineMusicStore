<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Composer;
use App\Models\Lyricist;
use App\Models\Song;
use Redirect;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::paginate(36);

        return view('layout.artists.index', compact('artists'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @param  String              $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist, String $slug = null)
    {
        if(!is_null($artist->slug))
        {
            if(is_null($slug))
            {
                return Redirect::to(route('artist.show', array($artist, $artist->slug)), 301);
            }
            else
            {
                if($slug !== $artist->slug)
                {
                    return Redirect::to(route('artist.show', array($artist, $artist->slug)), 301);
                }
            }
        }
        
        $songs = $artist->songs()->paginate(36);
        
        $more_album = Album::get()->random(12);
        $more_artist = Artist::where('id', '!=', $artist->id)->get()->random(12);
        $more_composer = Composer::get()->random(12);
        $more_lyricist = Lyricist::get()->random(12);
        $more_song = Song::get()->random(12);

        return view('layout.artists.show', compact('artist', 'songs', 'more_album', 'more_artist', 'more_composer', 'more_lyricist', 'more_song'));
    }


}
