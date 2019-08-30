@extends('frontend.layouts.layout')
@section('title')
حسابى
@endsection
@section('content')
<div class="page-title">
    <div class="container">
        <h1><strong>الملف الشخصي</strong></h1>
    </div>
</div>
<section class="shopping-pattern">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="card mb-4 widget">
                    <div class="card-body p-2">
                        <h4 class="card-title"><strong>لوحة العميل</strong></h4>
                        <ul class="list-group">
                            <li class="list-group-item {{ Request::is('/My-profile') ? 'active' : '' }}"><a
                                    href="{{url('/My-profile')}}"><strong>تعديل الملف الشخصي</strong></a></li>
                            <li class="list-group-item {{ Request::is('/My-favourites') ? 'active' : '' }}"><a
                                    href="{{url('/My-favourites')}}"><strong>مفضلتي</strong></a></li>
                            <li class="list-group-item {{ Request::is('/My-orders') ? 'active' : '' }}"><a
                                    href="{{url('/My-orders')}}"><strong>طلباتي</strong></a></li>
                            <li class="list-group-item {{ Request::is('/My-invoices') ? 'active' : '' }}"><a
                                    href="{{url('/My-invoices')}}"><strong>فواتيري</strong></a></li>
                            <li class="list-group-item {{ Request::is('/My-Tickets') ? 'active' : '' }}"><a
                                    href="{{url('/My-Tickets')}}"><strong>الدعم الفني</strong></a></li>
                            <!-- <li class="list-group-item"><a href="#"><strong>تنبيهات</strong></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                <div class="block-content">

                    <form action="{{url('/My-profile')}}" method="post" enctype="multipart/form-data" class="form-row">
                        {{csrf_field()}}
                        <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>إسم العميل<span style="color: red">*</span></label>
                            <input class="form-control" name="name" @if(!empty(Auth::user()->name))
                            value="{{Auth::user()->name}}"@endif type="text">
                            @if ($errors->has('name'))
                            <small class="form-control-feedback">{{ $errors->first('name') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-md-6 {{ $errors->has('user_phone') ? ' has-danger' : '' }}">
                            <label>رقم الموبايل<span style="color: red">*</span></label>
                            <input class="form-control" name="user_phone" @if(!empty(Auth::user()->user_phone))
                            value="{{Auth::user()->user_phone}}"@endif type="number">
                            @if ($errors->has('user_phone'))
                            <small class="form-control-feedback">{{ $errors->first('user_phone') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>البريد الإلكتروني<span style="color: red">*</span></label>
                            <input class="form-control" name="email" @if(!empty(Auth::user()->email))
                            value="{{Auth::user()->email}}"@endif type="email">
                            @if ($errors->has('email'))
                            <small class="form-control-feedback">{{ $errors->first('email') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label>كلمة المرور<span style="color: red">*</span></label>
                            <input class="form-control" name="password" type="password">
                        </div>
                        <div class="form-group col-md-6">
                            <label>تأكيد كلمة المرور<span style="color: red">*</span></label>
                            <input class="form-control" name="password_confirmation" type="password">
                        </div>
                        <div class="form-group col-md-12">
                        </div>
                        <div class="form-group col-md-6 {{ $errors->has('country_id') ? ' has-danger' : '' }}">
                            <label class="control-label">الدولة<span style="color: red">*</span></label>
                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                                name="country_id">
                                <option value="">اختر</option>
                                @if(!empty($Country))
                                @foreach($Country as $getcat)
                                <option value="{{$getcat->id}}" @if($getcat->id == Auth::user()->country_id)selected
                                    @endif>{{$getcat->country_name}}</option>
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
                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                                name="city_id">
                                <option value="">اختر</option>
                                @if(!empty($Cities))
                                @foreach($Cities as $get)
                                <option value="{{$get->id}}" @if($get->id == Auth::user()->city_id)selected
                                    @endif>{{$get->city_name}}</option>
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
                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                                name="area_id">
                                <option value="">اختر</option>
                                @if(!empty($Area))
                                @foreach($Area as $get)
                                <option value="{{$get->id}}" @if($get->id == Auth::user()->area_id)selected
                                    @endif>{{$get->area_name}}</option>
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
                                name="user_address">@if(!empty(Auth::user()->user_address)){{Auth::user()->user_address}}@endif</textarea>
                            @if ($errors->has('user_address'))
                            <small class="form-control-feedback">{{ $errors->first('user_address') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('payment_methoud') ? ' has-danger' : '' }}">
                            <label>نظام الدفع
                                المفضل<span style="color: red">*</span></label>
                            <div class="form-check"><input class="form-check-input" type="radio" name="payment_methoud"
                                    value="1" @if(Auth::user()->payment_methoud == 1)checked @endif
                                id="formCheck-1"><label class="form-check-label" for="formCheck-1">الدفع عند
                                    الإستلام</label></div>
                            <div class="form-check"><input class="form-check-input" type="radio" name="payment_methoud"
                                    value="2" @if(Auth::user()->payment_methoud == 2)checked @endif
                                id="formCheck-1"><label class="form-check-label" for="formCheck-1">تحويل بنكي</label>
                            </div>
                            @if ($errors->has('payment_methoud'))
                            <small class="form-control-feedback">{{ $errors->first('payment_methoud') }}
                            </small>
                            @endif
                        </div>

                        <div class="form-group col-md-12 {{ $errors->has('user_photo') ? ' has-danger' : '' }}">
                            <label>صورة العميل<span style="color: red">*</span></label>
                            <input type="file" name="user_photo" class="form-control">
                            @if(!empty(Auth::user()->user_photo))
                            <img src="{{url(Auth::user()->user_photo)}}" style="max-width: 31%" />
                            @endif
                            @if ($errors->has('user_photo'))
                            <small class="form-control-feedback">{{ $errors->first('user_photo') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group col-md-12"><button class="btn btn-outline-secondary btn-block"
                                type="submit">تحديث الملف
                                الشخصي</button></div>
                    </form>
                </div>
            </div>
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
