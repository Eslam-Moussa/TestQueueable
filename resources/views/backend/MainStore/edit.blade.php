@extends('backend.layouts.layout')
@section('title')
تعديل بيانات المخزن
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
                                    href="{{url('/admin/SiteMainStore')}}">شركات الشحن</a></li>
                            <li class="breadcrumb-item active">تعديل بيانات المخزن </li>
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
                        <h4 class="m-b-0">تعديل بيانات المخزن</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin/EditMainStore/'.$store->id)}}" method="post"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('store_name') ? ' has-danger' : '' }}">
                                         <label class="control-label">اسم المخزن الرئيسى<span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="store_name" class="form-control"
                                                placeholder="اسم المخزن الرئيسى" @if(!empty($store->store_name))
                                            value="{{$store->store_name}}" @endif>
                                            @if ($errors->has('store_name'))
                                            <small class="form-control-feedback">{{ $errors->first('store_name') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('store_address') ? ' has-danger' : '' }}">
                                            <label class="control-label">عنوان المخزن الرئيسى<span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="store_address" class="form-control"
                                                placeholder="عنوان المخزن الرئيسى" @if(!empty($store->store_address))
                                            value="{{$store->store_address}}" @endif>
                                            @if ($errors->has('store_address'))
                                            <small class="form-control-feedback">{{ $errors->first('store_address') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('store_admin_name') ? ' has-danger' : '' }}">
                                            <label class="control-label">المسئول عن المخزن<span
                                                    style="color: red">*</span></label>
                                            <input type="text" id="firstName" name="store_admin_name"
                                                class="form-control" placeholder="المسئول عن المخزن"
                                                @if(!empty($store->store_admin_name))
                                            value="{{$store->store_admin_name}}" @endif>
                                            @if ($errors->has('store_admin_name'))
                                            <small class="form-control-feedback">{{ $errors->first('store_admin_name') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                               
                                <div class="col-md-5">
                                    <div class="form-group {{ $errors->has('store_phone') ? ' has-danger' : '' }}">
                                        <label class="control-label">رقم الهاتف <span
                                                style="color: red">*</span></label>
                                        <input type="number" class="form-control" placeholder="رقم الهاتف"
                                            name="store_phone[]" @if(!empty($phone)) value="{{$phone->stor_phone}}" @endif/><a
                                            class="btn btn-danger waves-effect waves-light addhome1 text-white"
                                            style="margin-left: -50px; margin-right: 7px;">
                                            <i class="fa fa-plus"></i>
                                        </a>

                                    </div>
                                </div>
                                </div>
                                @if ($errors->has('store_phone'))
                                <small class="form-control-feedback">{{ $errors->first('store_phone') }}
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
                                                            class="form-group {{ $errors->has('store_phone') ? ' has-danger' : '' }}">
                                                            <label class="control-label">رقم الهاتف <span
                                                                    style="color: red">*</span></label>
                                                            <input type="number" class="form-control"
                                                                placeholder="رقم الهاتف" name="store_phone[]" value="{{$phone->stor_phone}}"/>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <a href="{{url('/admin/DeletePhoneStore')}}/{{$phone->id}}"
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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                            <i class="fa fa-check"></i>
                                            <span>حفظ</span>
                                        </button>
                                        <a href="{{url('/')}}/admin/SiteMainStore"
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
                    '</div>' +
                    ' <div class="form-group col-md-5">' +
                    ' <label class="font-bold">رقم الهاتف <span style="color: red">*</span></label>' +
                    '<input type="number" class="form-control"  placeholder="رقم الهاتف"  name="store_phone[]"/>' +
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
