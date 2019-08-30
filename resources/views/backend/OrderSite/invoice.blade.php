@extends('backend.layouts.layout')
@section('title')
فاتورة رقم (#INV-{{$orderfirst->order_number}})
@endsection
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="col-md-7">
                    <div class="d-flex">
                        <ol class="breadcrumb m-b-10">
                            <li class="breadcrumb-item"><a style="margin-left: 1px;" href="{{url('/admin')}}">الرئيسية
                                </a></li>
                            <li class="breadcrumb-item">طلبات الموقع</li>
                            <li class="breadcrumb-item"><a style="margin-left: 1px;"
                                    href="{{url('/admin/OrderInternal')}}">الطلبات الداخليه </a></li>
                            <li class="breadcrumb-item active">فاتورة رقم (#INV-{{$orderfirst->order_number}})</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>فاتورة </b> <span class="pull-right">#INV-{{$orderfirst->order_number}}</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">بيانات العميل</b></h3>
                                    @if(!empty($orderfirst->order_user_id))
                                    <p class="text-muted m-t-20"><b>اسم العميل :</b>
                                        @if($orderfirst->user_type == 2)
                                        <a href="{{url('/admin/EditClientSite/'.$orderfirst->order_user_id)}}"
                                            target="_blank">
                                            {{$orderfirst->use_name}} {{$orderfirst->user_secondname}}
                                        </a>
                                        @elseif($orderfirst->user_type == 1)
                                        <a href="{{url('/admin/EditAdminSite/'.$orderfirst->order_user_id)}}"
                                            target="_blank">
                                            {{$orderfirst->use_name}} {{$orderfirst->user_secondname}}
                                        </a>
                                        @endif
                                    </p>
                                    @endif
                                    @if(!empty($orderfirst->use_email))
                                    <p class="text-muted"><b>البريد الألكترونى :</b> {{$orderfirst->use_email}}</p>
                                    @endif
                                    @if(!empty($orderfirst->user_phone))
                                    <p class="text-muted"><b> رقم الجوال :</b> {{$orderfirst->user_phone}}</p>
                                    @endif
                                    @if(!empty($orderfirst->country_name))
                                    <p class="text-muted"><b>دولة الأقامة :</b> {{$orderfirst->country_name}} </p>
                                    @endif
                                    @if(!empty($orderfirst->city_name))
                                    <p class="text-muted"><b>المدينة :</b> {{$orderfirst->city_name}}</p>
                                    @endif
                                    @if(!empty($orderfirst->area_name))
                                    <p class="text-muted"><b>المنطقة :</b> {{$orderfirst->area_name}}</p>
                                    @endif
                                    @if(!empty($orderfirst->user_address))
                                    <p class="text-muted"><b>العنوان :</b> {{$orderfirst->user_address}}</p>
                                    @endif
                                    @if(!empty($orderfirst->created_at))
                                    <p class="text-muted"><b>تاريخ الطلب :</b>
                                        {{date("F j, Y, g:i a", strtotime($orderfirst->created_at ))}} </p>
                                    @endif

                                </address>
                            </div>

                            <div class="pull-right text-right">
                                <address>
                                    <div class="card-body">
                                        <center>
                                            @if(!empty($setting->sit_logo_ar))
                                            <img src="{{url($setting->sit_logo_ar)}}" class="img-circle" width="130" />
                                            @else
                                            <img src="{{url($setting->sit_logofooter_ar)}}" class="img-circle"
                                                width="150" />
                                            @endif
                                            <h4 class="card-title m-t-10">الجوكير.كوم</h4>
                                            <h6 class="card-subtitle">jokermms.com</h6>
                                        </center>
                                    </div>
                                </address>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>المنتج</th>
                                            <th class="text-right">اللون / الشكل</th>
                                            <th class="text-right">المقاس</th>
                                            <th class="text-right">الكمية</th>
                                            <th class="text-right">القيمة</th>
                                            <th class="text-right">الأجمالى</th>
                                            <th class="text-right">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($orderdetails))
                                        @foreach($orderdetails as $get)
                                        <tr>
                                            <td class="text-center">{{$i++}}</td>
                                            <td>{{$get->product_name}}</td>
                                            <td class="text-right">{{$get->color_name}}</td>
                                            <td class="text-right">{{$get->size_value}}</td>
                                            <td class="text-right">{{$get->pro_count}}</td>
                                            <td class="text-right">{{$get->Sector_price}} {{$setting->sit_mony}}</td>
                                            <td class="text-right">{{$get->pro_price}} {{$setting->sit_mony}}</td>
                                            
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="pull-left m-t-30 text-left">
                                @if(!empty($orderfirst->total_price))
                                <p>أجمالى الملبغ : {{$orderfirst->total_price}} {{$setting->sit_mony}}</p>
                                @endif
                                <p>الخصم : 0 {{$setting->sit_mony}}</p>
                                <p>الشحن و التوصيل : 0 {{$setting->sit_mony}}</p>
                                <hr>
                                @if(!empty($orderfirst->total_price))
                                <h4><b>الأجمالى :</b> {{$orderfirst->total_price}} {{$setting->sit_mony}}</h4>
                                @endif
                            </div>

                            <div class="clearfix"></div>
                            <hr>
                            <!-- <div class="text-center disnone">
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i
                                            class="fa fa-print"></i> طباعة</span> </button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
