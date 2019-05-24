<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Composer;
use App\Models\Lyricist;
use App\Models\Song;
use Redirect;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::paginate(36);

        return view('layout.albums.index', compact('albums'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @param  String             $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album, String $slug=null)
    {
        if(!is_null($album->slug))
        {
            if(is_null($slug))
            {
                return Redirect::to(route('album.show', array($album, $album->slug)), 301);
            }
            else
            {
                if($slug !== $album->slug)
                {
                    return Redirect::to(route('album.show', array($album, $album->slug)), 301);
                }
            }
        }
        
        $songs = $album->songs()->paginate(36);
        
        $more_album = Album::where('id', '!=', $album->id)->get()->random(12);
        $more_artist = Artist::get()->random(12);
        $more_composer = Composer::get()->random(12);
        $more_lyricist = Lyricist::get()->random(12);
        $more_song = Song::get()->random(12);
        
        return view('layout.albums.show', compact('album', 'songs', 'more_album', 'more_artist', 'more_composer', 'more_lyricist', 'more_song'));
    }


}
