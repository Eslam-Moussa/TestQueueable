@extends('frontend.layouts.layout')
@section('title')
فواتيرى
@endsection
@section('content')
<div class="page-title">
    <div class="container">
        <h1><strong>تفاصيل الفاتورة INVO #{{$Invoicefirst->invoice_number}}</strong></h1>
    </div>
</div>
<section class="clean-block clean-product shopping-pattern">
    <div class="container">
        <div class="block-content">
            <h5>حالة الطلب&nbsp;
                @if($Invoicefirst->invoice_status == 0)
                <button class="btn btn-outline-info  btn-sm" type="button">في انتظار المراجعة</button>
                @elseif($Invoicefirst->invoice_status == 1)
                <button class="btn btn-outline-warning  btn-sm" type="button">جاري التجهيز</button>
                @elseif($Invoicefirst->invoice_status == 2)
                <button class="btn btn-outline-danger  btn-sm" type="button">في انتظار تحويل الحوالة البنكية</button>
                @elseif($Invoicefirst->invoice_status == 3)
                <button class="btn btn-outline-success  btn-sm" type="button">تم تحويل الحوالة البنكية</button>
                @elseif($Invoicefirst->invoice_status == 4)
                <button class="btn btn-outline-secondary  btn-sm" type="button">تم ارسالها لشركة الشحن</button>
                @elseif($Invoicefirst->invoice_status == 5)
                <button class="btn btn-outline-warning  btn-sm" type="button">ملغاة من قبل الأدارة</button>
                @elseif($Invoicefirst->invoice_status == 6)
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
                            <td><span class="d-block font-weight-bold">{{$setting->sit_mony}} {{$get->pro_price}}</span>
                            </td>
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
            <hr>
            <h3 class="maintitle sm">عنوان الشحن:</h3>
            <form action="{{url('/details-myinvoice/'.$Invoicefirst->id)}}" method="post" enctype="multipart/form-data" class="form-row">
                        {{csrf_field()}}
                <div class="form-group col-md-6 {{ $errors->has('country_id') ? ' has-danger' : '' }}">
                    <label class="control-label">الدولة<span style="color: red">*</span></label>
                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                        name="country_id">
                        <option value="">اختر</option>
                        @if(!empty($Country))
                        @foreach($Country as $getcat)
                        <option value="{{$getcat->id}}" @if(!empty($Invoicefirst->country_id))@if($getcat->id == $Invoicefirst->country_id)selected @endif @else @if($getcat->id == Auth::user()->country_id)selected @endif @endif>{{$getcat->country_name}}</option>
                        @endforeach
                        @endif
                    </select>
                    @if ($errors->has('country_id'))
                    <small class="form-control-feedback">{{ $errors->first('country_id') }}
                    </small>
                    @endif
                </div>

                <div class="form-group col-md-6 {{ $errors->has('city_id') ? ' has-danger' : '' }}">
                    <label class="control-label">المدينة<span style="color: red">*</span></label>
                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="city_id">
                        <option value="">اختر</option>
                        @if(!empty($Cities))
                        @foreach($Cities as $get)
                        <option value="{{$get->id}}" @if(!empty($Invoicefirst->city_id))@if($get->id == $Invoicefirst->city_id)selected @endif @else @if($get->id == Auth::user()->city_id)selected @endif @endif>{{$get->city_name}}</option>
                        @endforeach
                        @endif
                    </select>
                    @if ($errors->has('city_id'))
                    <small class="form-control-feedback">{{ $errors->first('city_id') }}
                    </small>
                    @endif
                </div>

                <div class="form-group col-md-6 {{ $errors->has('area_id') ? ' has-danger' : '' }}">
                    <label class="control-label">المنطقة<span style="color: red">*</span></label>
                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="area_id">
                        <option value="">اختر</option>
                        @if(!empty($Area))
                        @foreach($Area as $get)
                        <option value="{{$get->id}}" @if(!empty($Invoicefirst->area_id))@if($get->id == $Invoicefirst->area_id)selected @endif @else @if($get->id == Auth::user()->area_id)selected @endif @endif>{{$get->area_name}}</option>
                        @endforeach
                        @endif
                    </select>
                    @if ($errors->has('area_id'))
                    <small class="form-control-feedback">{{ $errors->first('area_id') }}
                    </small>
                    @endif
                </div>
                <div class="form-group col-md-12 {{ $errors->has('user_address') ? ' has-danger' : '' }}">
                    <label>العنوان<span style="color: red">*</span></label>
                    <textarea class="form-control" rows="4"
                        name="user_address" >@if(!empty($Invoicefirst->user_address)){{$Invoicefirst->user_address}} @else {{Auth::user()->user_address}} @endif </textarea>
                    @if ($errors->has('user_address'))
                    <small class="form-control-feedback">{{ $errors->first('user_address') }}
                    </small>
                    @endif
                </div>
                <hr>
                <h3 class="maintitle sm">تأكيد عملية التحويل:</h3>

                <div class="form-group col-md-12"><label>برجاء رفع صورة لإيصال تأكيد عملية التحويل</label><input
                        type="file" name="image_receipt" class="form-control" required></div>
                         @if(!empty($Invoicefirst->image_receipt))
                         <div class="gift__img col-12">
                        <img src="@if(!empty($Invoicefirst->image_receipt)){{url($Invoicefirst->image_receipt)}}@endif" style="max-width: 25%;">
                        </div>       
                         @endif
                <hr><button class="btn btn-dark btn-lg float-right mx-auto" role="button" type="submit">إرسال
                    الفاتورة مع التأكيد</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</section>
@section('js')
<script type="text/javascript">
    $("select[name='country_id']").change(function () {
        var country_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-city') ?>",
            method: 'POST',
            data: {
                country_id: country_id,
                _token: token
            },
            success: function (data) {
                $("select[name='city_id'").html('');
                $("select[name='city_id'").html(data.options);
            }
        });
    });

</script>
<script type="text/javascript">
    $("select[name='city_id']").change(function () {
        var city_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-area') ?>",
            method: 'POST',
            data: {
                city_id: city_id,
                _token: token
            },
            success: function (data) {
                $("select[name='area_id'").html('');
                $("select[name='area_id'").html(data.options);
            }
        });
    });

</script>
@endsection
@endsection
