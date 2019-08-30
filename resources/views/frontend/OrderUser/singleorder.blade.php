@extends('frontend.layouts.layout')
@section('title')
تفاصيل الطلب
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>تفاصيل الطلب INVO #{{$Orderfirst->order_number}}</strong></h1>
        </div>
    </div>
    <section class="clean-block clean-product shopping-pattern">
        <div class="container">
            <div class="block-content">
                <h5>حالة الطلب&nbsp;
                @if($Orderfirst->order_status == 0) 
                <button class="btn btn-outline-info  btn-sm" type="button">في انتظار المراجعة</button>
                @elseif($Orderfirst->order_status == 1)
                <button class="btn btn-outline-warning  btn-sm" type="button">جاري التجهيز</button>
                @elseif($Orderfirst->order_status == 2) 
                <button class="btn btn-outline-danger  btn-sm" type="button">في انتظار تحويل الحوالة البنكية</button>
                @elseif($Orderfirst->order_status == 3)
                <button class="btn btn-outline-success  btn-sm" type="button">تم تحويل الحوالة البنكية</button>
                @elseif($Orderfirst->order_status == 4)
                <button class="btn btn-outline-secondary  btn-sm" type="button">تم ارسالها لشركة الشحن</button>
                @elseif($Orderfirst->order_status == 5)
                <button class="btn btn-outline-warning  btn-sm" type="button">ملغاة من قبل الأدارة</button>
                @elseif($Orderfirst->order_status == 6)
                <button class="btn btn-outline-warning  btn-sm" type="button">ملغاة من العميل</button>
                @endif
                </h5> 
                <div class="table-responsive table-bordered pb-0 mb-5">
                    <table class="table table-striped table-bordered mb-0">
                        <thead>
                            <tr class="table-secondary">
                                <th>المنتج</th>
                                <th width="20%">اللون/الشكل</th>
                                <th width="20%">المقاس</th>
                                <th width="100px">الصورة</th>
                                <th width="20%">السعر</th>
                                <th width="20%">العدد</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if(!empty($OrderSite))
                           @foreach($OrderSite as $get)
                            <tr>
                                <td class="stat"><strong>{{$get->product_name}}</strong></td>
                                <td class="stat"><strong>{{$get->color_name}}</strong></td>
                                <td class="stat"><strong>{{$get->size_value}}</strong></td>
                                <td class="stat"><img src="{{url($get->product_main_image)}}"><br></td>
                                <td><span class="d-block font-weight-bold">{{$setting->sit_mony}} {{$get->pro_price}}</span></td>
                                <td>{{$get->pro_count}}</td>
                            </tr>
                            @endforeach
                            @endif 
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 text-right pt-3">
                        <h5><strong>اجمالي السلة:</strong></h5>
                        <h3>{{$setting->sit_mony}} {{$Ordersum}}</h3>
                    </div>
                </div>
                <hr><a class="btn btn-dark btn-lg float-right mx-auto" role="button" href="{{url('/Edit-myorder/'.$Orderfirst->id)}}">تعديل الطلب</a>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
@endsection