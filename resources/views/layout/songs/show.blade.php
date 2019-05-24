@extends('layout.songs.base')

@section('title', $song->title . ' - বাংলা গানের লিরিক্স | সুরেলা.কম | Shoorela.com')
@section('keywords'){{ $song->title }}, @foreach($song->keywords() as $kw){{ $kw }}, @endforeach @foreach($categories as $category){{ $category->name }}, @endforeach
@endsection
@section('description')এই পৃষ্ঠায় রয়েছে {{ $song->title }}-গানের লিরিক্স, কথা, শিল্পীর নাম, সুরকারের নাম, গীতিকারের নাম, অ্যালবামের নাম, প্রকাশ কাল। @if($song->category()->exists()) এটি একটি {{ $song->category->name }} গান। @endif @if($song->artists()->exists()) গানটি গেয়েছেন {{ $song->artists[0]->name }}। @endif @if($song->lyricist()->exists()) গানটি লিখেছেন {{ $song->lyricist->name }}। @endif @if($song->composer()->exists()) গানটি সুর করেছেন {{ $song->composer->name }}। @endif @if($song->album()->exists()) গানটি {{ $song->album->name }} অ্যালবাম থেকে নেওয়া। @endif @if($song->release_year) গানটি প্রথম প্রকাশিত হয় {{ $song->release_year }} সালে। @endif @endsection

@section('og_url', route('song.show', array($song->id, $song->slug)))
@section('og_type', 'music.song')
@section('og_title', $song->title . ' - বাংলা গানের লিরিক্স | সুরেলা.কম | Shoorela.com')
@section('og_description')এই পৃষ্ঠায় রয়েছে {{ $song->title }}-গানের লিরিক্স, কথা, শিল্পীর নাম, সুরকারের নাম, গীতিকারের নাম, অ্যালবামের নাম, প্রকাশ কাল। @if($song->category()->exists()) এটি একটি {{ $song->category->name }} গান। @endif @if($song->artists()->exists()) গানটি গেয়েছেন {{ $song->artists[0]->name }}। @endif @if($song->lyricist()->exists()) গানটি লিখেছেন {{ $song->lyricist->name }}। @endif @if($song->composer()->exists()) গানটি সুর করেছেন {{ $song->composer->name }}। @endif @if($song->album()->exists()) গানটি {{ $song->album->name }} অ্যালবাম থেকে নেওয়া। @endif @if($song->release_year) গানটি প্রথম প্রকাশিত হয় {{ $song->release_year }} সালে। @endif @endsection
@section('og_image')@if($song->cover_image !== null){{ url('storage/images/'.$song->cover_image) }}@else{{ url('storage/images/song-placeholder.png') }}@endif @endsection
@section('more_meta')
@if($song->album()->exists())<meta property="music:album"      content="{{ $song->album->name}}" />
@endif
@if($song->artists()->exists())<meta property="music:musician"   content="{{ $song->artists[0]->name}}" />
@endif
@if(!is_null($song->release_year))<meta property="music:release_date" content="{{ $song->release_year }}" />
@endif
@endsection


@section('song-content')
<style>
.lyrics
{
    text-align: center;
    height: 30rem;
    overflow: auto;
    padding-top: 2rem;
}
</style>
<div class="container" style="background-color: var(--color4, #ffffff); color: var(--color2, #000000)">
    <div class="row">
        <div class="col-10">
            <div class="media py-4 px-3">
                @if($song->cover_image !== null)
                    <img class="card-img-top img-fluid mr-3" style="max-width: 180px" src="{{ url('storage/images/'.$song->cover_image) }}">
                @else
                    <img class="card-img-top img-fluid mr-3" style="max-width: 180px" src="{{ url('storage/images/song-placeholder.png') }}">
                @endif
                <div class="media-body">
                    <h2 class="mt-0">গান : {{ $song->title }}</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item">শিল্পী :
                                        @if($song->artists()->exists())
                                            <a href="{{ route('artist.show', array($song->artists[0]->id, $song->artists[0]->slug)) }}">{{ $song->artists[0]->name }}</a>
                                        @else <span>পাওয়া যায়নি</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">গীতিকার :
                                        @if($song->lyricist()->exists())
                                            <a href="{{ route('lyricist.show', array($song->lyricist->id, $song->lyricist->slug)) }}">{{ $song->lyricist->name }}</a>
                                        @else <span>পাওয়া যায়নি</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">ধরণ : 
                                        @if($song->category()->exists())
                                            <a href="{{ route('category.show', array($song->category->id, $song->category->slug)) }}">{{ $song->category->name }}</a>
                                        @else <span>পাওয়া যায়নি</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item">অ্যালবাম :
                                        @if($song->album()->exists())
                                            <a href="{{ route('album.show', array($song->album->id, $song->album->slug)) }}">{{ $song->album->name }}</a>
                                        @else <span>পাওয়া যায়নি</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">সুরকার :
                                        @if($song->composer()->exists())
                                            <a href="{{ route('composer.show', array($song->composer->id, $song->composer->slug)) }}">{{ $song->composer->name }}</a>
                                        @else <span>পাওয়া যায়নি</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">প্রথম প্রকাশ : {{ $song->release_year ?? "পাওয়া যায়নি" }}</li>
                                </ul>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="pt-5 mt-4">
                <div class="fb-like" data-href="{{ route('song.show', array($song->id, $song->slug)) }}" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-6">
            <div class="py-4">
                <div class="lyrics" style="background-color: var(--color6, #ffffff); color: var(--color3, #000000)">
                    @foreach($song->paragraphs as $paragraph)
                        <p>
                            @foreach($paragraph->lines as $line)
                                {{ $line->data }}<br/>
                            @endforeach
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-6">
            @if( $song->youtube_id !== null)
                <div class="py-4 ">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $song->youtube_id }}?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
            @else
                
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12 pb-3 m-1">
            <div class="fb-like" data-href="{{ route('song.show', array($song->id, $song->slug)) }}" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="fb-comments" data-href="{{ route('song.show', array($song->id, $song->slug)) }}"></div>
        </div>
    </div>
</div>
@endsection


@section('sidebar')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            @include('layout.partials.categories')
        </div>
    </div>
</div>
@endsection


@section('more-content')
    @include('layout.partials.more-links')
@endsection