@extends('frontend.layouts.layout')
@section('title')
@if(!empty($product->product_name))
{{$product->product_name}}
@endif
@endsection
@section('content')
<div class="page-title">
    <div class="container">
        <h1><strong>
                @if(!empty($product->product_name))
                {{$product->product_name}}
                @endif
            </strong></h1>
    </div>
</div>
<section class="clean-block clean-product shopping-pattern">
    <div class="container">
        <div class="block-content mb-5">
            <div class="product-info">
                <div class="row">
                    <div class="col-md-6">
                        <div class="gallery">
                            <div class="sp-wrap">
                                @if(!empty($product->product_main_image))
                                <a href="{{url($product->product_main_image)}}"><img class="img-fluid d-block mx-auto"
                                        src="{{url($product->product_main_image)}}"></a>
                                @endif
                                @if(!empty($productimage))
                                @foreach($productimage as $image)
                                <a href="{{url($image->images)}}"><img class="img-fluid d-block mx-auto"
                                        src="{{url($image->images)}}"></a>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <form action="{{url('/Shopping-Cart-Add')}}/{{$product->id}}" method="post">
                                {{csrf_field()}}
                        <div class="info">
                            <h3>
                                @if(!empty($product->product_name))
                                {{$product->product_name}}
                                @endif
                            </h3>
                            @if(isset($product->comment_count) && $product->comment_count > 0)
                            @if($rat = $product->sum_rate > 0)
                            <?php
                            $rat = $product->sum_rate / $product->comment_count;
                            ?>
                            @if(isset($rat)) 
                            <div class="rating">
                                 @if($rat <= 1)
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                @elseif($rat <= 2)
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                @elseif($rat <= 3)
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                @elseif($rat <= 4)
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                @elseif($rat <= 5)
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                <img src="{{url('/')}}/website/assets/img/star.svg">
                                @endif
                                </div>
                            @endif    
                            @endif
                            @endif
                            <div class="price">
                                <h3>@if(!empty($product->Sector_price)){{$setting->sit_mony}}
                                    {{$product->Sector_price}} @endif</h3>
                            </div>
                            <div class="summary">
                                <p>@if(!empty($product->product_desc)){{$product->product_desc}}@endif</p>
                            </div>
                            <div class="p-3">
                                <h5>ألوان:</h5>
                                @if(!empty($productcolor))
                                @foreach($productcolor as $get)
                                <div class="form-check"><input class="form-check-input" type="radio" value="{{$get->colors}}" name="pro_color"
                                        id="formCheck-1"><label class="form-check-label" for="formCheck-1">{{$get->color_name}}</label>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="p-3">
                                <h5>أحجام:</h5>
                                @if(!empty($productsize))
                                @foreach($productsize as $get)
                                <div class="form-check"><input class="form-check-input" type="radio" value="{{$get->size_value_id}}" name="pro_size"
                                        id="formCheck-1"><label class="form-check-label" for="formCheck-1">{{$get->size_value}}</label>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            
                            <div class="p-3">
                                <h5>الكمية:</h5><input type="number" class="productcount form-control" name="quantity" value="1" min="1"
                                    step="1">
                            </div><button class="btn btn-primary mb-4 mr-3 mt-3" type="submit" role="button" ><i
                                    class="material-icons" style="transform: translateY(5px);">add_shopping_cart</i>أضف
                                إلى السلة</button>
                            @if(Auth::User())    
                            <a class="btn btn-primary mb-4 mr-3 mt-3" role="button" href="{{url('/AddToFav')}}/{{$product->id}}"><i
                                    class="material-icons" style="transform: translateY(5px);">stars</i>أضف إلى
                                المفضلة</a>
                           @else 
                           <a class="btn btn-primary mb-4 mr-3 mt-3" role="button" href="{{url('/Site-login')}}"><i
                                    class="material-icons" style="transform: translateY(5px);">stars</i>أضف إلى
                                المفضلة</a>
                            @endif      
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="product-info">
                <div>
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#description"
                                id="description-tab">معلومات</a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#specifications"
                                id="specifications-tabs">مواصفات</a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#reviews"
                                id="reviews-tab">التقييم</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active fade show description" role="tabpanel" id="description">
                            <p>@if(!empty($product->product_desc)){{$product->product_desc}}@endif</p>
                        </div>
                        <div class="tab-pane fade show specifications" role="tabpanel" id="specifications">
                            <div class="table-responsive table-bordered">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="stat">ألوان</td>
                                            <td>
                                            @if(!empty($productcolor))
                                            @foreach($productcolor as $get)
                                            {{$get->color_name}},
                                            @endforeach
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="stat">أحجام</td>
                                            <td>
                                            @if(!empty($productsize))
                                            @foreach($productsize as $get)
                                            {{$get->size_value}},
                                            @endforeach
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="stat">أشكال</td>
                                            <td>
                                            @if(!empty($productstyle))
                                            @foreach($productstyle as $get)
                                            @if($get->style_id = "null")
                                            لا يوجد
                                            @else
                                            {{$get->settingstyle_desc}},
                                            @endif
                                            @endforeach
                                            @else
                                            لا يوجد
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="stat">العدد المتاح</td>
                                            <td>
                                            @if(!empty($productsizenumber))
                                            @foreach($productsizenumber as $get)
                                            {{$get->size_number}},
                                            @endforeach
                                            @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade show" role="tabpanel" id="reviews">
                            @if(count($comment)>0)
                            @foreach($comment as $getcomment)
                            <div class="reviews">
                                <div class="review-item">
                                    <div class="rating">
                                    @if($getcomment->comment_rate == 1)
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    @elseif($getcomment->comment_rate == 2)
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    @elseif($getcomment->comment_rate == 3)
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star-empty.svg">
                                    @elseif($getcomment->comment_rate == 4)
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    @elseif($getcomment->comment_rate == 5)
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star.svg">
                                    <img src="{{url('/')}}/website/assets/img/star-empty.svg">
                                    @endif
                                    </div>
                                    <h4>{{$getcomment->comment_title}}</h4><span class="text-muted"><a href="#">{{$getcomment->comment_name}}</a> - {{date('F j, Y', strtotime($getcomment->created_at))}}</span>
                                    <p>{!!$getcomment->comment_message!!}</p>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <br>
                             <div class="text-center">   
                               <h2 style="color:#e9c769;">لا يوجد تعليقات لهذا المنتج</h2>
                              </div>
                              <br>
                            @endif
                            <h4 class="maintitle sm">Add Your Review</h4>
                            <form action="{{url('/Add-Comment')}}" method="post" class="form-row" enctype="multipart/form-data">
                              {{csrf_field()}}
                                <div class="form-group col-md-6 {{ $errors->has('comment_title') ? ' has-danger' : '' }}"><label>عنوان التقييم<span style="color: red">*</span></label>
                                <input class="form-control" name="comment_title" type="text">
                                 @if ($errors->has('comment_title'))
                                 <small class="form-control-feedback">{{ $errors->first('comment_title') }} </small>
                                @endif
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('comment_rate') ? ' has-danger' : '' }}"><label>المستوى النجمي<span style="color: red">*</span></label><select
                                        class="form-control" name="comment_rate">
                                        <option value="5" selected="">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                    @if ($errors->has('comment_rate'))
                                   <small class="form-control-feedback">{{ $errors->first('comment_rate') }} </small>
                                    @endif
                                    </div>
                                    <input type="hidden" name="product_id" value="{{$product->id}}">   
                                <div class="form-group col-md-12 {{ $errors->has('comment_message') ? ' has-danger' : '' }}"><label>رسالة التقييم<span style="color: red">*</span></label><textarea
                                        class="form-control" rows="5" name="comment_message"></textarea>
                                        @if ($errors->has('comment_message'))
                                       <small class="form-control-feedback">{{ $errors->first('comment_message') }} </small>
                                         @endif
                                        </div><button type="submit" class="btn btn-dark"
                                    role="button" >أضف تقييمك</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="maintitle"><strong>منتجات ذات صلة</strong></h1>
        <div class="gift row gift--double no-border">
            @if(!empty($prodectrelated))
            @foreach($prodectrelated as $get)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="product-item sm"><a
                        href="{{url('/details-Product')}}/{{$get->id}}/{{$get->product_slog}}"></a>
                    <div class="gift__img col-12">@if(!empty($get->product_main_image))<img
                            src="{{url($get->product_main_image)}}">@endif
                        @if(isset($get->comment_count) && $get->comment_count > 0)
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
                        @endif
                    </div>
                    <div class="gift__info col-12">
                        <h4 class="gift__name">@if(!empty($get->product_name)){{$get->product_name}}@endif</h4>
                        <div class="gift__details"></div>
                        <div class="gift__bottom row">
                            <div class="gift__price-wrap col-12">
                                <div class="gift__today-price text-center"><span
                                        class="gift__price">@if(!empty($get->Sector_price)){{$setting->sit_mony}}
                                        {{$get->Sector_price}}@endif</span></div>
                            </div>
                            <div class="gift__cta-wrap col-12"><a href="#" class="flux_cta gift__cta d-block"
                                    target="_blank"><i class="material-icons">add_shopping_cart</i>&nbsp;أضف إلى
                                    السلة</a>
                            </div>
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
