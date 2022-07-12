@extends('layouts.app')

@section('content')

    <div class="about">
        <div class="container">
            <div class="row d_flex">
                <div class="col-md-5">
                    <div class="titlepage">
                        <h2>About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        <a class="read_more" href="#">Read More</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about_img">
                        <figure><img src="{{asset('images/about.jpg')}}" alt="#"/></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
