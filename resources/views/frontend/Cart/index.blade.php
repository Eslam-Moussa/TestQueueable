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
            <h2 class="maintitle sm">السلة</h2>
            <div class="block-content">
                <div class="table-responsive table-bordered pb-0 mb-5">
                    <table class="table table-striped table-bordered mb-0">
                        <thead>
                            <tr class="table-secondary">
                                <th>#</th>
                                <th width="100px">الصورة</th>
                                <th width="20%">السعر</th>
                                <th width="20%">العدد</th>
                            </tr>
                        </thead>
                         <tbody>
                         @if(!empty($cart)>0)
                         @foreach($cart as $get)
                            <tr>
                                <td class="stat">
                                    <a href="{{url('/details-Product')}}/{{$get->id}}/{{ $get->attributes['slogen'] }}"><strong>{{$get->name}}</strong></a>
                                </td>
                                <td class="stat"><img src="{{url($get->attributes['image'])}}"><br></td>
                                <td>{{$setting->sit_mony}} {{$get->price}}</td>
                                <td>
                                <form  action="{{url('/Shopping-Cart-Edit')}}/{{$get->id}}" method="post">
                                                {{csrf_field()}}
                                    <input type="number" class="productcount" name="qty" value="{{ $get->quantity }}" min="1" step="1">
                                    <button type="submit" class="btn btn-default" style="margin: 5px 74px -7px;">
                                        <i class="fa fa-refresh"></i>
                                      </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif   
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                        <!-- <div class="input-group"><input class="form-control" type="text" placeholder="أضف كود التخفيض...">
                            <div class="input-group-append"><button class="btn btn-primary" type="button">أضف كود التخفيض</button></div>
                        </div> -->
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-2"></div>
                    <div class="col-sm-12 col-md-6 col-lg-4 text-right pt-3">
                        <h5><strong>اجمالي السلة:</strong></h5>
                        @if(Auth::User())
                        <h3>{{$setting->sit_mony}} {{$cartsum}}</h3><a class="btn btn-outline-dark btn-block btn-lg" role="button" href="{{url('/Cart-Checkout')}}">إرسال الطلب</a></div>
                        @else
                        <h3>{{$setting->sit_mony}} {{$cartsum}}</h3><a class="btn btn-outline-dark btn-block btn-lg" role="button" href="{{url('/Site-login')}}">إرسال الطلب</a></div>
                        @endif
                </div>
            </div>
        </div>
    </section>
@endsection