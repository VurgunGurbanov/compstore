@extends('layouts.app')

@section('content')

    <div class="laptop">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="titlepage">
                        <p>Every Computer and laptop</p>
                        <h2>Up to 40% off !</h2>
                        <a class="read_more" href="#">Shop Now</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="laptop_box">
                        <figure><img src="{{asset('images/pc.png')}}" alt="#"/></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
