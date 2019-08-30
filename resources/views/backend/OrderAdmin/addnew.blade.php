@extends('backend.layouts.layout')
@section('title')
أضافة طلب جديد
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
                                    href="{{url('/admin/OrderInternal')}}">الطلبات الداخلية</a></li>
                            <li class="breadcrumb-item active">أضافة طلب جديد </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">اضافة طلب جديد</h4>

                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home"
                                    role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                        class="hidden-xs-down">بيانات الطلب الأساسية</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#colors" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-edit"></i></span> <span
                                        class="hidden-xs-down">بيانات المنتجات</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <form action="{{url('/admin/AddOrderInternal')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <br>
                                    <div class="row" id="firstName">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">رقم الطلب<span
                                                        style="color: red">*</span></label>
                                                <input type="text" name="order_number" value="INV-{{$randomString }}"
                                                    class="form-control" placeholder="رقم الطلب" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">تاريخ الطلب<span
                                                        style="color: red">*</span></label>
                                                <input type="date" name="order_date"
                                                    value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">اسم الموظف<span
                                                        style="color: red">*</span></label>
                                                <input type="text" name="order_admin_name"
                                                    @if(!empty(Auth::user()->name))value="{{Auth::user()->name}} {{Auth::user()->user_secondname}}"@endif
                                                class="form-control" placeholder="اسم الموظف" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('order_user_id') ? ' has-danger' : '' }}">
                                                <label class="control-label">اسم العميل<span
                                                        style="color: red">*</span></label>
                                                <select class="select2 form-control custom-select"
                                                    style="width: 100%; height:36px;" name="order_user_id">
                                                    <option value="">اختر</option>
                                                    <option value="0">عميل جديد</option>
                                                    @if(!empty($UserSite))
                                                    @foreach($UserSite as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}
                                                        {{$user->user_secondname}}</option>
                                                    @endforeach
                                                    @endif 
                                                </select>
                                                @if ($errors->has('order_user_id'))
                                                <small class="form-control-feedback">{{ $errors->first('order_user_id') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="n" style="display: none;">
                                            <div class="form-group">
                                                <label class="control-label">اسم العميل<span style="color: red">*</span></label>
                                                <input type="text" name="new_client"
                                                    value="{{ old('new_client') }}" class="form-control"
                                                    placeholder="اسم العميل">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="colors" role="tabpanel">
                                    <div class="row ">
                                        <div class="form-group col-md-6">
                                            <label class="font-bold">تفاصيل المنتج</label>
                                            <a class="btn btn-danger waves-effect waves-light addorder1 text-white">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="order_one"></div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                <i class="fa fa-check"></i>
                                <span>حفظ</span>
                            </button>
                            <a href="{{url('/')}}/admin/OrderInternal"
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
    $(document).ready(function () {
        $("select[name='order_user_id']").change(function () {
            // $("input[type='radio']").not(this).attr('disabled', 'disabled');
            $('#home').find('#firstName.form-group').find("input,select").val(null)
                .trigger('change');
            var $value = $(this).val();
            var $selector = $('div.row');
            if ($value == '0') {
                $selector.find('#n').show(800);
            } else {
                $selector.find('#n').hide(1000);
            }
        });
    })

</script>
<script>
    $(window).on("load", function () {
        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".order_one"); //Fields wrapper
        var add_button = $(".addorder1"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment


                $(wrapper).append(
                    '<div class="row clearfix order_item">' +
                    '<div class="col-md-12 col-md-12 col-sm-12 col-xs-12">' +
                    '<div class="card">' +
                    '<div class="body">' +
                    '<div class="row clearfix">' +
                    '<div class="form-group col-md-4">' +
                    '<label class="control-label">المخزن</label>' +
                    '<select class="form-control custom-select" style="width: 100%; height:36px;" name="stored_id[]">' +
                    '<option value="">اختر</option>' +
                    '@foreach($stores as $stor)' +
                    '<option value="{{$stor->id}}">{{$stor->store_name}}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group col-md-4">' +
                    '<label class="control-label">المنتج</label>' +
                    '<select class="form-control custom-select" style="width: 100%; height:36px;" name="prodect_id[]">' +
                    '<option value="">اختر</option>' +

                    '</select>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label class="control-label">الباركود</label>' +
                    '<input type="text" name="product_parcode[]" class="form-control" placeholder="الباركود">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group col-md-6">' +
                    '<label class="control-label">اللون</label>' +
                    '<select class="form-control custom-select" style="width: 100%; height:36px;" name="color_id[]">' +
                    '<option value="">اختر</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group col-md-6">' +
                    '<label class="control-label">الشكل</label>' +
                    '<select class="form-control custom-select" style="width: 100%; height:36px;" name="style_id[]">' +
                    '<option value="">اختر</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group col-md-6">' +
                    '<label class="control-label">المقاس</label>' +
                    '<select class="form-control custom-select" style="width: 100%; height:36px;" name="size_id[]">' +
                    '<option value="">اختر</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<div class="form-group">' +
                    '<label class="control-label">العدد المتاح</label>' +
                    '<input type="text" name="number_size[]"  class="form-control" placeholder="العدد المتاح" readonly>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<div class="form-group">' +
                    '<label class="control-label">العدد المطلوب</label>' +
                    '<input type="text" name="pro_count[]"   onchange="changenumber();" onpaste="this.onchange();" oninput="this.onchange();"  class="form-control count" placeholder="العدد">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<div class="form-group">' +
                    '<label class="control-label">السعر</label>' +
                    '<input type="text" name="pro_price[]"  oninput="salefunction()" class="form-control price" placeholder="السعر">' +
                    '</div>' +
                    '</div>' +

                    '<div class="col-md-6">' +
                    '<div class="form-group">' +
                    '<label class="control-label">اجمالى السعر</label>' +
                    '<input type="text" name="pro_price_total[]"  class="form-control result" placeholder="اجمالى السعر">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '</div>' +
                    '<div class="col-sm-1">' +
                    '<button style="margin-top: 8px;" class="btn btn-danger btn-flat btn-icon-only remove_field">  <i class="fa fa-trash-o"></i> </button>' +
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
<script type="text/javascript">
    $(document.body).on('change', 'input[name="product_parcode[]"]', function () {
     
        var prodect_parent = $(this).parents('.order_item');
        var product_parcode = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-store-pro') ?>",
            method: 'POST',
            data: {
                product_parcode: product_parcode,
                _token: token
            },
            success: function (data) {
                prodect_parent.find("select[name='stored_id[]']").html('');
                prodect_parent.find("select[name='stored_id[]']").html(data.options);
            }
        });
    });

</script>
<script type="text/javascript">
    $(document.body).on('change', 'select[name="stored_id[]"]', function () {
        var stored_parent = $(this).parents('.order_item');
        var stored_id = $(this).val();
        var token = $("input[name='_token']").val();

        $.ajax({
            url: "<?php echo route('ajax-store') ?>",
            method: 'POST',
            data: {
                stored_id: stored_id,
                _token: token
            },
            success: function (data) {
                stored_parent.find("select[name='prodect_id[]']").html('');
                stored_parent.find("select[name='prodect_id[]']").html(data.options);
            }
        });
    });

</script>

<script type="text/javascript">
    $(document.body).on('change', 'input[name="product_parcode[]"]', function () {
        var stored_parent = $(this).parents('.order_item');
        var product_parcode = $(this).val();
        var token = $("input[name='_token']").val();

        $.ajax({
            url: "<?php echo route('ajax-store-two') ?>",
            method: 'POST',
            data: {
                product_parcode: product_parcode,
                _token: token
            },
            success: function (data) {
                stored_parent.find("select[name='prodect_id[]']").html('');
                stored_parent.find("select[name='prodect_id[]']").html(data.options);
            }
        });
    });

</script>
<script type="text/javascript">
    $(document.body).on('change', 'select[name="prodect_id[]"]', function () {
        var prodect_parent = $(this).parents('.order_item');
        var prodect_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-color') ?>",
            method: 'POST',
            data: {
                prodect_id: prodect_id,
                _token: token
            },
            success: function (data) {
                prodect_parent.find("select[name='color_id[]']").html('');
                prodect_parent.find("select[name='color_id[]']").html(data.options);
            }
        });
    });

</script>
<script type="text/javascript">
    $(document.body).on('change', 'input[name="product_parcode[]"]', function () {
        var prodect_parent = $(this).parents('.order_item');
        var product_parcode = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-color-two') ?>",
            method: 'POST',
            data: {
                product_parcode: product_parcode,
                _token: token
            },
            success: function (data) {
                prodect_parent.find("select[name='color_id[]']").html('');
                prodect_parent.find("select[name='color_id[]']").html(data.options);
            }
        });
    });

</script>
<script type="text/javascript">
    $(document.body).on('change', 'select[name="prodect_id[]"]', function () {
        var style_parent = $(this).parents('.order_item');
        var prodect_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-style') ?>",
            method: 'POST',
            data: {
                prodect_id: prodect_id,
                _token: token
            },
            success: function (data) {
                style_parent.find("select[name='style_id[]']").html('');
                style_parent.find("select[name='style_id[]']").html(data.options);
            }
        });
    });

</script>

<script type="text/javascript">
    $(document.body).on('change', 'input[name="product_parcode[]"]', function () {
        var style_parent = $(this).parents('.order_item');
        var product_parcode = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-style-two') ?>",
            method: 'POST',
            data: {
                product_parcode: product_parcode,
                _token: token
            },
            success: function (data) {
                style_parent.find("select[name='style_id[]']").html('');
                style_parent.find("select[name='style_id[]']").html(data.options);
            }
        });
    });

</script>

<script type="text/javascript">
    $(document.body).on('change', 'select[name="color_id[]"]', function () {
        var color_parent = $(this).parents('.order_item');
        var color_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-size') ?>",
            method: 'POST',
            data: {
                color_id: color_id,
                _token: token
            },
            success: function (data) {
                color_parent.find("select[name='size_id[]']").html('');
                color_parent.find("select[name='size_id[]']").html(data.options);
            }
        });
    });

</script>
<script type="text/javascript">
    $(document.body).on('change', 'input[name="product_parcode[]"]', function () {
        var color_parent = $(this).parents('.order_item');
        var product_parcode = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-size-two') ?>",
            method: 'POST',
            data: {
                product_parcode: product_parcode,
                _token: token
            },
            success: function (data) {
                color_parent.find("select[name='size_id[]']").html('');
                color_parent.find("select[name='size_id[]']").html(data.options);
            }
        });
    });

</script>
<script type="text/javascript">
    $(document.body).on('change', 'select[name="size_id[]"]', function () {
        var size_parent = $(this).parents('.order_item');
        var size_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-number') ?>",
            method: 'POST',
            data: {
                size_id: size_id,
                _token: token
            },
            success: function (data) {
                size_parent.find("input[name='number_size[]']").val('');
                size_parent.find("input[name='number_size[]']").val(data.options);
            }
        });
    });

</script>

<script type="text/javascript">
    $(document.body).on('change', 'input[name="product_parcode[]"]', function () {
        var size_parent = $(this).parents('.order_item');
        var product_parcode = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-number-two') ?>",
            method: 'POST',
            data: {
                product_parcode: product_parcode,
                _token: token
            },
            success: function (data) {
                size_parent.find("input[name='number_size[]']").val('');
                size_parent.find("input[name='number_size[]']").val(data.options);
            }
        });
    });

</script>

<script type="text/javascript">
    $(document.body).on('change', 'select[name="prodect_id[]"]', function () {
        var size_parent = $(this).parents('.order_item');
        var prodect_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-code') ?>",
            method: 'POST',
            data: {
                prodect_id: prodect_id,
                _token: token
            },
            success: function (data) {
                size_parent.find("input[name='product_parcode[]']").val('');
                size_parent.find("input[name='product_parcode[]']").val(data.options);
            }
        });
    });

</script>

<script type="text/javascript">
    $(document.body).on('change', 'input[name="pro_count[]"]', function () {
        var count_parent = $(this).parents('.order_item');
        var pro_count = count_parent.find('.count').val();
        var size_id = count_parent.find('select[name="size_id[]"]').val();
        var prodect_id = count_parent.find('select[name="prodect_id[]"]').val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('ajax-price') ?>",
            method: 'POST',
            data: {
                pro_count: pro_count,
                size_id: size_id,
                prodect_id: prodect_id,
                _token: token
            },
            success: function (data) {
                count_parent.find("input[name='pro_price[]']").val('');
                count_parent.find("input[name='pro_price[]']").val(data.options);
                salefunction(count_parent);
            }
        });
    });

</script>
<script>
    function salefunction(count_parent) {
        var price = count_parent.find(".price").val();
        var save = count_parent.find('.count').val();
        var total = (save * price);
        count_parent.find('.result').val(total);
    }

</script>

@endsection
@endsection
