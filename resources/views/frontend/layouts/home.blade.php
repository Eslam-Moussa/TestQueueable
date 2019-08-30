@extends('frontend.layouts.layout')
@section('title')
@if(!empty($setting->sit_title_ar))
{{$setting->sit_title_ar}}
@endif
@endsection
@section('content')
<div>
    <header class="masthead">
        <div class="container"> 
        @if(!empty($sliderfront))
        @foreach($sliderfront as $get)
            <div class="row">
                <div class="col-md-4">
                    <div class="intro-text"><img src="{{url($get->slider_image)}}"></div>
                </div>
                <div class="col-md-8">
                    <div class="intro-text">
                        @if(!empty($get->slider_title))
                        <div class="intro-lead-in"><span>{{$get->slider_title}}</span></div>
                        @endif
                        @if(!empty($get->slider_desc))
                        <div class="intro-heading text-uppercase"><span>{{$get->slider_desc}}</span></div>
                        @endif
                        @if(!empty($get->slider_link))
                        <a href="{{$get->slider_link}}"
                            class="btn btn-primary btn-lg text-uppercase js-scroll-trigger">احصل على
                            العرض</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
             @endif 
        </div>
    </header>
</div> 
<section class="shopping-pattern">
    <div class="container">
        <h1 class="maintitle"><strong>أفضل العروض</strong></h1>
        <div class="gift row gift--double no-border">
            @if(!empty($OffersPro))
            @foreach($OffersPro as $get)
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="product-item"><a href="{{url('/details-Product')}}/{{$get->id}}/{{$get->product_slog}}"></a>
                    <div class="gift__img col-12"><img src="{{url($get->product_main_image)}}">
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
                         @if(!empty($get->product_name))
                        <h4 class="gift__name">{{$get->product_name}}</h4>
                        @endif
                        <div class="gift__details">
                            @if(!empty($get->product_desc))
                            <p class="d-sm-none d-md-block">{{$get->product_desc}}</p>
                            @endif
                        </div>
                        <div class="gift__bottom row">
                            <div class="gift__price-wrap col-12">
                               @if(!empty($get->product_Purch_price))
                                <div class="gift__normal-price"><span>السعر:&nbsp;</span><span
                                        class="gift__data">{{$setting->sit_mony}} {{$get->product_Purch_price}}</span></div>
                                        @endif
                                @if(!empty($get->price_product))
                                <div class="gift__today-price"><span>سعر اليوم:&nbsp;</span><span
                                        class="gift__data">{{$setting->sit_mony}} {{$get->price_product}}</span></div>
                                        @endif
                                 @if(!empty($get->offer_count))        
                                <div class="gift__quantity-left"><span>الكمية الباقية: </span><span
                                        class="gift__data">{{$get->offer_count}}</span></div>
                                 @endif      
                            </div>
                            <div class="gift__cta-wrap col-12"><a href="#" class="flux_cta gift__cta d-block"
                                    target="_blank"><i class="material-icons">add_shopping_cart</i>&nbsp;أضف إلى
                                    السلة</a></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<section class="important-section">
    <div class="container">
        <h1 class="maintitle reverse mb-5"><strong>المنتجات الرئيسية</strong></h1>
        <div class="blog-slider">
            <div class="blog-slider__wrp swiper-wrapper">
              @if(!empty($Categoryfront))
              @foreach($Categoryfront as $get) 
                <div class="blog-slider__item swiper-slide">
                    <div></div> 
                    <div class="blog-slider__img">@if(!empty($get->cat_image))<img src="{{url($get->cat_image)}}">@endif
                    </div>
                    <div class="blog-slider__content">
                        <div class="blog-slider__title">@if(!empty($get->cat_name)){{$get->cat_name}}@endif</div>
                        <div class="blog-slider__text">@if(!empty($get->cat_desc)){{$get->cat_desc}}@endif</div>
                        <a href="{{url('/Products-Section')}}/@if(!empty($get->cat_slug)){{$get->cat_slug}}@endif" class="blog-slider__button">عرض القسم</a>
                    </div>
                </div>
                @endforeach
                @endif 
                <div class="blog-slider__pagination"></div>
            </div>
        </div>
    </div>
</section>
<section class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <a href="@if(!empty($poster->link1_poster)){{$poster->link1_poster}}@endif">
            @if(!empty($poster->desc1_poster))
             {!!$poster->desc1_poster!!}
             @else
            <img src="@if(!empty($poster->image1_poster)){{url($poster->image1_poster)}}@endif" class="mb-3">
             @endif
             </a>
            </div>
    
            <div class="col-md-6">
            <a href="@if(!empty($poster->link2_poster)){{$poster->link2_poster}}@endif">
             @if(!empty($poster->desc2_poster))
             {!!$poster->desc2_poster!!}
             @else
            <img src="@if(!empty($poster->image2_poster)){{url($poster->image2_poster)}}@endif" class="mb-3">
             @endif
             </a>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <h1 class="maintitle"><strong>أحدث المنتجات</strong></h1>
        <div class="gift row gift--double no-border">
         @if(!empty($productsite))
         @foreach($productsite as $get)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="product-item sm"><a href="{{url('/details-Product')}}/{{$get->id}}/{{$get->product_slog}}"></a>
                    <div class="gift__img col-12">@if(!empty($get->product_main_image))<img src="{{url($get->product_main_image)}}">@endif
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
                                <div class="gift__today-price text-center"><span class="gift__price">@if(!empty($get->Sector_price)){{$setting->sit_mony}} {{$get->Sector_price}}@endif</span>
                                </div>
                            </div>
                            <div class="gift__cta-wrap col-12"><a href="#" class="flux_cta gift__cta d-block"
                                    target="_blank"><i class="material-icons">add_shopping_cart</i>&nbsp;أضف إلى
                                    السلة</a></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif   
        </div>
    </div>
</section>

@endsection
