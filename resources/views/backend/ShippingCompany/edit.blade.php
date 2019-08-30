@extends('backend.layouts.layout')
@section('title')
تعديل بيانات الشركة
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
                                    href="{{url('/admin/SiteShippingCompany')}}">شركات الشحن</a></li>
                            <li class="breadcrumb-item active">تعديل بيانات الشركة </li>
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
                        <h4 class="m-b-0">تعديل بيانات الشركة</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin/EditShippingCompany/'.$shipping->id)}}" method="post"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-body">

                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('ship_name') ? ' has-danger' : '' }}">
                                            <label class="control-label">اسم شركة الشخن<span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="ship_name" class="form-control"
                                                placeholder="اسم شركة الشخن" @if(!empty($shipping->ship_name))
                                            value="{{$shipping->ship_name}}" @endif>
                                            @if ($errors->has('ship_name'))
                                            <small class="form-control-feedback">{{ $errors->first('ship_name') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('ship_address') ? ' has-danger' : '' }}">
                                            <label class="control-label">عنوان شركة الشحن<span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="ship_address" class="form-control"
                                                placeholder="عنوان شركة الشحن" @if(!empty($shipping->ship_address))
                                            value="{{$shipping->ship_address}}" @endif>
                                            @if ($errors->has('ship_address'))
                                            <small class="form-control-feedback">{{ $errors->first('ship_address') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div
                                            class="form-group {{ $errors->has('ship_admin_name') ? ' has-danger' : '' }}">
                                            <label class="control-label">المسئول عن الشركة<span
                                                    style="color: red">*</span></label>
                                            <input type="text" id="firstName" name="ship_admin_name"
                                                class="form-control" placeholder="المسئول عن الشركة"
                                                @if(!empty($shipping->ship_admin_name))
                                            value="{{$shipping->ship_admin_name}}" @endif>
                                            @if ($errors->has('ship_admin_name'))
                                            <small class="form-control-feedback">{{ $errors->first('ship_admin_name') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group {{ $errors->has('ship_area_id') ? ' has-danger' : '' }}">
                                            <label class="control-label">المناطق التى تخدمها الشركة
                                                <span style="color: red">*</span>
                                            </label>
                                            <select class="select2 m-b-10 select2-multiple" multiple="multiple"
                                                name="ship_area_id[]" style="width: 100%" data-placeholder="Choose">
                                                <option value="">-- Please select --</option>
                                                @if(!empty($Areas))
                                                @foreach($Areas as $get)
                                                <option value="{{$get->id}}" @if(!empty($AreasShip))@foreach($AreasShip
                                                    as $gr) @if($gr->ship_area_id == $get->id)selected @endif
                                                    @endforeach @endif>{{$get->area_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('ship_area_id'))
                                            <small class="form-control-feedback">{{ $errors->first('ship_area_id') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group {{ $errors->has('ship_phone') ? ' has-danger' : '' }}">
                                        <label class="control-label">رقم الهاتف <span
                                                style="color: red">*</span></label>
                                        <input type="number" class="form-control" placeholder="رقم الهاتف"
                                            name="ship_phone[]" @if(!empty($phone)) value="{{$phone->ship_phone}}" @endif/><a
                                            class="btn btn-danger waves-effect waves-light addhome1 text-white"
                                            style="margin-left: -50px; margin-right: 7px;">
                                            <i class="fa fa-plus"></i>
                                        </a>

                                    </div>
                                </div>
                                @if ($errors->has('ship_phone'))
                                <small class="form-control-feedback">{{ $errors->first('ship_phone') }}
                                </small>
                                @endif

                                @if(!empty($phoneall))
                                @foreach($phoneall as $phone)
                                <div class="row clearfix">
                                    <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-md-6 ">
                                                        <div
                                                            class="form-group {{ $errors->has('ship_phone') ? ' has-danger' : '' }}">
                                                            <label class="control-label">رقم الهاتف <span
                                                                    style="color: red">*</span></label>
                                                            <input type="number" class="form-control"
                                                                placeholder="رقم الهاتف" name="ship_phone[]" value="{{$phone->ship_phone}}"/>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <a href="{{url('/admin/DeletePhoneShip')}}/{{$phone->id}}"
                                                            onclick="return confirm('هل متاكد من الحذف')"
                                                            style="margin-top: 29px;"
                                                            class="btn btn-danger btn-flat btn-icon-only remove_field">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <div class="spcification_one "></div>


                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('ship_image') ? ' has-danger' : '' }}">
                                            <label class="control-label">صورة الشركة <span
                                                    style="color: red">*</span></label>
                                            <input type="file" id="firstName" name="ship_image" class="dropify" @if(!empty($shipping->ship_image)) data-default-file="{{ url($shipping->ship_image) }}" @endif>
                                            @if ($errors->has('ship_image'))
                                            <small class="form-control-feedback">{{ $errors->first('ship_image') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                            <i class="fa fa-check"></i>
                                            <span>حفظ</span>
                                        </button>
                                        <a href="{{url('/')}}/admin/SiteShippingCompany"
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
<script>
    $(window).on("load", function () {
        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".spcification_one"); //Fields wrapper
        var add_button = $(".addhome1"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment


                $(wrapper).append(
                    '<div class="row clearfix">' +
                    '<div class="col-md-12 col-md-12 col-sm-12 col-xs-12">' +
                    '<div class="card">' +
                    '<div class="body">' +
                    '<div class="row clearfix">' +
                    ' <div class="form-group col-md-6">' +
                    ' <label class="font-bold">رقم الهاتف <span style="color: red">*</span></label>' +
                    '<input type="number" class="form-control"  placeholder="رقم الهاتف"  name="ship_phone[]"/>' +
                    ' </div>' +
                    '<div class="col-sm-1">' +
                    '<button style="margin-top: 29px;" class="btn btn-danger btn-flat btn-icon-only remove_field">  <i class="fa fa-trash-o"></i> </button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                ); //add input box
            }
        });
        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            var remo = $(this).parent().parent().parent().parent().parent().parent().hide('slow')
                .remove();
            x--;
        })
    });

</script>
<script>
    jQuery(document).ready(function () {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();

    });

</script>
@endsection
@endsection
