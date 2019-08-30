@extends('frontend.layouts.layout')
@section('title')
تسجيل الإشتراك
@endsection
@section('content')
<div class="page-title">
    <div class="container">
        <h1><strong>تسجيل الإشتراك</strong></h1>
    </div>
</div>
<section class="shopping-pattern">
    <div class="container">
        <div class="row d-xl-flex justify-content-xl-center">
            <div class="col-md-6">
                <form action="{{url('/Site-register')}}" method="post" enctype="multipart/form-data" class="contact-form">
                 
                <a href="{{ url('auth/facebook') }}" class="btn btn-primary btn-block mb-5 btn-facebook" type="submit"><i
                            class="fa fa-facebook-official"></i>الإشتراك عبر فيسبوك</a>
                    <h5 class="text-center mt-0 mb-4 p-3 bg-light">إذا كنت لا ترغب بالإشتراك عبر فيسبوك، برجاء قم
                        بإستكمال النموذج أدناه.</h5>
                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label>إسم العميل<span style="color: red">*</span></label>
                    <input class="form-control" name="name" value="{{ old('name') }}" type="text">
                    @if ($errors->has('name'))
                    <small class="form-control-feedback">{{ $errors->first('name') }} </small>
                    @endif
                    </div>
                    <div class="form-group {{ $errors->has('user_phone') ? ' has-danger' : '' }}">
                    <label>رقم الموبايل<span style="color: red">*</span></label>
                    <input class="form-control" name="user_phone" value="{{ old('user_phone') }}" type="number">
                    @if ($errors->has('user_phone'))
                    <small class="form-control-feedback">{{ $errors->first('user_phone') }} </small>
                    @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label>البريد الإلكتروني<span style="color: red">*</span></label>
                    <input class="form-control" name="email" value="{{ old('email') }}" type="email">
                    @if ($errors->has('email'))
                    <small class="form-control-feedback">{{ $errors->first('email') }} </small>
                    @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>كلمة المرور<span style="color: red">*</span></label>
                    <input class="form-control" name="password"  type="password">
                    @if ($errors->has('password'))
                    <small class="form-control-feedback">{{ $errors->first('password') }} </small>
                    @endif
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                    <label>تكرار كلمة المرور<span style="color: red">*</span></label>
                    <input class="form-control" name="password_confirmation" type="password">
                    @if ($errors->has('password_confirmation'))
                    <small class="form-control-feedback">{{ $errors->first('password_confirmation') }} </small>
                    @endif
                    </div>
                    <div class="form-group {{ $errors->has('country_id') ? ' has-danger' : '' }}">
                        <label class="control-label">الدولة<span style="color: red">*</span></label>
                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                            name="country_id">
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
                    <div class="form-group {{ $errors->has('city_id') ? ' has-danger' : '' }}">
                        <label class="control-label">المدينة<span style="color: red">*</span></label>
                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                            name="city_id">
                            <option value="">اختر</option>
                        </select>
                        @if ($errors->has('city_id'))
                        <small class="form-control-feedback">{{ $errors->first('city_id') }}
                        </small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('area_id') ? ' has-danger' : '' }}">
                        <label class="control-label">المنطقة<span style="color: red">*</span></label>
                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                            name="area_id">
                            <option value="">اختر</option>
                        </select>
                        @if ($errors->has('area_id'))
                        <small class="form-control-feedback">{{ $errors->first('area_id') }}
                        </small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('user_address') ? ' has-danger' : '' }}">
                    <label>العنوان<span style="color: red">*</span></label>
                    <textarea class="form-control" rows="4" name="user_address">{{ old('user_address') }}</textarea>
                       @if ($errors->has('user_address'))
                        <small class="form-control-feedback">{{ $errors->first('user_address') }}
                        </small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('payment_methoud') ? ' has-danger' : '' }}"><label>نظام الدفع المفضل</label>
                        <div class="form-check"><input class="form-check-input" type="radio" name="payment_methoud" value="1" id="formCheck-1"><label
                                class="form-check-label" for="formCheck-1">الدفع عند الإستلام</label></div>
                        <div class="form-check"><input class="form-check-input" type="radio" name="payment_methoud" value="2" id="formCheck-1"><label
                                class="form-check-label" for="formCheck-1">تحويل بنكي</label></div>
                        @if ($errors->has('payment_methoud'))
                        <small class="form-control-feedback">{{ $errors->first('payment_methoud') }}
                        </small>
                        @endif      
                    </div>
                    <div class="form-group {{ $errors->has('user_photo') ? ' has-danger' : '' }}">
                    <label>صورة العميل</label>
                    <input type="file" name="user_photo" value="{{ old('user_photo') }}" class="form-control">
                       @if ($errors->has('user_photo'))
                        <small class="form-control-feedback">{{ $errors->first('user_photo') }}
                        </small>
                        @endif
                    </div>
                    <div class="form-group"><button class="btn btn-outline-secondary btn-block"
                            type="submit">إشتراك</button>
                    </div>
                </form>
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
