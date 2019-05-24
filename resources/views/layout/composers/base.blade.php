@extends('layout.base')

@section('content')
<div class="container">
    <div class="row">
        <!-- Ad -->
    </div>
    <div class="row">
        <div class="col-12 col-md-9 col-lg-9 pb-3">
            @yield('composer-content')
        </div>
        <div class="col-12 col-md-3 col-lg-3">
            @yield('sidebar')
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