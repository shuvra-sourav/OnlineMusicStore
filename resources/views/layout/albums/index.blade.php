@extends('layout.albums.base')

@section('title', 'অ্যালবামের তালিকা | সুরেলা.কম | Shoorela.com')
@section('keywords')@foreach($albums as $album){{ $album->name }}, @endforeach @foreach($categories as $category){{ $category->name }}, @endforeach
@endsection
@section('description')এই পৃষ্ঠায় রয়েছে বাংলা গানের বিভিন্ন অ্যালবামের তালিকা। এখানে রয়েছে বিভিন্ন ধরণের গানের অ্যালবাম, যেমন, @foreach($categories as $category){{ $category->name }}, @endforeach ইত্যাদি। অ্যালবামের মধ্যে রয়েছে, @foreach($albums as $album){{ $album->name }}, @endforeach ইত্যাদি। @endsection

@section('album-content')

<div class="container" style="background-color: var(--color4, #ffffff); color: var(--color2, #000000)">
    <div class="row">
        <div class="col-12 py-4">
            <h1>অ্যালবামের তালিকা</h1>
        </div>
        
        <div class="container">
            <div class="row">
                @foreach($albums as $album)
                    <div class="col-6 col-sm-4 col-lg-3" style="display: flex; flex:1 0 auto;">
                        <div class="card mb-4" style="border-color: var(--color4, #ffffff)">
                            @if($album->cover !== null)
                                <img class="card-img-top img-fluid" src="{{ url('storage/images/'.$album->cover) }}">
                            @else
                                <img class="card-img-top img-fluid" src="{{ url('storage/images/album-placeholder.png') }}">
                            @endif
                            <div class="card-body" style="background-color: var(--color6)">
                                <h5 class="card-title"><a href="{{ route('album.show', array($album->id, $album->slug)) }}">{{ $album->name }}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $albums->links() }}
    </div>
</div>
@endsection


@section('sidebar')
<div class="no-gutters">
    <div class="row justify-content-center">
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