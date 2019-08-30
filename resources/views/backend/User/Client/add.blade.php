@extends('backend.layouts.layout')
@section('title')
أضافة مستخدم جديد
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
                            <li class="breadcrumb-item active">أضافة مستخدم جديد </li>
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
                        <h4 class="m-b-0">أضافة مستخدم جديد</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin/AddNewClient')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                            {{csrf_field()}}
                            <div class="form-body"> 
 
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="control-label">الاسم الاول <span style="color: red">*</span></label>
                                            <input type="text"  name="name" value="{{ old('name') }}" class="form-control"
                                                placeholder="الاسم الاول">
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
                                            <input type="text"  name="user_secondname" value="{{ old('user_secondname') }}"
                                                class="form-control" placeholder="الاسم الاخير">
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
                                                placeholder="البريد الإلكترونى" autocomplete="false">
                                            @if ($errors->has('email'))
                                            <small class="form-control-feedback">{{ $errors->first('email') }} </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('user_phone') ? ' has-danger' : '' }}">
                                            <label class="control-label">رقم الهاتف <span
                                                    style="color: red">*</span></label>
                                            <input type="number"  name="user_phone" value="{{ old('user_phone') }}" class="form-control"
                                                placeholder="رقم الهاتف">
                                            @if ($errors->has('user_phone'))
                                            <small class="form-control-feedback">{{ $errors->first('user_phone') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('country_id') ? ' has-danger' : '' }}">
                                            <label class="control-label">البلد <span style="color: red">*</span></label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="country_id" >
                                                <option value="">اختر</option>
                                                @if(!empty($Country))
                                                @foreach($Country as $getcat)
                                                <option value="{{$getcat->id}}">{{$getcat->country_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('country_id'))
                                            <small class="form-control-feedback">{{ $errors->first('country_id') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('city_id') ? ' has-danger' : '' }}">
                                            <label class="control-label">المدينة <span style="color: red">*</span></label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="city_id" >
                                                <option value="">اختر</option>
                                            </select>
                                            @if ($errors->has('city_id'))
                                            <small class="form-control-feedback">{{ $errors->first('city_id') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('area_id') ? ' has-danger' : '' }}">
                                            <label class="control-label">المنطقة <span style="color: red">*</span></label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="area_id">
                                                <option value="">اختر</option>
                                            </select>
                                            @if ($errors->has('area_id'))
                                            <small class="form-control-feedback">{{ $errors->first('area_id') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">العنوان</label>
                                            <input type="text"  name="user_address" class="form-control"
                                                placeholder="العنوان" autocomplete="false">
                                        </div>
                                    </div>
                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('clienttyp_id') ? ' has-danger' : '' }}">
                                            <label class="control-label">نوع العميل <span style="color: red">*</span></label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="clienttyp_id">
                                                <option value="">اختر</option>
                                                @if(!empty($Type))
                                                @foreach($Type as $get)
                                                <option value="{{$get->id}}">{{$get->clienttyp_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('clienttyp_id'))
                                            <small class="form-control-feedback">{{ $errors->first('clienttyp_id') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">توقيت الغاء الطلب</label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="time_close" >
                                                <option value="">اختر</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">توقيت الأحتفاظ بالسلة</label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="time_cart" >
                                                <option value="">اختر</option>
                                            </select>
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
                                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                            <label class="control-label">تاكيد كلمة المرور <span
                                                    style="color: red">*</span></label>
                                            <input type="password"  name="password_confirmation"
                                                class="form-control" placeholder="تاكيد كلمة المرور">
                                            @if ($errors->has('password_confirmation'))
                                            <small
                                                class="form-control-feedback">{{ $errors->first('password_confirmation') }}
                                            </small>
                                            @endif
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
                                                <option value="1">كاش</option>
                                                <option value="2">حواله</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">السوشيال id </label>
                                            <input type="text"  name="user_social_id" class="form-control"
                                                placeholder="السوشيال id">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">صورة المستخدم</label>
                                        <input type="file"  name="user_photo" class="dropify">
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
