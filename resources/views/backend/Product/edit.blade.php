@extends('backend.layouts.layout')
@section('title')
تعديل بيانات المنتج
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
                                    href="{{url('/admin/SiteProduct')}}">المنتجات</a></li>
                            <li class="breadcrumb-item active">تعديل بيانات المنتج </li>
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
                        <h4 class="card-title mb-0">تعديل بيانات المنتج</h4>

                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home"
                                    role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                        class="hidden-xs-down">بيانات المنتج الأساسية</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#colors" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-edit"></i></span> <span
                                        class="hidden-xs-down">المقاسات و الألوان</span></a> </li>
                            <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#images"
                                            role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span
                                                class="hidden-xs-down">صور المنتج</span></a> </li> -->
                        </ul>
                        <!-- Tab panes -->
                        <form action="{{url('/admin/EditProduct/'.$product->id)}}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                                <label class="control-label">القسم الرئيسى<span
                                                        style="color: red">*</span></label>
                                                <select class="select2 form-control custom-select"
                                                    style="width: 100%; height:36px;" name="category_id">
                                                    <option value="">اختر</option>
                                                    @if(!empty($Category))
                                                    @foreach($Category as $getcat)
                                                    <option value="{{$getcat->id}}" @if($product->category_id ==
                                                        $getcat->id)selected @endif>{{$getcat->cat_name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('category_id'))
                                                <small class="form-control-feedback">{{ $errors->first('category_id') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('product_name') ? ' has-danger' : '' }}">
                                                <label class="control-label">اسم المنتج<span
                                                        style="color: red">*</span></label>
                                                <input type="text" name="product_name"
                                                    value="{{$product->product_name}}" class="form-control"
                                                    placeholder="اسم المنتج">
                                                @if ($errors->has('product_name'))
                                                <small
                                                    class="form-control-feedback">{{ $errors->first('product_name') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('product_Purch_price') ? ' has-danger' : '' }}">
                                                <label class="control-label">سعر الشراء <span
                                                        style="color: red">*</span></label>
                                                <input type="number" name="product_Purch_price"
                                                    value="{{$product->product_Purch_price}}" class="form-control"
                                                    placeholder="سعر الشراء">
                                                @if ($errors->has('product_Purch_price'))
                                                <small
                                                    class="form-control-feedback">{{ $errors->first('product_Purch_price') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('price_type_value') ? ' has-danger' : '' }}">
                                                <label class="control-label">جمله الجملة<span
                                                        style="color: red">*</span></label>
                                                <input type="number" name="price_type_value"
                                                    @if(!empty($product->price_type_value))
                                                value="{{$product->price_type_value}}" @endif class="form-control"
                                                placeholder="سعر الشراء">
                                                @if ($errors->has('price_type_value'))
                                                <small
                                                    class="form-control-feedback">{{ $errors->first('price_type_value') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-6 {{ $errors->has('product_main_image') ? ' has-danger' : '' }}">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p>صورة رئيسية <span style="color: red">*</span></p>
                                                    <input type="file" id="input-file-now" name="product_main_image"
                                                        class="dropify" @if(!empty($product->product_main_image))
                                                    data-default-file="{{ url($product->product_main_image) }}" @endif/>
                                                    @if ($errors->has('product_main_image'))
                                                    <small
                                                        class="form-control-feedback">{{ $errors->first('product_main_image') }}
                                                    </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('product_desc') ? ' has-danger' : '' }}">
                                                <label class="control-label">وصف المنتج <span
                                                        style="color: red">*</span></label>
                                                <textarea class="form-control" rows="5" name="product_desc"
                                                    maxlength="100">{{$product->product_desc}}</textarea>
                                                @if ($errors->has('product_desc'))
                                                <small
                                                    class="form-control-feedback">{{ $errors->first('product_desc') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="colors" role="tabpanel">
                                    <div id="colorsWrapper">

                                        <div class="size-type">

                                            <label class="container_radio">
                                                <input type="radio" name="size_value_open"
                                                    @if(!empty($productsizefirst->size_value_open))
                                                @if($productsizefirst->size_value_open == 's') checked @endif @endif
                                                value="s"> مقاسات بالاحرف
                                                <span class="checkmark"></span>

                                            </label>
                                            <label class="container_radio">
                                                <input type="radio" name="size_value_open"
                                                    @if(!empty($productsizefirst->size_value_open))
                                                @if($productsizefirst->size_value_open == 'n') checked @endif @endif
                                                value="n"> مقاسات بالأرقام
                                                <span class="checkmark"></span>

                                            </label>

                                        </div>

                                        @if(!empty($productdetails))
                                        @foreach($productdetails as $product)
                                        <div class="form-group newcolor"  id="firstColor">
                                            <div class="form-row">
                                                <div class="form-group col-md-11">
                                                    <label class="col-md-1 control-label">اللون</label>
                                                    <select class=" form-control custom-select"
                                                        style="width: 100%; height:36px;" value="{{ old('colors[]') }}"
                                                        name="colors[]">
                                                        <option value="">اختر</option>
                                                        @if(!empty($ColorSetting))
                                                        @foreach($ColorSetting as $get)
                                                        <option value="{{$get->id}}" @if(!empty($product->colors))
                                                            @if($product->colors == $get->id) selected @endif
                                                            @endif>{{$get->color_name}}
                                                        </option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="d-block text-light">.</label>
                                                    <button class="btn btn-primary" id="addColors" type="button"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-1 control-label">الأشكال</label>
                                                        <select class="select2 form-control custom-select"
                                                            style="width: 100%; height:36px;" name="style_id">
                                                            <option value="">اختر</option>
                                                            @if(!empty($Style))
                                                            @foreach($Style as $get)
                                                            <option value="{{$get->id}}" @if(!empty($product->style_id))
                                                                @if($product->style_id == $get->id) selected @endif
                                                                @endif>{{$get->settingstyle_desc}}
                                                            </option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="sizes">
                                                    @if($productsizefirst->size_value_open == 's')
                                                    <div class="row" id="s">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">المقاسات</label>
                                                                <select class=" form-control custom-select"
                                                                    style="width: 100%; height:36px;"
                                                                    name="size_value_id_s">
                                                                    <option value="">اختر</option>
                                                                    @if(!empty($SizeCode))
                                                                    @foreach($SizeCode as $get)
                                                                    <option value="{{$get->id}}" @if(!empty($product->
                                                                        size_value_id)) @if($product->size_value_id ==
                                                                        $get->id) selected @endif
                                                                        @endif>{{$get->size_value}}</option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">العدد</label>
                                                                <input type="number" name="size_number_s"
                                                                    @if(!empty($product->size_number))
                                                                value="{{$product->size_number}}" @endif
                                                                class="form-control" placeholder="العدد">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="row" id="n">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">المقاسات</label>
                                                                <select class=" form-control custom-select"
                                                                    style="width: 100%; height:36px;"
                                                                    name="size_value_id_n"
                                                                    value="{{ old('size_value_id_n') }}">
                                                                    <option value="">اختر</option>
                                                                    @if(!empty($SizeNubmer))
                                                                    @foreach($SizeNubmer as $get)
                                                                    <option value="{{$get->id}}" @if(!empty($product->
                                                                        size_value_id)) @if($product->size_value_id ==
                                                                        $get->id) selected @endif @endif>
                                                                        {{$get->size_value}}
                                                                    </option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">العدد</label>
                                                                <input type="number" name="size_number_n"
                                                                    @if(!empty($product->size_number))
                                                                value="{{$product->size_number}}" @endif
                                                                class="form-control" placeholder="العدد">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                        </div>
                                                        <div class="col-sm-2 nopadding">
                                                            <div class="form-group">
                                                            <label class="control-label">عدد اول المده</label>
                                                                <input type="text" class="form-control" @if(!empty($product->size_number_stor)) value="{{$product->size_number_stor}}" @else value="{{$product->size_number}}" @endif placeholder="عدد اول المده" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 nopadding">
                                                            <div class="form-group">
                                                            <label class="control-label">العدد المسحوب</label>
                                                                <input type="text" class="form-control" @if(!empty($product->Drawn_stor)) value="{{$product->Drawn_stor}}" @else value="0" @endif  placeholder="العدد المسحوب" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 nopadding">
                                                            <div class="form-group">
                                                            <label class="control-label">العدد المتاح</label>
                                                                <input type="text" class="form-control" @if(!empty($product->current_stor)) value="{{$product->current_stor}}" @else value="{{$product->size_number}}" @endif  placeholder="العدد المتاح" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row" id="img" @if($productsizefirst->size_value_open ==
                                                        's' || $productsizefirst->size_value_open == 'n')
                                                        style="display: auto;" @else style="display: none;" @endif>
                                                        <div class="form-group">
                                                            <br>
                                                            <a
                                                                class="btn btn-googleplus waves-effect waves-light addpdf">
                                                                <i class="fa fa-plus"></i>
                                                                <i class="fa fa-image"></i>
                                                            </a>
                                                            <br><br>
                                                        </div>
                                                        @if(!empty($productimage))
                                                        @foreach($productimage as $get)
                                                        @if($get->product_sizes_id == $product->sitesize_id)
                                                        <div class="row clearfix">
                                                            <div class="col-md-6">
                                                                <img class="img-responsive"
                                                                    style="width: 300px;height: 150px;"
                                                                    src="{{url($get->images)}}">
                                                                <div class="input-group">
                                                                    <input class="form-control" name="images[]"
                                                                        type="file"
                                                                        onchange="showMyImage(this,$(this).parent().parent().find(\'img\'))"
                                                                        dir="">
                                                                    <span class="input-group-btn">
                                                                        <a href="{{url('/admin/DeleteProductImage')}}/{{$get->id}}"
                                                                            onclick="return confirm('هل متاكد من الحذف')"
                                                                            class="btn btn-danger btn-icon-only delImage"><i
                                                                                class="fa fa-times"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                        <br>
                                                        <div class="clearfix"></div>
                                                        <div class="pdfmore row"></div>
                                                    </div>
                                                    <br>
                                                    <div class="row" id="es" @if($productsizefirst->size_value_open ==
                                                        's' || $productsizefirst->size_value_open == 'n')
                                                        style="display: auto;" @else style="display: none;" @endif>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">سعر القطاعى</label>
                                                                <input type="number" name="Sector_price"
                                                                    @if(!empty($product->Sector_price))
                                                                value="{{$product->Sector_price}}" @endif
                                                                class="form-control" placeholder="سعر القطاعى">
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">الحد الأقصى للطلب</label>
                                                                <input type="number" name="Maximum_one"
                                                                    @if(!empty($product->Maximum_one))
                                                                value="{{$product->Maximum_one}}" @endif
                                                                class="form-control"
                                                                placeholder="الحد الأقصى للطلب">
                                                            </div>
                                                        </div> -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">سعر الجملة</label>
                                                                <input type="number" name="Wholesale_price"
                                                                    @if(!empty($product->Wholesale_price))
                                                                value="{{$product->Wholesale_price}}" @endif
                                                                class="form-control" placeholder="سعر الجملة">
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">الحد الأقصى للطلب</label>
                                                                <input type="number" name="Maximum_two"
                                                                    @if(!empty($product->Maximum_two))
                                                                value="{{$product->Maximum_two}}" @endif
                                                                class="form-control"
                                                                placeholder="الحد الأقصى للطلب">
                                                            </div>
                                                        </div> -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">سعر نصف الجملة</label>
                                                                <input type="number" name="Wholesale_price_two"
                                                                    @if(!empty($product->Wholesale_price_two))
                                                                value="{{$product->Wholesale_price_two}}" @endif
                                                                class="form-control" placeholder="سعر الجملة">
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">الحد الأقصى للطلب</label>
                                                                <input type="number" name="Maximum_three"
                                                                    @if(!empty($product->Maximum_three))
                                                                value="{{$product->Maximum_three}}" @endif
                                                                class="form-control"
                                                                placeholder="الحد الأقصى للطلب">
                                                            </div>
                                                        </div> -->
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">سعر جمله الجملة</label>
                                                            <input type="number" name="Wholesale_price_three[]"
                                                            @if(!empty($product->Wholesale_price_three))
                                                                value="{{$product->Wholesale_price_three}}" @endif
                                                                class="form-control" placeholder="سعر الجملة">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">الحد الأقصى للطلب</label>
                                                            <input type="number" name="Maximum_four[]"
                                                            @if(!empty($product->Maximum_four))
                                                                value="{{$product->Maximum_four}}" @endif
                                                                class="form-control" placeholder="الحد الأقصى للطلب">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">باركود رئيسى</label>
                                                                <input type="number" name="Main_bar_code"
                                                                    @if(!empty($product->Main_bar_code))
                                                                value="{{$product->Main_bar_code}}" @endif
                                                                class="form-control" placeholder="باركود رئيسى">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">باركود ثانى</label>
                                                                <input type="number" name="Main_bar_code_two"
                                                                    @if(!empty($product->Main_bar_code_two))
                                                                value="{{$product->Main_bar_code_two}}" @endif
                                                                class="form-control" placeholder="باركود ثانى">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">المخزن</label>
                                                                <select class=" form-control custom-select"
                                                                    style="width: 100%; height:36px;" name="store_id[]"
                                                                    value="{{ old('store_id[]') }}">
                                                                    <option value="">اختر</option>
                                                                    @if(!empty($store))
                                                                    @foreach($store as $get)
                                                                    <option value="{{$get->id}}" @if(!empty($product->
                                                                        store_id)) @if($product->store_id == $get->id)
                                                                        selected @endif @endif>
                                                                        {{$get->store_name}}
                                                                    </option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- <div class="tab-pane p-20" id="images" role="tabpanel">3</div> -->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                        <i class="fa fa-check"></i>
                                        <span>حفظ</span>
                                    </button>
                                    <a href="{{url('/')}}/admin/SiteProduct"
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
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function () {
        var bt = function () {
            $(".radio-switch").on("switch-change", function () {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function () {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function () {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function () {
                bt()
            }
        }
    }();
    $(document).ready(function () {
        radioswitch.init()
    });

</script>


<script>
    $('#addColors').click(function () { 
        var clone = $('#firstColor').clone().appendTo("div#colorsWrapper");
        $('#colorsWrapper').find('#firstColor.form-group.newcolor:last').find("input,select").val("").end();
        $('#colorsWrapper').find('#firstColor.form-group.newcolor:last').find('button.btn.btn-primary').attr(
            'class',
            'btn btn-danger removeColors').find('i').attr('class', 'fa fa-times');
        $('.sizeCheck').each(function () {
            if (this.checked) {
                $(this).parent().find('input[type="number"]').show();
            } else {
                $(this).parent().find('input[type="number"]').hide();
            }
            var old = 'sizes[' + $(this).parent().parent().parent().parent().find(
                'input[type="color"]').val() + ']';
            $(this).parent().find('input[type="number"]').attr('name', old + '[' + $(this).val() +
                ']')
        })
    });
    $(document).on('click', '.removeColors', function () {
        $(this).parents('.form-group.newcolor').remove();
    });
    $(document).ready(function () {
        var max_fields = 12; //maximum input boxes allowed
        var wrapper = $(".pdfmore"); //Fields wrapper
        var add_button = $(".addpdf"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(this).parents('#img').children('.pdfmore').append(
                    '<div class="row clearfix imgthumb">' +
                    '<div class="col-md-6">' +
                    '<img class="img-responsive" style="width: 300px;height: 150px;" src="http://mtgrapp.com/back/assets/global/img/no-img.png">' +
                    '<div class="input-group">' +
                    '<input class="form-control" name="images[]" type="file" onchange="showMyImage(this,$(this).parent().parent().find(\'img\'))" dir="">' +
                    '<span class="input-group-btn">' +
                    '<button class="btn btn-danger btn-icon-only delImage"><i class="fa fa-times"></i></button>' +
                    '</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                ); //add input box
            }
        });
    });
    $(document).on('click', '.delImage', function () {
        $(this).parents('.imgthumb').remove();
    });

    function showMyImage(fileInput, $image) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            //var img = document.getElementById("thumbnil");
            $image.file = file;
            var fr = new FileReader();
            fr.onload = (function (aImg) {
                return function (e) {
                    $image.attr('src', e.target.result);
                    aImg.src = e.target.result;
                };
            })($image);
            fr.readAsDataURL(file);
        }
    }
    $(document).on('change', 'input[type="color"]', function () {
        $('.sizeCheck').each(function () {
            if (this.checked) {
                $(this).parent().find('input[type="number"]').show();
            } else {
                $(this).parent().find('input[type="number"]').hide();
            }
            var old = 'sizes[' + $(this).parent().parent().parent().parent().parent().find(
                'input[type="color"]').val() + ']';
            $(this).parent().find('input[type="number"]').attr('name', old + '[' + $(this).val() +
                ']')
        })
    });
    $(document).on('change', '.sizeCheck', function () {
        if (this.checked) {
            $(this).parent().find('input[type="number"]').show();
        } else {
            $(this).parent().find('input[type="number"]').val("").hide();
        }
        var old = 'sizes[' + $(this).parent().parent().parent().parent().find('input[type="color"]').val() +
            ']';
        $(this).parent().find('input[type="number"]').attr('name', old + '[' + $(this).val() + ']')
    });
    $(document).ready(function () {
        $('.sizeCheck').each(function () {
            if (this.checked) {
                $(this).parent().find('input[type="number"]').show();
            } else {
                $(this).parent().find('input[type="number"]').hide();
            }
            var old = 'sizes[' + $(this).parent().parent().parent().parent().find(
                'input[type="color"]').val() + ']';
            $(this).parent().find('input[type="number"]').attr('name', old + '[' + $(this).val() +
                ']')
        });
        $("input[type='radio']").change(function () {
            // $("input[type='radio']").not(this).attr('disabled', 'disabled');
            $('#colorsWrapper').find('#firstColor.form-group.newcolor:last').find("input,select").val(null).trigger('change');
            var $value = $(this).val();
            var $selector = $('div.sizes');
            if ($value == 's') {
                $selector.find('#n').hide(3000);
                $selector.find('#s').show(2000);
                $selector.find('#es').show(2000);
                $selector.find('#img').show(2000);
            } else {
                $selector.find('#s').hide(3000);
                $selector.find('#n').show(2000);
                $selector.find('#es').show(2000);
                $selector.find('#img').show(2000);
            }
        });
    })

</script>
@endsection
@endsection
