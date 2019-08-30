@extends('frontend.layouts.layout')
@section('title')
الدعم الفني
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>الدعم الفني</strong></h1>
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
                                <li class="list-group-item"><a href="#"><strong>تنبيهات</strong></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                    <div class="block-content"><a class="btn btn-outline-dark mb-4" role="button" href="{{url('/NewTicket')}}">أضف تذكرة جديدة</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="table-secondary">
                                        <th>عنوان التذكرة</th>
                                        <th width="20%">تاريخ الإصدار</th>
                                        <th width="20%">الحالة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="{{url('/NewTicket')}}"><strong>عنوان التذكرة</strong></a></td>
                                        <td>01 يناير 2019</td>
                                        <td><button class="btn btn-outline-info btn-block btn-sm" type="button">في انتظار المراجعة</button></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{url('/NewTicket')}}"><strong>عنوان التذكرة</strong></a></td>
                                        <td>01 يناير 2019</td>
                                        <td><button class="btn btn-outline-warning btn-block btn-sm" type="button">قيد التنفيذ</button></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{url('/NewTicket')}}"><strong>عنوان التذكرة</strong></a></td>
                                        <td>01 يناير 2019</td>
                                        <td><button class="btn btn-outline-danger btn-block btn-sm" type="button">في انتظار الدفع</button></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{url('/NewTicket')}}"><strong>عنوان التذكرة</strong></a></td>
                                        <td>01 يناير 2019</td>
                                        <td><button class="btn btn-outline-info btn-block btn-sm" type="button">في انتظار المراجعة</button></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{url('/NewTicket')}}"><strong>عنوان التذكرة</strong></a></td>
                                        <td>01 يناير 2019</td>
                                        <td><button class="btn btn-outline-warning btn-block btn-sm" type="button">قيد التنفيذ</button></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{url('/NewTicket')}}"><strong>عنوان التذكرة</strong></a></td>
                                        <td>01 يناير 2019</td>
                                        <td><button class="btn btn-outline-danger btn-block btn-sm" type="button">في انتظار الدفع</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav class="d-xl-flex justify-content-xl-center">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link">1</a></li>
                                <li class="page-item"><a class="page-link">2</a></li>
                                <li class="page-item"><a class="page-link">3</a></li>
                                <li class="page-item"><a class="page-link">4</a></li>
                                <li class="page-item"><a class="page-link">5</a></li>
                                <li class="page-item"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection