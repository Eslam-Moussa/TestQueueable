@extends('frontend.layouts.layout')
@section('title')
من نحن
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>من نحن</strong></h1>
        </div>
    </div>
    <section class="shopping-pattern">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="py-5 px-3 contact-form" style="max-width:90%;">
                        @if(!empty($about->about_image))
                        <img src="{{url($about->about_image)}}" class="w-100">
                        @endif
                        <br>
                        <br>
                        @if(!empty($about->about_title))
                        <h2>{{$about->about_title}}</h2>
                        @endif
                        @if(!empty($about->about_desc))
                        <p>{!!$about->about_desc!!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection