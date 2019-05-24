@extends('layout.albums.base')

@section('title', 'গানের তালিকা | সুরেলা.কম | Shoorela.com')
@section('keywords')@foreach($songs as $song){{ $song->title }}, @endforeach @foreach($categories as $category){{ $category->name }}, @endforeach
@endsection
@section('description')এই পৃষ্ঠায় রয়েছে বাংলা গানের বিভিন্ন গানের তালিকা। এখানে রয়েছে বিভিন্ন ধরণের গান, যেমন, @foreach($categories as $category){{ $category->name }}, @endforeach ইত্যাদি। গানগুলোর মধ্যে রয়েছে, @foreach($songs as $song){{ $song->title }}, @endforeach ইত্যাদি। @endsection


@section('album-content')

<div class="container" style="background-color: var(--color4, #ffffff); color: var(--color2, #000000)">
    <div class="row">
        <div class="col-12 py-4">
            <h1>গানের তালিকা</h1>
        </div>
        
        <div class="container">
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
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $songs->links() }}
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