<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Composer;
use App\Models\Lyricist;
use App\Models\Song;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $albums    = Album::   orderBy('created_at', 'desc')->get();
        $artists   = Artist::  orderBy('created_at', 'desc')->get();
        $composers = Composer::orderBy('created_at', 'desc')->get();
        $lyricists = Lyricist::orderBy('created_at', 'desc')->get();
        $songs     = Song::    orderBy('created_at', 'desc')->get();
        
        $album    = Album::   orderBy('created_at', 'desc')->first();
        $artist   = Artist::  orderBy('created_at', 'desc')->first();
        $category = Category::orderBy('created_at', 'desc')->first();
        $composer = Composer::orderBy('created_at', 'desc')->first();
        $lyricist = Lyricist::orderBy('created_at', 'desc')->first();
        $song     = Song::    orderBy('created_at', 'desc')->first();

        return response()->view('sitemap.index',
                                compact('album', 'artist', 'category', 'composer', 'lyricist', 'song')
                        )->header('Content-Type', 'text/xml');
    }
    
    public function albums()
    {
        $albums = Album::all();
        
        return response()->view('sitemap.albums', compact('albums'))->header('Content-Type', 'text/xml');
    }

    public function artists()
    {
        $artists = Artist::all();
        
        return response()->view('sitemap.artists', compact('artists'))->header('Content-Type', 'text/xml');
    }

    public function categories()
    {
        $categories = Category::all();
        
        return response()->view('sitemap.categories', compact('categories'))->header('Content-Type', 'text/xml');
    }

    public function composers()
    {
        $composers = Composer::all();
        
        return response()->view('sitemap.composers', compact('composers'))->header('Content-Type', 'text/xml');
    }

    public function lyricists()
    {
        $lyricists = Lyricist::all();
        
        return response()->view('sitemap.lyricists', compact('lyricists'))->header('Content-Type', 'text/xml');
    }

    public function songs()
    {
        $songs = Song::all();
        
        return response()->view('sitemap.songs', compact('songs'))->header('Content-Type', 'text/xml');
    }
}
