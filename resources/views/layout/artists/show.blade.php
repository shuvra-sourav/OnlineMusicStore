@extends('layout.artists.base')

@section('title', 'শিল্পী ' . $artist->name . ' | সুরেলা.কম | Shoorela.com')
@section('keywords'){{ $artist->name }}, @foreach($songs as $song){{ $song->title }}, @endforeach @foreach($categories as $category){{ $category->name }}, @endforeach
@endsection
@section('description')এই পৃষ্ঠায় রয়েছে শিল্পী {{ $artist->name }}-এর সবগুলো গানের তালিকা। গানগুলোর মধ্যে রয়েছে, @foreach($songs as $song){{ $song->title }}, @endforeach ইত্যাদি গানের লিরিক্স, ইউটিউব ভিডিও, শিল্পীর জন্মতারিখ, মৃত্যুতারিখ, প্রকাশ কাল ও অন্যান্য তথ্য। @endsection

@section('og_url', route('artist.show', array($artist->id, $artist->slug)))
@section('og_type', 'music.musician')
@section('og_title', 'শিল্পী ' . $artist->name . ' | সুরেলা.কম | Shoorela.com')
@section('og_description')এই পৃষ্ঠায় রয়েছে শিল্পী {{ $artist->name }}-এর সবগুলো গানের তালিকা। গানগুলোর মধ্যে রয়েছে, @foreach($songs as $song){{ $song->title }}, @endforeach ইত্যাদি গানের লিরিক্স, ইউটিউব ভিডিও, শিল্পীর জন্মতারিখ, মৃত্যুতারিখ, প্রকাশ কাল ও অন্যান্য তথ্য। @endsection
@section('og_image')@if($artist->photo !== null){{ url('storage/images/'.$artist->photo) }}@else{{ url('storage/images/artist-placeholder.png') }}@endif @endsection
@section('more_meta')
@foreach($songs as $song)
<meta property="music:song"       content="{{ $song->title }}" />
@if($song->album()->exists())<meta property="music:album"      content="{{ $song->album->name}}" />
@endif
@if(!is_null($song->release_year))<meta property="music:release_date" content="{{ $song->release_year }}" />
@endif
@endforeach
@endsection

@section('artist-content')
<div class="container" style="background-color: var(--color4, #ffffff); color: var(--color2, #000000)">
    <div class="row">
        <div class="col-10">
            <div class="media py-4">
                @if($artist->photo !== null)
                    <img class="card-img-top img-fluid mr-3" style="max-width: 180px" src="{{ url('storage/images/'.$artist->photo) }}">
                @else
                    <img class="card-img-top img-fluid mr-3" style="max-width: 180px" src="{{ url('storage/images/artist-placeholder.png') }}">
                @endif
                <div class="media-body">
                    <h2 class="mt-0">শিল্পী : {{ $artist->name }}</h2>
                    <ul class="list-group">
                        <li class="list-group-item">জন্ম : {{ $artist->dob ?? "পাওয়া যায়নি" }}</li>
                        <li class="list-group-item">মৃত্যু : {{ $artist->dod ?? "পাওয়া যায়নি" }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="mt-4">
                <div class="fb-like" data-href="{{ route('artist.show', array($artist->id, $artist->slug)) }}" data-layout="box_count" data-action="like" data-colorscheme="light" data-size="large" data-show-faces="true" data-share="true"></div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($songs as $song)
            <div class="col-6 col-sm-4 col-lg-3" style="display: flex; flex:1 0 auto;">
                <div class="card mb-4" style="border-color: var(--color4, #ffffff)">
                    @if($song->cover_image !== null)
                        <img class="card-img-top img-fluid" src="{{ url('storage/images/'.$song->cover_image) }}">
                    @else
                        <img class="card-img-top img-fluid" src="{{ url('storage/images/song-placeholder.png') }}">
                    @endif
                    <div class="card-body" style="background-color: var(--color6)">
                        <h5 class="card-title"><a href="{{ route('song.show', array($song->id, $song->slug)) }}">{{ $song->title }}</a></h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12 pb-3 m-1">
            <div class="fb-like" data-href="{{ route('artist.show', array($artist->id, $artist->slug)) }}" data-layout="standard" data-action="like" data-size="large" data-colorscheme="light" data-show-faces="true" data-share="true"></div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $songs->links() }}
    </div>
    <div class="row">
        <div class="col-12">
            <div class="fb-comments" data-href="{{ route('artist.show', array($artist->id, $artist->slug)) }}"></div>
        </div>
    </div>
</div>

@endsection


@section('sidebar')
<div class="no-gutters">
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
@endsection


@section('more-content')
    @include('layout.partials.more-links')
@endsection