@extends('frontend.layouts.layout')
@section('title')
تعديل تفاصيل الطلب
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            @if(!empty($Orderfirst->order_number))
            <h1><strong>تفاصيل الطلب INVO #{{$Orderfirst->order_number}}</strong></h1>
            @endif
        </div>
    </div>
    <section class="clean-block clean-product shopping-pattern">
    <form  action="{{url('/Edit-myorder')}}/{{$Orderfirst->id}}" method="post">
        {{csrf_field()}}
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
                                <td><input type="number" class="productcount" name="qty" value="{{$get->pro_count}}" min="1" step="1">
                                <input type="hidden" name="order_id"  value="{{$get->id}}">
                                <input type="hidden" name="price"  value="{{$get->pro_price}}">
                                </td>
                                
                            </tr>
                            @endforeach
                            @endif 
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-2"></div>
                    <div class="col-sm-12 col-md-6 col-lg-4 text-right pt-3">
                        <h5><strong>اجمالي السلة:</strong></h5>
                        <h3>{{$setting->sit_mony}} {{$Ordersum}}</h3>
                    </div>
                </div>
                <hr><button class="btn btn-outline-dark btn-lg float-right mx-auto" role="button" type="submit">الإنتهاء من التعديل</button>
                <div class="clearfix"></div>
            </div>
        </div>
    </form>
    </section>
@endsection