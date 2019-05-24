@extends('layout.composers.base')

@section('title', 'সুরকারদের তালিকা | সুরেলা.কম | Shoorela.com')
@section('keywords')@foreach($composers as $composer){{ $composer->name }}, @endforeach @foreach($categories as $category){{ $category->name }}, @endforeach
@endsection
@section('description')এই পৃষ্ঠায় রয়েছে বাংলা গানের বিভিন্ন সুরকারদের তালিকা। এখানে রয়েছে বিভিন্ন ধরণের গানের সুরকারদের নাম, যেমন, @foreach($categories as $category){{ $category->name }}, @endforeach ইত্যাদি। সুরকারদের মধ্যে রয়েছেন, @foreach($composers as $composer){{ $composer->name }}, @endforeach ইত্যাদি। @endsection

@section('composer-content')

<div class="container" style="background-color: var(--color4, #ffffff); color: var(--color2, #000000)">
    <div class="row">
        <div class="col-12 py-4">
            <h1>সুরকারের তালিকা</h1>
        </div>
        
        <div class="container">
            <div class="row">
                @foreach($composers as $composer)
                    <div class="col-6 col-sm-4 col-lg-3" style="display: flex; flex:1 0 auto;">
                        <div class="card mb-4" style="border-color: var(--color4, #ffffff)">
                            @if($composer->photo !== null)
                                <img class="card-img-top img-fluid" src="{{ url('storage/images/'.$composer->photo) }}">
                            @else
                                <img class="card-img-top img-fluid" src="{{ url('storage/images/composer-placeholder.png') }}">
                            @endif
                            <div class="card-body" style="background-color: var(--color6)">
                                <h5 class="card-title"><a href="{{ route('composer.show', array($composer->id, $composer->slug)) }}">{{ $composer->name }}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $composers->links() }}
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