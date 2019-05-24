@extends('layout.base')

@section('content')
<div class="container">
    <div class="row">
        <!-- Ad -->
    </div>
    <div class="row">
        <div class="col-12 pb-3">
            @yield('song-content')
        </div>
    </div>
    <hr>
    <div class="row">
        <!-- Ad -->
    </div>
    <div class="row">
        <div class="col-12">
            @yield('more-content')
        </div>
    </div>
</div>
@endsection