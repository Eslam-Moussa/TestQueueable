@extends('backend.layouts.layout')
@section('title')
تعديل بيانات المستخدم
@endsection
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="col-md-7">
                    <div class="d-flex">
                        <ol class="breadcrumb m-b-10">
                            <li class="breadcrumb-item"><a style="margin-left: 1px;" href="{{url('/admin')}}">الرئيسية
                                </a></li>
                            <li class="breadcrumb-item"><a style="margin-left: 1px;"
                                    href="{{url('/admin/SiteClient')}}">مستخدمين الموقع</a></li>
                            <li class="breadcrumb-item active">تعديل بيانات المستخدم </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="m-b-0">تعديل بيانات المستخدم</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin/EditClientSite/'.$UserSite->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-body">

                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="control-label">الاسم الاول <span style="color: red">*</span></label>
                                            <input type="text"  name="name" class="form-control"
                                                placeholder="الاسم الاول" @if(!empty($UserSite->name)) value="{{$UserSite->name}}" @endif>
                                            @if ($errors->has('name'))
                                            <small class="form-control-feedback">{{ $errors->first('name') }} </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="form-group {{ $errors->has('user_secondname') ? ' has-danger' : '' }}">
                                            <label class="control-label">الاسم الاخير <span
                                                    style="color: red">*</span></label>
                                            <input type="text"  name="user_secondname"
                                                class="form-control" placeholder="الاسم الاخير" @if(!empty($UserSite->user_secondname)) value="{{$UserSite->user_secondname}}" @endif>
                                            @if ($errors->has('user_secondname'))
                                            <small class="form-control-feedback">{{ $errors->first('user_secondname') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="control-label">البريد الإلكترونى <span
                                                    style="color: red">*</span></label>
                                            <input type="email"  name="email" class="form-control"
                                                placeholder="البريد الإلكترونى" @if(!empty($UserSite->email)) value="{{$UserSite->email}}" @endif>
                                            @if ($errors->has('email'))
                                            <small class="form-control-feedback">{{ $errors->first('email') }} </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('user_phone') ? ' has-danger' : '' }}">
                                            <label class="control-label">رقم الهاتف <span
                                                    style="color: red">*</span></label>
                                            <input type="number"  name="user_phone" class="form-control"
                                                placeholder="رقم الهاتف" @if(!empty($UserSite->user_phone)) value="{{$UserSite->user_phone}}" @endif>
                                            @if ($errors->has('user_phone'))
                                            <small class="form-control-feedback">{{ $errors->first('user_phone') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">البلد <span style="color: red">*</span></label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="country_id">
                                                <option value="">اختر</option>
                                                @if(!empty($Country))
                                                @foreach($Country as $getcat)
                                                <option value="{{$getcat->id}}" @if($getcat->id == $UserSite->country_id)selected @endif>{{$getcat->country_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">المدينة <span style="color: red">*</span></label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="city_id">
                                                <option value="">اختر</option>
                                                @if(!empty($City))
                                                @foreach($City as $get)
                                                <option value="{{$get->id}}" @if($get->id == $UserSite->city_id)selected @endif>{{$get->city_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">المنطقة <span style="color: red">*</span></label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="area_id">
                                                <option value="">اختر</option>
                                                @if(!empty($Area))
                                                @foreach($Area as $get)
                                                <option value="{{$get->id}}" @if($get->id == $UserSite->area_id)selected @endif>{{$get->area_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">العنوان</label>
                                            <input type="text"  name="user_address" class="form-control"
                                                placeholder="العنوان" @if(!empty($UserSite->user_address)) value="{{$UserSite->user_address}}" @endif>
                                        </div>
                                    </div>
                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">نوع العميل <span style="color: red">*</span></label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="clienttyp_id">
                                                <option value="">اختر</option>
                                                @if(!empty($Type))
                                                @foreach($Type as $get)
                                                <option value="{{$get->id}}" @if($get->id == $UserSite->clienttyp_id)selected @endif>{{$get->clienttyp_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">توقيت الغاء الطلب</label>
                                            <select class="form-control"
                                                style="width: 100%; height:36px;" name="time_close">
                                                <option value="">اختر</option>
                                                @if(!empty($Type))
                                                @foreach($Type as $get)
                                                <option value="{{$get->id}}" @if($get->id == $UserSite->time_close)selected @endif>{{$get->clienttyp_close_order}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">توقيت الأحتفاظ بالسلة</label>
                                            <select class="form-control"
                                                style="width: 100%; height:36px;" name="time_cart">
                                                <option value="">اختر</option>
                                                @if(!empty($Type))
                                                @foreach($Type as $get)
                                                <option value="{{$get->id}}" @if($get->id == $UserSite->time_cart)selected @endif>{{$get->clienttyp_cart}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">طريقة الدفع المفضله</label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="payment_methoud">
                                                <option value="">اختر</option>
                                                <option value="1" @if($UserSite->payment_methoud == 1)selected @endif>كاش</option>
                                                <option value="2" @if($UserSite->payment_methoud == 2)selected @endif>حواله</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">السوشيال id </label>
                                            <input type="text"  name="user_social_id" class="form-control"
                                                placeholder="السوشيال id" @if(!empty($UserSite->user_social_id)) value="{{$UserSite->user_social_id}}" @endif>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row p-t-20">
                               <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <label class="control-label">كلمة المرور <span
                                                    style="color: red">*</span></label>
                                            <input type="password"  name="password" class="form-control"
                                                placeholder="كلمة المرور">
                                            @if ($errors->has('password'))
                                            <small class="form-control-feedback">{{ $errors->first('password') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">صورة المستخدم</label>
                                        <input type="file"  name="user_photo" class="dropify" @if(!empty($UserSite->user_photo)) data-default-file="{{ url($UserSite->user_photo) }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                        <i class="fa fa-check"></i>
                                        <span>حفظ</span>
                                    </button>
                                    <a href="{{url('/')}}/admin/SiteClient"
                                        class="btn waves-effect  waves-light btn-outline-danger pull-right">
                                        <i class="fa fa-close"></i>
                                        <span>رجوع</span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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

<script type="text/javascript">
    $("select[name='clienttyp_id']").change(function () {
        var clienttyp_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-time') ?>",
            method: 'POST',
            data: {
                clienttyp_id: clienttyp_id,
                _token: token
            },
            success: function (data) {
                $("select[name='time_close'").html('');
                $("select[name='time_close'").html(data.options);
            }
        });
    });

</script>

<script type="text/javascript">
    $("select[name='clienttyp_id']").change(function () {
        var clienttyp_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-cart') ?>",
            method: 'POST',
            data: {
                clienttyp_id: clienttyp_id,
                _token: token
            },
            success: function (data) {
                $("select[name='time_cart'").html('');
                $("select[name='time_cart'").html(data.options);
            }
        });
    });

</script>
@endsection
@endsection
