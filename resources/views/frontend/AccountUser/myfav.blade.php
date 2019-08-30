@extends('frontend.layouts.layout')
@section('title')
مفضلتي
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>مفضلتي</strong></h1>
        </div>
    </div>
    <section class="shopping-pattern">
        <div class="container">
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <div class="card mb-4 widget">
                        <div class="card-body p-2">
                            <h4 class="card-title"><strong>لوحة العميل</strong></h4>
                            <ul class="list-group">
                                <li class="list-group-item {{ Request::is('/My-profile') ? 'active' : '' }}"><a href="{{url('/My-profile')}}"><strong>تعديل الملف الشخصي</strong></a></li>
                                <li class="list-group-item {{ Request::is('/My-favourites') ? 'active' : '' }}"><a href="{{url('/My-favourites')}}"><strong>مفضلتي</strong></a></li>
                                <li class="list-group-item {{ Request::is('/My-orders') ? 'active' : '' }}"><a href="{{url('/My-orders')}}"><strong>طلباتي</strong></a></li>
                                <li class="list-group-item {{ Request::is('/My-invoices') ? 'active' : '' }}"><a href="{{url('/My-invoices')}}"><strong>فواتيري</strong></a></li>
                                <li class="list-group-item {{ Request::is('/My-Tickets') ? 'active' : '' }}"><a href="{{url('/My-Tickets')}}"><strong>الدعم الفني</strong></a></li>
                                <!-- <li class="list-group-item"><a href="#"><strong>تنبيهات</strong></a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                    <div class="gift row gift--double no-border">
                    @if(!empty($prodectfav))
                        @foreach($prodectfav as $get)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="product-item sm"><a href="{{url('/details-Product')}}/{{$get->id}}/{{$get->product_slog}}"></a>
                                <div class="gift__img col-12">@if(!empty($get->product_main_image))<img
                                        src="{{url($get->product_main_image)}}">@endif
                                        @if($rat = $get->sum_rate > 0)
                                        <?php
                                        $rat = $get->sum_rate / $get->comment_count;
                                        ?>
                                        @if(isset($rat))
                                        <div class="gift__rating">
                                        @if($rat <= 1)
                                        <i class="fa fa-star"></i>
                                        @elseif($rat <= 2)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        @elseif($rat <= 3)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        @elseif($rat <= 4)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        @elseif($rat <= 5)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        @endif 
                                        </div>
                                        @endif    
                                        @endif
                                </div>
                                <div class="gift__info col-12">
                                    <h4 class="gift__name">@if(!empty($get->product_name)){{$get->product_name}}@endif</h4>
                                    <div class="gift__details"></div>
                                    <div class="gift__bottom row">
                                        <div class="gift__price-wrap col-12">
                                            <div class="gift__today-price text-center"><span
                                                    class="gift__price">@if(!empty($get->Sector_price)){{$setting->sit_mony}} {{$get->Sector_price}}@endif</span></div>
                                        </div>
                                        <div class="gift__cta-wrap col-12"><a href="{{url('/RemoveFromFavourit')}}/{{$get->fav_id}}"
                                                class="flux_cta gift__cta d-block" >
                                                <i class="fa fa-trash"></i><span>حذف من المفضله</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <nav class="d-xl-flex justify-content-xl-center">
                        <ul class="pagination">
                        {{ $prodectfav->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection