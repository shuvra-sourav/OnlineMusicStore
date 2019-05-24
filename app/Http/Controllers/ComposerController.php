<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Composer;
use App\Models\Lyricist;
use App\Models\Song;
use Redirect;
use Illuminate\Http\Request;

class ComposerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $composers = Composer::paginate(36);

        return view('layout.composers.index', compact('composers'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Composer  $composer
     * @param  String                $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Composer $composer, String $slug = null)
    {
        if(!is_null($composer->slug))
        {
            if(is_null($slug))
            {
                return Redirect::to(route('composer.show', array($composer, $composer->slug)), 301);
            }
            else
            {
                if($slug !== $composer->slug)
                {
                    return Redirect::to(route('composer.show', array($composer, $composer->slug)), 301);
                }
            }
        }

        $songs = $composer->songs()->paginate(36);
        
        $more_album = Album::get()->random(12);
        $more_artist = Artist::get()->random(12);
        $more_composer = Composer::where('id', '!=', $composer->id)->get()->random(12);
        $more_lyricist = Lyricist::get()->random(12);
        $more_song = Song::get()->random(12);
                
        return view('layout.composers.show', compact('composer', 'songs', 'more_album', 'more_artist', 'more_composer', 'more_lyricist', 'more_song'));
    }


}
