@extends('layout.base')

@section('content')
<style>
.lyrics
{
    text-align: center;
    height: 30rem;
    overflow: auto;
    padding-top: 2rem;
}
</style>
<div class="container">
    <div class="row">
        <!-- Ad -->
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-9">
            <div class="card my-3" style="border-color: var(--color5, #ffffff)">
                <div class="card-header" style="background-color: var(--color5, #ffffff); color: var(--color2, #000000)">
                    <h3>আজকের গান</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="mt-0">{{ $random_song->title }}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-lg-5">
                                <ul class="list-group">
                                    <li class="list-group-item">শিল্পী :
                                        @if($random_song->artists()->exists())
                                            <a href="{{ route('artist.show', array($random_song->artists[0]->id, $random_song->artists[0]->slug)) }}">{{ $random_song->artists[0]->name }}</a>
                                        @else <span>পাওয়া যায়নি</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">গীতিকার :
                                        @if($random_song->lyricist()->exists())
                                            <a href="{{ route('lyricist.show', array($random_song->lyricist->id, $random_song->lyricist->slug)) }}">{{ $random_song->lyricist->name }}</a>
                                        @else <span>পাওয়া যায়নি</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">ধরণ : 
                                        @if($random_song->category()->exists())
                                            <a href="{{ route('category.show', array($random_song->category->id, $random_song->category->slug)) }}">{{ $random_song->category->name }}</a>
                                        @else <span>পাওয়া যায়নি</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">অ্যালবাম :
                                        @if($random_song->album()->exists())
                                            <a href="{{ route('album.show', array($random_song->album->id, $random_song->album->slug)) }}">{{ $random_song->album->name }}</a>
                                        @else <span>পাওয়া যায়নি</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">সুরকার :
                                        @if($random_song->composer()->exists())
                                            <a href="{{ route('composer.show', array($random_song->composer->id, $random_song->composer->slug)) }}">{{ $random_song->composer->name }}</a>
                                        @else <span>পাওয়া যায়নি</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">প্রথম প্রকাশ : {{ $random_song->release_year ?? "পাওয়া যায়নি" }}</li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-10 offset-md-1 col-lg-7 offset-lg-0">
                                @if( $random_song->youtube_id !== null)
                                    <div class="py-4 ">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $random_song->youtube_id }}?rel=0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                @else
                                    
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="py-4">
                                    <div class="lyrics" style="background-color: var(--color6, #ffffff); color: var(--color3, #000000)">
                                        @foreach($random_song->paragraphs as $paragraph)
                                            <p>
                                                @foreach($paragraph->lines as $line)
                                                    {{ $line->data }}<br/>
                                                @endforeach
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="no-gutters mt-3">
                <div class="row">
                    <div class="col-12">
                        @include('layout.partials.facebook-page')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @include('layout.partials.categories')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <hr>
    
    <div class="row">
        <!-- Ad -->
    </div>
    
    <!-- Song -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4" style="border-color: var(--color5, #ffffff)">
                <div class="card-header" style="background-color: var(--color5, #ffffff); color: var(--color2, #000000)">
                    <h3>গান</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row">
                            @foreach($more_song as $song)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card bg-light mb-4">
                                        @if($song->cover_image !== null)
                                            <img class="card-img-top img-fluid" src="{{ url('storage/images/'.$song->cover_image) }}">
                                        @else
                                            <img class="card-img-top img-fluid" src="{{ url('storage/images/song-placeholder.png') }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{ route('song.show', array($song->id, $song->slug)) }}">{{ $song->title }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted text-right">
                    <a href="{{ route('song.index') }}">সব গানের তালিকা</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Artist -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4" style="border-color: var(--color5, #ffffff)">
                <div class="card-header" style="background-color: var(--color5, #ffffff); color: var(--color2, #000000)">
                    <h3>শিল্পী</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row">
                            @foreach($more_artist as $artist)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card bg-light mb-4">
                                        @if($artist->photo !== null)
                                            <img class="card-img-top img-fluid" src="{{ url('storage/images/'.$artist->photo) }}">
                                        @else
                                            <img class="card-img-top img-fluid" src="{{ url('storage/images/artist-placeholder.png') }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{ route('artist.show', array($artist->id, $artist->slug)) }}">{{ $artist->name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted text-right">
                    <a href="{{ route('artist.index') }}">সব শিল্পীর তালিকা</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Album -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4" style="border-color: var(--color5, #ffffff)">
                <div class="card-header" style="background-color: var(--color5, #ffffff); color: var(--color2, #000000)">
                    <h3>অ্যালবাম</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row">
                            @foreach($more_album as $album)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card bg-light mb-4">
                                        @if($album->cover !== null)
                                            <img class="card-img-top img-fluid" src="{{ url('storage/images/'.$album->cover) }}">
                                        @else
                                            <img class="card-img-top img-fluid" src="{{ url('storage/images/album-placeholder.png') }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{ route('album.show', array($album->id, $album->slug)) }}">{{ $album->name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted text-right">
                    <a href="{{ route('album.index') }}">সব অ্যালবামের তালিকা</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Lyricist -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4" style="border-color: var(--color5, #ffffff)">
                <div class="card-header" style="background-color: var(--color5, #ffffff); color: var(--color2, #000000)">
                    <h3>গীতিকার</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row">
                            @foreach($more_lyricist as $lyricist)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card bg-light mb-4">
                                        @if($lyricist->photo !== null)
                                            <img class="card-img-top img-fluid" src="{{ url('storage/images/'.$lyricist->photo) }}">
                                        @else
                                            <img class="card-img-top img-fluid" src="{{ url('storage/images/lyricist-placeholder.png') }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{ route('lyricist.show', array($lyricist->id, $lyricist->slug)) }}">{{ $lyricist->name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted text-right">
                    <a href="{{ route('lyricist.index') }}">সব গীতিকারের তালিকা</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Composer -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4" style="border-color: var(--color5, #ffffff)">
                <div class="card-header" style="background-color: var(--color5, #ffffff); color: var(--color2, #000000)">
                    <h3>সুরকার</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row">
                            @foreach($more_composer as $composer)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card bg-light mb-4">
                                        @if($composer->photo !== null)
                                            <img class="card-img-top img-fluid" src="{{ url('storage/images/'.$composer->photo) }}">
                                        @else
                                            <img class="card-img-top img-fluid" src="{{ url('storage/images/composer-placeholder.png') }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{ route('composer.show', array($composer->id, $composer->slug)) }}">{{ $composer->name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted text-right">
                    <a href="{{ route('composer.index') }}">সব সুরকারের তালিকা</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection