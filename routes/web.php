<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('albums/', 'AlbumController@index')->name('album.index');
Route::get('albums/{album}/{slug?}', 'AlbumController@show')->name('album.show');

Route::get('artists/', 'ArtistController@index')->name('artist.index');
Route::get('artists/{artist}/{slug?}', 'ArtistController@show')->name('artist.show');

Route::get('categories/', function () {
    \Redirect::to(route('home'), 301);
});
Route::get('categories/{category}/{slug?}', 'CategoryController@show')->name('category.show');

Route::get('composers/', 'ComposerController@index')->name('composer.index');
Route::get('composers/{composer}/{slug?}', 'ComposerController@show')->name('composer.show');

Route::get('lyricists/', 'LyricistController@index')->name('lyricist.index');
Route::get('lyricists/{lyricist}/{slug?}', 'LyricistController@show')->name('lyricist.show');

Route::get('songs/', 'SongController@index')->name('song.index');
Route::get('songs/{song}/{slug?}', 'SongController@show')->name('song.show');

Route::get('/sitemap',     'SitemapController@index');
Route::get('/sitemap.xml', 'SitemapController@index');

Route::get('/sitemap/albums',     'SitemapController@albums')    ->name('sitemap.albums');
Route::get('/sitemap/artists',    'SitemapController@artists')   ->name('sitemap.artists');
Route::get('/sitemap/categories', 'SitemapController@categories')->name('sitemap.categories');
Route::get('/sitemap/composers',  'SitemapController@composers') ->name('sitemap.composers');
Route::get('/sitemap/lyricists',  'SitemapController@lyricists') ->name('sitemap.lyricists');
Route::get('/sitemap/songs',      'SitemapController@songs')     ->name('sitemap.songs');



Route::get('/privacy-policy', function () {
    return view('layout.privacy-policy');
});
Route::get('/terms-and-conditions', function () {
    return view('layout.terms-and-conditions');
});
