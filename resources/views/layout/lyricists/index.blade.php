@extends('layout.lyricists.base')

@section('title', 'গীতিকারদের তালিকা | সুরেলা.কম | Shoorela.com')
@section('keywords')@foreach($lyricists as $lyricist){{ $lyricist->name }}, @endforeach @foreach($categories as $category){{ $category->name }}, @endforeach
@endsection
@section('description')এই পৃষ্ঠায় রয়েছে বাংলা গানের বিভিন্ন গীতিকারদের তালিকা। এখানে রয়েছে বিভিন্ন ধরণের গানের গীতিকারদের নাম, যেমন, @foreach($categories as $category){{ $category->name }}, @endforeach ইত্যাদি। গীতিকারদের মধ্যে রয়েছেন, @foreach($lyricists as $lyricist){{ $lyricist->name }}, @endforeach ইত্যাদি। @endsection


@section('lyricist-content')

<div class="container" style="background-color: var(--color4, #ffffff); color: var(--color2, #000000)">
    <div class="row">
        <div class="col-12 py-4">
            <h1>গীতিকারের তালিকা</h1>
        </div>
        
        <div class="container">
            <div class="row">
                @foreach($lyricists as $lyricist)
                    <div class="col-6 col-sm-4 col-lg-3" style="display: flex; flex:1 0 auto;">
                        <div class="card mb-4" style="border-color: var(--color4, #ffffff)">
                            @if($lyricist->photo !== null)
                                <img class="card-img-top img-fluid" src="{{ url('storage/images/'.$lyricist->photo) }}">
                            @else
                                <img class="card-img-top img-fluid" src="{{ url('storage/images/lyricist-placeholder.png') }}">
                            @endif
                            <div class="card-body" style="background-color: var(--color6)">
                                <h5 class="card-title"><a href="{{ route('lyricist.show', array($lyricist->id, $lyricist->slug)) }}">{{ $lyricist->name }}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $lyricists->links() }}
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