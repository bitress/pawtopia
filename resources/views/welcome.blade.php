@extends('layouts.app')
@section('content')
    <div class="container py-5">

        <div class="row">

            <div class="col-12 main">
                <div class="carousel mb-4 w-auto">
                    <div class="slides">
                        <img src="{{asset('assets/banners/1.png')}}" alt="slide image" class="slide">
                        <img src="{{asset('assets/banners/2.png')}}" alt="slide image" class="slide">
                        <img src="{{asset('assets/banners/3.png')}}" alt="slide image" class="slide">
                    </div>
                </div>
            </div>

            @include('categories.index')
        </div>
@endsection
