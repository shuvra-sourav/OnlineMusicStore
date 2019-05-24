<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Composer;
use App\Models\Lyricist;
use App\Models\Song;
use Redirect;
use Illuminate\Http\Request;

class LyricistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lyricists = Lyricist::paginate(36);

        return view('layout.lyricists.index', compact('lyricists'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lyricist  $lyricist
     * @param  String                $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Lyricist $lyricist, String $slug = null)
    {
        if(!is_null($lyricist->slug))
        {
            if(is_null($slug))
            {
                return Redirect::to(route('lyricist.show', array($lyricist, $lyricist->slug)), 301);
            }
            else
            {
                if($slug !== $lyricist->slug)
                {
                    return Redirect::to(route('lyricist.show', array($lyricist, $lyricist->slug)), 301);
                }
            }
        }
        
        $songs = $lyricist->songs()->paginate(36);

        $more_album = Album::get()->random(12);
        $more_artist = Artist::get()->random(12);
        $more_composer = Composer::get()->random(12);
        $more_lyricist = Lyricist::where('id', '!=', $lyricist->id)->get()->random(12);
        $more_song = Song::get()->random(12);
                
        return view('layout.lyricists.show', compact('lyricist', 'songs', 'more_album', 'more_artist', 'more_composer', 'more_lyricist', 'more_song'));
    }


}
