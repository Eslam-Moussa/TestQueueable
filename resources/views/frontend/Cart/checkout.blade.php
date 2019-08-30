@extends('frontend.layouts.layout')
@section('title')
سلة المشتريات
@endsection
@section('content')
<div class="page-title">
    <div class="container">
        <h1><strong>سلة المشتريات</strong></h1>
    </div>
</div>
<section class="clean-block clean-product shopping-pattern">
    <div class="container">
        <form action="{{url('/Checkout-End')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <h3 class="maintitle sm">قم بتأكيد بيانات طلبك</h3>
            <div class="block-content">
                <div class="table-responsive table-bordered pb-0 mb-5">
                    <table class="table table-bordered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="100px">الصورة</th>
                                <th width="20%">السعر</th>
                                <th width="20%">العدد</th>
                                <th width="20%">الأجمالى</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($cart)>0)
                            @foreach($cart as $get)
                            <tr>
                                <td class="stat">
                                    <a
                                        href="{{url('/details-Product')}}/{{$get->id}}/{{ $get->attributes['slogen'] }}"><strong>{{$get->name}}</strong></a>
                                </td>
                                <td class="stat"><img src="{{url($get->attributes['image'])}}"><br></td>
                                <td>{{$setting->sit_mony}} {{$get->price}}</td>
                                <td>
                                    {{$get->quantity}}
                                </td>
                                <td>{{$setting->sit_mony}} {{$get->quantity * $get->price}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 text-right pt-3">
                        <h5><strong>إجمالي السلة:</strong></h5>
                        <h3>{{$setting->sit_mony}} {{$cartsum}}</h3>
                        <!-- <h5 class="text-secondary small font-weight-bold">قيمة كود التخفيض: -74.00$</h5>
                        <h5 class="text-secondary small font-weight-bold">السعر الأساسي: 274.00$</h5> -->
                    </div>
                </div>
                <hr>
                <button class="btn btn-dark btn-lg float-right mx-auto" type="submit" role="button">تأكيد معلومات
                    الطلب
                </button>
                </form>
                <a class="btn btn-outline-dark btn-lg mx-auto" role="button" href="{{url('/Shopping-Cart-Show')}}">العودة للتعديل</a>
            </div>
        
    </div>
</section>
@endsection
