<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Composer;
use App\Models\Lyricist;
use App\Models\Song;
use Redirect;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::paginate(36);

        return view('layout.songs.index', compact('songs'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @param  String            $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song, String $slug = null)
    {
        if(!is_null($song->slug))
        {
            if(is_null($slug))
            {
                return Redirect::to(route('song.show', array($song, $song->slug)), 301);
            }
            else
            {
                if($slug !== $song->slug)
                {
                    return Redirect::to(route('song.show', array($song, $song->slug)), 301);
                }
            }
        }
        
        $more_album = Album::get()->random(12);
        $more_artist = Artist::get()->random(12);
        $more_composer = Composer::get()->random(12);
        $more_lyricist = Lyricist::get()->random(12);
        $more_song = Song::where('id', '!=', $song->id)->get()->random(12);
        
        return view('layout.songs.show', compact('song', 'more_album', 'more_artist', 'more_composer', 'more_lyricist', 'more_song'));
    }
}
