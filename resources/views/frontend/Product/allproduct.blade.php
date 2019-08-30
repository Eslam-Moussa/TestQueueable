@extends('frontend.layouts.layout')
@section('title')
المنتجات
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>المنتجات</strong></h1>
        </div>
    </div>
    <section class="bg-dark">
        <div class="container">
            <div class="row">
            <div class="col-md-6">
            <a href="@if(!empty($poster->link3_poster)){{$poster->link3_poster}}@endif">
            @if(!empty($poster->desc3_poster))
             {!!$poster->desc3_poster!!}
             @else
            <img src="@if(!empty($poster->image3_poster)){{url($poster->image3_poster)}}@endif" class="mb-3">
             @endif
             </a>
            </div>
    
            <div class="col-md-6">
            <a href="@if(!empty($poster->link4_poster)){{$poster->link4_poster}}}@endif">
             @if(!empty($poster->desc4_poster))
             {!!$poster->desc4_poster!!}
             @else
            <img src="@if(!empty($poster->image4_poster)){{url($poster->image4_poster)}}@endif" class="mb-3">
             @endif
             </a>
            </div>
            </div>
        </div>
    </section> 
    <section class="shopping-pattern">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <div class="card mb-4 widget">
                        <div class="card-body p-2">
                            <h4 class="card-title"><strong>الأقسام</strong></h4>
                            <ul class="list-group">
                                @if(!empty($Category))
                                @foreach($Category as $get) 
                                <li class="list-group-item"><a href="{{url('/Products-Section')}}/@if(!empty($get->cat_slug)){{$get->cat_slug}}@endif"><strong>@if(!empty($get->cat_name)){{$get->cat_name}}@endif</strong></a>
                                    <br>
                                    <ul>
                                        @if(!empty($productcat))
                                        @foreach($productcat as $key)
                                        @if($key->category_id == $get->id)
                                        <li><a href="{{url('/details-Product')}}/{{$key->id}}/{{$key->product_slog}}">@if(!empty($key->product_name)){{$key->product_name}}@endif</a></li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </ul>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                    <h3 class="maintitle sm"><a href="{{url('/Show-Product')}}"><strong>المنتجات</strong></a></h3>
                    <div class="gift row gift--double no-border">
                       @if(!empty($productsite))
                        @foreach($productsite as $get)
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
                                        <div class="gift__cta-wrap col-12"><a href="#"
                                                class="flux_cta gift__cta d-block" target="_blank"><i
                                                    class="material-icons">add_shopping_cart</i>&nbsp;أضف إلى السلة</a>
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
                        {{ $productsite->links() }}
                        </ul> 
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection