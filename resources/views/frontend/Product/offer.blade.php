@extends('frontend.layouts.layout')
@section('title')
العروض
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>أحدث العروض</strong></h1>
        </div>
    </div> 
    <section class="shopping-pattern">
        <div class="container">
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
                            @if(!empty($get->product_name))
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
            <nav class="d-xl-flex justify-content-xl-center">
                <ul class="pagination">
                  {{ $OffersPro->links() }}
                </ul>
            </nav>
        </div>
    </section>
@endsection