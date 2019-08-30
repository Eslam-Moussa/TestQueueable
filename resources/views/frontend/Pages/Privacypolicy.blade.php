@extends('frontend.layouts.layout')
@section('title')
سياسة الخصوصية
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>سياسة الخصوصية</strong></h1>
        </div>
    </div>
    <section class="shopping-pattern">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="py-5 px-3 contact-form" style="max-width:90%;">
                        @if(!empty($policy->polic_image))
                        <img src="{{url($policy->polic_image)}}" class="w-100">
                        @endif
                        <br>
                        <br>
                        @if(!empty($policy->polic_title))
                        <h2>{{$policy->polic_title}}</h2>
                        @endif
                        @if(!empty($policy->polic_desc))
                        <p>{!!$policy->polic_desc!!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection