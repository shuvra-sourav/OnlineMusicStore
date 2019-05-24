<style type="text/css">
.slick-arrow {
    font-size: 0;
    position: absolute;
    color: var(--color2);
    border: none;
    border-radius: 4px 0 0 4px;
    background-color: #fff;
    z-index: 1;
    top: 28%;
    padding: 20px 12px;
}

.slick-prev {
    left: -30px;
    box-shadow: 2px 2px 12px -2px rgba(0,0,0,.3);
}

.slick-prev:after {
    font: bold 2rem/1.5 "Font Awesome 5 Free";
    content: "\f053";
}

.slick-next {
    right: -30px;
    text-align: right;
    box-shadow: -2px 2px 12px -2px rgba(0,0,0,.3);
}

.slick-next:after {
    font: bold 2rem/1.5 "Font Awesome 5 Free";
    content: "\f054";
}

</style>

<div class="no-gutter">
    
    <!-- Songs -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4" style="border-color: var(--color5, #ffffff)">
                <div class="card-header" style="background-color: var(--color5, #ffffff); color: var(--color2, #000000); border-bottom: 1px solid var(--color)">
                    <h3>আরো কিছু গান</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row slide-me">
                            @foreach($more_song as $song)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card mb-4">
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
                <div class="card-footer text-right" style="background-color: var(--color5, #ffffff); color: var(--color4, #000000)">
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
                    <h3>কিছু শিল্পী</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row slide-me">
                            @foreach($more_artist as $artist)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card mb-4">
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
                <div class="card-footer text-right" style="background-color: var(--color5, #ffffff); color: var(--color4, #000000)">
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
                    <h3>আরো কিছু অ্যালবাম</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row slide-me">
                            @foreach($more_album as $album)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card mb-4">
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
                <div class="card-footer text-right" style="background-color: var(--color5, #ffffff); color: var(--color4, #000000)">
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
                    <h3>কিছু গীতিকার</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row slide-me">
                            @foreach($more_lyricist as $lyricist)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card mb-4">
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
                <div class="card-footer text-right" style="background-color: var(--color5, #ffffff); color: var(--color4, #000000)">
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
                    <h3>কিছু সুরকার</h3>
                </div>
                <div class="card-body" style="background-color: var(--color4, #ffffff)">
                    <div class="container">
                        <div class="row slide-me">
                            @foreach($more_composer as $composer)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card mb-4">
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
                <div class="card-footer text-right" style="background-color: var(--color5, #ffffff); color: var(--color4, #000000)">
                    <a href="{{ route('composer.index') }}">সব সুরকারের তালিকা</a>
                </div>
            </div>
        </div>
    </div>

</div>



<br/>
<div class="clearfix">...</div>

