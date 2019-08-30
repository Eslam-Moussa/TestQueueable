@extends('frontend.layouts.layout')
@section('title')
الشروط والأحكام
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>الشروط والأحكام</strong></h1>
        </div>
    </div>
    <section class="shopping-pattern">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="py-5 px-3 contact-form" style="max-width:90%;">
                        @if(!empty($condition->condition_image))
                        <img src="{{url($condition->condition_image)}}" class="w-100">
                        @endif
                        <br>
                        <br>
                        @if(!empty($condition->condition_title))
                        <h2>{{$condition->condition_title}}</h2>
                        @endif
                        @if(!empty($condition->condition_desc))
                        <p>{!!$condition->condition_desc!!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection