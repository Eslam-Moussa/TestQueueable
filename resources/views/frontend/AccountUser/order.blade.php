@extends('frontend.layouts.layout')
@section('title')
طلباتى
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>طلباتى</strong></h1>
        </div>
    </div>
    <section class="clean-block clean-product shopping-pattern">
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
                    <div class="block-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="table-secondary">
                                        <th>رقم الطلب</th>
                                        <th width="15%">قيمة الطلب</th>
                                        <th width="20%">تاريخ الإصدار</th>
                                        <th width="20%">الحالة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($myorder))
                                @foreach($myorder as $get)
                                    <tr>
                                        <td><a href="{{url('/details-myorder/'.$get->id)}}"><strong>INVO #{{$get->order_number}}</strong></a></td>
                                        <td>{{$setting->sit_mony}} {{$get->order_total}}</td>
                                        <td>{{date('Y-m-d', strtotime($get->created_at))}}</td>
                                        <td>
                                        @if($get->order_status == 0) 
                                        <button class="btn btn-outline-info btn-block btn-sm" type="button">في انتظار المراجعة</button>
                                        @elseif($get->order_status == 1)
                                        <button class="btn btn-outline-warning btn-block btn-sm" type="button">جاري التجهيز</button>
                                        @elseif($get->order_status == 2) 
                                        <button class="btn btn-outline-danger btn-block btn-sm" type="button">في انتظار تحويل الحوالة البنكية</button>
                                        @elseif($get->order_status == 3)
                                        <button class="btn btn-outline-success btn-block btn-sm" type="button">تم تحويل الحوالة البنكية</button>
                                        @elseif($get->order_status == 4)
                                        <button class="btn btn-outline-secondary btn-block btn-sm" type="button">تم ارسالها لشركة الشحن</button>
                                        @elseif($get->order_status == 5)
                                        <button class="btn btn-outline-warning btn-block btn-sm" type="button">ملغاة من قبل الأدارة</button>
                                        @elseif($get->order_status == 6)
                                        <button class="btn btn-outline-warning btn-block btn-sm" type="button">ملغاة من العميل</button>
                                        @endif
                                        </td>
                                   </tr>
                                  @endforeach
                                  @endif 
                                </tbody>
                            </table>
                        </div>
                        <nav class="d-xl-flex justify-content-xl-center">
                            <ul class="pagination">
                            {{ $myorder->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection