@extends('frontend.layouts.layout')
@section('title')
معرض الصور
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>معرض الصور</strong></h1>
        </div>
    </div>
    <section class="shopping-pattern photo-gallery">
        <div class="container">
            <div class="row photos">
                @if(!empty($Gallery))
                 @foreach($Gallery as $get) 
                <div class="col-sm-6 col-md-4 col-lg-3 item">
                <a href="{{url($get->gallery_list)}}" data-lightbox="photos"><img class="img-fluid" src="{{url($get->gallery_list)}}"></a>
                </div>
                @endforeach
                 @endif
            </div>
        </div>
    </section>
@endsection