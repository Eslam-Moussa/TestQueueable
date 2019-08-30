@extends('backend.layouts.layout')
@section('title')
أضافة منتج جديد
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
                            <li class="breadcrumb-item active">أضافة منتج جديد </li>
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
                        <h4 class="card-title mb-0">اضافة منتج جديد</h4>

                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home"
                                    role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                        class="hidden-xs-down">بيانات المنتج الأساسية</span></a> </li>
                            <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#colors" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-edit"></i></span> <span
                                        class="hidden-xs-down">المقاسات و الألوان</span></a> </li> -->
                            <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#images"
                                            role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span
                                                class="hidden-xs-down">صور المنتج</span></a> </li> -->
                        </ul>
                        <!-- Tab panes -->
                        <form action="{{url('/admin/AddNewProduct')}}" id="form-id" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3 {{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                            <div class="form-group">
                                                <label class="control-label">القسم الرئيسى<span
                                                        style="color: red">*</span></label>
                                                <select class="form-control valid" style="width: 100%; height:36px;"
                                                    name="category_id" required>
                                                    <option value="">اختر</option>
                                                    @if(!empty($Category))
                                                    @foreach($Category as $getcat)
                                                    <option value="{{$getcat->id}}" @if(old('category_id')==$getcat->id) selected @endif>{{$getcat->cat_name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('category_id'))
                                                <small class="form-control-feedback">{{ $errors->first('category_id') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                class="form-group {{ $errors->has('product_name') ? ' has-danger' : '' }}">
                                                <label class="control-label">اسم المنتج<span
                                                        style="color: red">*</span></label>
                                                <input type="text" name="product_name" value="{{ old('product_name') }}"
                                                    class="form-control valid" placeholder="اسم المنتج" required>
                                                @if ($errors->has('product_name'))
                                                <small
                                                    class="form-control-feedback">{{ $errors->first('product_name') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div
                                                class="form-group {{ $errors->has('product_Purch_price') ? ' has-danger' : '' }}">
                                                <label class="control-label">سعر الشراء <span
                                                        style="color: red">*</span></label>
                                                <input type="number" name="product_Purch_price"
                                                    value="{{ old('product_Purch_price') }}" class="form-control valid"
                                                    placeholder="سعر الشراء" required>
                                                @if ($errors->has('product_Purch_price'))
                                                <small
                                                    class="form-control-feedback">{{ $errors->first('product_Purch_price') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div
                                                class="form-group {{ $errors->has('price_type_value') ? ' has-danger' : '' }}">
                                                <label class="control-label">جمله الجملة<span
                                                        style="color: red">*</span></label>
                                                <input type="number" name="price_type_value"
                                                    @if(!empty($OrderType->order_type_number))
                                                value="{{$OrderType->order_type_number}}" @endif class="form-control valid"
                                                placeholder="سعر الشراء" required>
                                                @if ($errors->has('price_type_value'))
                                                <small
                                                    class="form-control-feedback">{{ $errors->first('price_type_value') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-3 {{ $errors->has('product_main_image') ? ' has-danger' : '' }}">
                                            <p>صورة رئيسية <span style="color: red">*</span></p>
                                            <input type="file" id="input-file-now" name="product_main_image"
                                                class="dropify valid" data-default-file="{{ old('product_main_image') }}" required/>
                                            @if ($errors->has('product_main_image'))
                                            <small
                                                class="form-control-feedback">{{ $errors->first('product_main_image') }}
                                            </small>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('product_desc') ? ' has-danger' : '' }}">
                                                <label class="control-label">وصف المنتج <span
                                                        style="color: red">*</span></label>
                                                <textarea class="form-control valid" rows="5" name="product_desc"
                                                    maxlength="100" required>{{ old('product_desc') }}</textarea>
                                                @if ($errors->has('product_desc'))
                                                <small
                                                    class="form-control-feedback">{{ $errors->first('product_desc') }}
                                                </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="card-header">
                                    <h4 class="card-title mb-0">تفاصيل المنتج</h4>
                                </div>
                                <br>
                                <div class="row clearfix product_item p-4 bg-secondary mb-4">

                                    <div class="newcolor" id="firstColor">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label>نوع المقاس<span
                                                        style="color: red">*</span></label>
                                                        <select class=" form-control custom-select valid" style="width: 100%; height:36px;" name="size_value_open[]" required>
                                                            <option value="">اختر</option>
                                                            <option value="s" @if(old('size_value_open.0')=='s') selected @endif> بالاحرف
                                                            </option>
                                                            <option value="n" @if(old('size_value_open.1')=='n') selected @endif> بالأرقام
                                                            </option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label>اللون<span style="color: red">*</span></label>
                                                        <select class=" form-control custom-select valid"
                                                            style="width: 100%; height:36px;" name="colors[]" required>
                                                            <option value="">اختر</option>
                                                            @if(!empty($ColorSetting))
                                                            @foreach($ColorSetting as $get)
                                                            <option value="{{$get->id}}" @if(old('colors.0')==$get->id)
                                                                selected @endif>{{$get->color_name}}
                                                            </option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                      </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>الأشكال</label>
                                                            <select class=" form-control custom-select"
                                                                style="width: 100%; height:36px;" name="style_id[]">
                                                                <option value="">اختر</option>
                                                                @if(!empty($Style))
                                                                @foreach($Style as $get)
                                                                <option value="{{$get->id}}"@if(old('style_id.0')==$get->id) selected @endif>{{$get->settingstyle_desc}}
                                                                </option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="sizes">
                                                    <div class="row s" @if(old('size_value_open.0')=='s' ) checked @else style="display: none;" @endif>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">المقاسات<span
                                                                        style="color: red">*</span></label>
                                                                <select class="form-control custom-select valid" style="width: 100%; height:36px;" name="size_value_id[]" required>
                                                                    <option value="">اختر</option>
                                                                    @if(!empty($SizeCode))
                                                                    @foreach($SizeCode as $get)
                                                                    <option value="{{$get->id}}" @if(old('size_value_id.0')==$get->id) selected @endif>{{$get->size_value}}</option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">العدد<span
                                                                        style="color: red">*</span></label>
                                                                <input type="number" name="size_number[]" value="{{ old('size_number.0') }}" class="form-control valid" placeholder="العدد" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row n" @if(old('size_value_open.0')=='n' ) checked @else style="display: none;" @endif>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">المقاسات<span
                                                                        style="color: red">*</span></label>
                                                                <select class="form-control custom-select valid" style="width: 100%; height:36px;" name="size_value_id[]" required>
                                                                    <option value="">اختر</option>
                                                                    @if(!empty($SizeNubmer))
                                                                    @foreach($SizeNubmer as $get)
                                                                    <option value="{{$get->id}}" @if(old('size_value_id.0')==$get->id) selected @endif>{{$get->size_value}}</option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                            </div> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">العدد<span
                                                                        style="color: red">*</span></label>
                                                                <input type="number" name="size_number[]" value="{{ old('size_number.0') }}" class="form-control valid" placeholder="العدد" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <hr>
                                        <br>
                                        <div class="row imagesdiv" id="img">
                                            <div class="form-group">
                                                <a class="btn btn-googleplus waves-effect waves-light addpdf">
                                                    <i class="fa fa-plus"></i>
                                                    <i class="fa fa-image"></i>
                                                </a>
                                                <br><br>
                                            </div>
                                            <div class="clearfix imgthumb"></div>
                                            <div class="pdfmore row"></div>
                                        </div>
                                        <hr>
                                        <br>
                                        <div class="row" id="es">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">سعر جمله الجملة<span
                                                            style="color: red">*</span></label>
                                                    <input type="number" name="Wholesale_price_three[]"
                                                        value="{{ old('Wholesale_price_three.0') }}"
                                                        class="form-control valid" placeholder="سعر الجملة" required>
                                                    <span class="text-danger alert"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">سعر الجملة<span
                                                            style="color: red">*</span></label>
                                                    <input type="number" name="Wholesale_price[]"
                                                        value="{{ old('Wholesale_price.0') }}" class="form-control valid"
                                                        placeholder="سعر الجملة" required>
                                                    <span class="text-danger alert"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">سعر نصف الجملة<span
                                                            style="color: red">*</span></label>
                                                    <input type="number" name="Wholesale_price_two[]"
                                                        value="{{ old('Wholesale_price_two.0') }}" class="form-control valid"
                                                        placeholder="سعر الجملة" required>
                                                    <span class="text-danger alert"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">سعر القطاعى<span
                                                            style="color: red">*</span></label>
                                                    <input type="number" name="Sector_price[]"
                                                        value="{{ old('Sector_price.0') }}" class="form-control valid"
                                                        placeholder="سعر القطاعى" required>
                                                    <span class="text-danger alert"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">الحد الأقصى للطلب<span
                                                            style="color: red">*</span></label>
                                                    <input type="number" name="Maximum_four[]"
                                                        value="{{ old('Maximum_four.0') }}" class="form-control valid"
                                                        placeholder=" الحد الأقصى للطلب" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">باركود رئيسى<span
                                                            style="color: red">*</span></label>
                                                    <input type="text" name="Main_bar_code[]"
                                                        value="{{ old('Main_bar_code.0') }}" class="form-control valid"
                                                        placeholder="باركود رئيسى" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">باركود ثانى</label>
                                                    <input type="text" name="Main_bar_code_two[]"
                                                        value="{{ old('Main_bar_code_two.0') }}" class="form-control"
                                                        placeholder="باركود ثانى">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">المخزن<span
                                                            style="color: red">*</span></label>
                                                    <select class=" form-control custom-select valid"
                                                        style="width: 100%; height:36px;" name="store_id[]" required>
                                                        <option value="">اختر</option>
                                                        @if(!empty($store))
                                                        @foreach($store as $get)
                                                        <option value="{{$get->id}}" @if(old('store_id.0')==$get->
                                                            id) selected
                                                            @endif>{{$get->store_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="font-bold">تفاصيل جديدة</label>
                                    <a class="btn btn-danger waves-effect waves-light addorderss text-white">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="product_one"></div>

                    </div>

                    <!-- <div class="tab-pane p-20" id="images" role="tabpanel">3</div> -->
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="button" onclick="submitthisform()"
                            class="btn waves-effect waves-light btn-outline-success">
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

<script>
function submitthisform(){
    var required = $('.valid').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
            $(this).parents('.form-group').addClass('has-danger');
        }
    });

    if(allRequired == true){
        document.getElementById('form-id').submit();
    }else if(allRequired == false){
        alert('تأكد من ادخال كل البيانات المطلوبة. *');
    }
}

</script>
<script>

    //$(window).on("load", function () {

        x = 1;
        $(".addorderss").click(function (e) { //on add input button click
            var max_fields = 15; //maximum input boxes allowed
            var product_item_count = $(".product_item").length; 
            var wrapper = $(".product_one"); //Fields wrapper
            var add_button = $(".addorderss"); //Add button ID

            var count = wrapper.children().length
            e.preventDefault();
            //e.preventDefault();
            if (product_item_count < max_fields) { //max input box allowed
                x ++;
                $(wrapper).append(
                    '<div class="row clearfix product_item p-4 bg-secondary mb-4">' +
                    '<div class="form-group newcolor" id="firstColor">' +
                    '<div class="row">' +
                    '<div class="col-md-6">' +
                    '<div class="row">' +
                    '<div class="col-md-4">' +
                    '<label>نوع المقاس<span style="color: red">*</span></label>' +
                    '<select class=" form-control custom-select" style="width: 100%; height:36px;"  name="size_value_open[]" required>' +
                    '<option value="">اختر</option>' +
                    '<option value="s" @if(old('
                    size_value_open .0 ') == $get->id) selected @endif> بالاحرف' +
                    '</option>' +
                    '<option value="n" @if(old('
                    size_value_open .0 ') == $get->id) selected @endif> بالأرقام' +
                    '</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<label>اللون<span style="color: red">*</span></label>' +
                    '<select class=" form-control custom-select" style="width: 100%; height:36px;"  name="colors[]" required>' +
                    '<option value="">اختر</option>' +
                    '@if(!empty($ColorSetting))' +
                    '@foreach($ColorSetting as $get)' +
                    '<option value="{{$get->id}}" @if(old('
                    colors .0 ') == $get->id) selected @endif>{{$get->color_name}}' +
                    '</option>' +
                    '@endforeach' +
                    '@endif' +
                    '</select>' +
                    '</div>' +
                    '<br>' +
                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label>الأشكال</label>' +
                    '<select class=" form-control custom-select" style="width: 100%; height:36px;" name="style_id[]">' +
                    '<option value="">اختر</option>' +
                    '@if(!empty($Style))' +
                    '@foreach($Style as $get)' +
                    '<option value="{{$get->id}}" @if(old('
                    style_id .0 ') == $get->id) selected @endif>{{$get->settingstyle_desc}}</option>' +
                    '@endforeach' +
                    '@endif' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<div class="sizes">' +
                    '<div class="row s"  style="display: none;">' +
                    '<div class="col-md-8">' +
                    '<div class="form-group">' +
                    '<label class="control-label">المقاسات<span style="color: red">*</span></label>' +
                    '<select class=" form-control custom-select" style="width: 100%; height:36px;"  name="size_value_id[]">' +
                    '<option value="">اختر</option>' +
                    '@if(!empty($SizeCode))' +
                    '@foreach($SizeCode as $get)' +
                    '<option value="{{$get->id}}" @if(old('
                    size_value_id .0 ') == $get->id) selected @endif>{{$get->size_value}}</option>' +
                    '@endforeach' +
                    '@endif' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label class="control-label">العدد<span style="color: red">*</span></label>' +
                    '<input type="number" name="size_number[]"value="{{ old('
                    size_number .0 ') }}" class="form-control" placeholder="العدد">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row n" style="display: none;">' +
                    '<div class="col-md-8">' +
                    '<div class="form-group">' +
                    '<label class="control-label">المقاسات<span style="color: red">*</span></label>' +
                    '<select class=" form-control custom-select" style="width: 100%; height:36px;" name="size_value_id[]" >' +
                    '<option value="">اختر</option>' +
                    '@if(!empty($SizeNubmer))' +
                    '@foreach($SizeNubmer as $get)' +
                    '<option value="{{$get->id}}" @if(old('
                    size_value_id .1 ') == $get->id) selected @endif>{{$get->size_value}}</option>' +
                    '@endforeach' +
                    '@endif' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label class="control-label">العدد<span style="color: red">*</span></label>' +
                    '<input type="number" name="size_number[]" value="{{ old('
                    size_number .0 ') }}" class="form-control" placeholder="العدد">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<br>' +
                    '</div>' +
                    '<br>' +
                    '<div class="row imagesdiv" id="img">' +
                    '<div class="form-group">' +
                    '<a class="btn btn-googleplus waves-effect waves-light addpdf">' +
                    '<i class="fa fa-plus"></i>' +
                    '<i class="fa fa-image"></i>' +
                    '</a>' +
                    '<br><br>' +
                    '</div>' +
                    '<div class="clearfix imgthumb"></div>' +
                    '<div class="pdfmore row"></div>' +
                    '</div>' +
                    '<hr>' +
                    '<br>' +
                    '<div class="row" id="es" >' +
                    '<div class="col-md-3">' +
                    '<div class="form-group">' +
                    '<label class="control-label">سعر جمله الجملة<span style="color: red">*</span></label>' +
                    '<input type="number" name="Wholesale_price_three[]" value="{{ old('
                    Wholesale_price_three .0 ') }}" class="form-control" placeholder="سعر الجملة">' +
                    '<span class="text-danger alert"></span>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<div class="form-group">' +
                    '<label class="control-label">سعر الجملة<span style="color: red">*</span></label>' +
                    '<input type="number" name="Wholesale_price[]"value="{{ old('
                    Wholesale_price .0 ') }}"class="form-control" placeholder="سعر الجملة">' +
                    '<span class="text-danger alert"></span>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<div class="form-group">' +
                    '<label class="control-label">سعر نصف الجملة<span style="color: red">*</span></label>' +
                    '<input type="number" name="Wholesale_price_two[]" value="{{ old('
                    Wholesale_price_two .0 ') }}" class="form-control" placeholder="سعر الجملة">' +
                    '<span class="text-danger alert"></span>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<div class="form-group">' +
                    '<label class="control-label">سعر القطاعى<span style="color: red">*</span></label>' +
                    '<input type="number" name="Sector_price[]" value="{{ old('
                    Sector_price .0 ') }}" class="form-control" placeholder="سعر القطاعى">' +
                    '<span class="text-danger alert"></span>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<div class="form-group">' +
                    '<label class="control-label">الحد الأقصى للطلب<span style="color: red">*</span></label>' +
                    '<input type="number" name="Maximum_four[]" value="{{ old('
                    Maximum_four .0 ') }}" class="form-control" placeholder="الحد الأقصى للطلب">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<div class="form-group">' +
                    '<label class="control-label">باركود رئيسى<span style="color: red">*</span></label>' +
                    '<input type="text" name="Main_bar_code[]" value="{{ old('
                    Main_bar_code .0 ') }}" class="form-control" placeholder="باركود رئيسى">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<div class="form-group">' +
                    '<label class="control-label">باركود ثانى</label>' +
                    '<input type="text" name="Main_bar_code_two[]" value="{{ old('
                    Main_bar_code_two .0 ') }}" class="form-control" placeholder="باركود ثانى">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<div class="form-group">' +
                    '<label class="control-label">المخزن<span style="color: red">*</span></label>' +
                    '<select class=" form-control custom-select" style="width: 100%; height:36px;" name="store_id[]" required>' +
                    '<option value="">اختر</option>' +
                    '@if(!empty($store))' +
                    '@foreach($store as $get)' +
                    '<option value="{{$get->id}}" @if(old('
                    store_id .0 ') == $get->id) selected @endif>{{$get->store_name}}</option>' +
                    '@endforeach' +
                    '@endif' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-1">' +
                    '<button type="button" style="margin-top: 8px;" class="btn btn-danger btn-flat btn-icon-only remove_field">  <i class="fa fa-trash-o"></i> </button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                ); //add input box
            }
        });
        $(document.body).on("click", ".remove_field", function () { //user click on remove text
            //e.preventDefault();
            $(this).closest('.product_item').remove();
        })
    //});

</script>
<!-- //image -->
<script>
    //$(window).on("load", function () {
    // alert('dsd');

    var z = 1; //initlal text box count
    $(document.body).on('click', '.addpdf', function () {
        var max_fields_two = 7; //maximum input boxes allowed
        var wrapper_two = $(".pdfmore"); //Fields wrapper
        var add_button_two = $(".addpdf"); //Add button ID

        var this_parent = $(this).parents('.row.imagesdiv');
        var imagesinrow = this_parent.find('.imgthumb').length;
        //e.preventDefault();
        if (imagesinrow < max_fields_two) { //max input box allowed
            z++; //text box increment

            this_parent.find('.pdfmore.row').append(
                '<div class="row clearfix imgthumb">' +
                '<div class="col-md-6">' +
                '<img class="img-responsive"  style="width: 300px;height: 150px;" src="{{url("/")}}/website/Placeholder.jpg">' +
                '<div class="input-group">' +
                '<input class="form-control" name="images[]" type="file" onchange="showMyImage(this,$(this).parent().parent().find(\'img\'))" dir="">' +
                '<span class="input-group-btn">' +
                '<button class="btn btn-danger btn-icon-only delImage"><i class="fa fa-times"></i></button>' +
                '</span>' +
                '</div>' +
                '</div>' +
                '</div>'
            ); 
        }
    });
    $(document.body).on("click", ".delImage", function (e) { //user click on remove text
        $(this).parents('.imgthumb').remove();
        z--;
    });
    //});

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

</script>


<script>
    $(document.body).on('change', 'select[name="size_value_open[]"]', function () {
        // alert('ssdsd');
        // $("input[type='radio']").not(this).attr('disabled', 'disabled');
        //$('#colorsWrapper').parents('.product_item').find('#firstColor.form-group.newcolor:last').find("input,select").val(null).trigger('change');
        var product_parent = $(this).parents('.product_item');
        var $value = $(this).val();
        // alert($value);
        var $selector = product_parent.find('div.sizes');
        if ($value == 's') {
            $selector.find(".n").hide(500);
            $selector.find(".n select ,.n input").attr('disabled', true);
            $selector.find(".s select ,.s input").attr('disabled', false);
            $selector.find('.s').show(500);
            $selector.find('#es').show(500);
            $selector.find('#img').show(500);
        } else {
            $selector.find(".s").hide(500);
            $selector.find(".s select , .s input").attr('disabled', true);
            $selector.find(".n select ,.n input").attr('disabled', false);
            $selector.find('.n').show(500);
            $selector.find('#es').show(500);
            $selector.find('#img').show(500);
        }
    });

</script>
<script>
    $(document.body).on('input', 'input[name="Wholesale_price_three[]"]', function () {
        var product_purch_price = parseInt($('input[name="product_Purch_price"]').val());
        var thisvalue = parseInt($(this).val());
        if (product_purch_price > thisvalue) {
            $(this).next('span.alert').show().text('يجب ان يكون اكبر من سعر الشراء =' + product_purch_price);
        }
        if (product_purch_price < thisvalue) {
            $(this).next('span.alert').hide();
        }

    });

</script>
<script>
    $(document.body).on('input', 'input[name="Wholesale_price[]"]', function () {
        var Wholesale_price_three = parseInt($('input[name="Wholesale_price_three[]"]').val());
        var thisvalue = parseInt($(this).val());
        if (Wholesale_price_three > thisvalue) {
            $(this).next('span.alert').show().text('يجب ان يكون اكبر من سعر جمله الجمله.');
        }
        if (Wholesale_price_three < thisvalue) {

            $(this).next('span.alert').hide();
        }

    });

</script>
<script>
    $(document.body).on('input', 'input[name="Wholesale_price_two[]"]', function () {
        var Wholesale_price = parseInt($('input[name="Wholesale_price[]"]').val());
        var thisvalue = parseInt($(this).val());
        if (Wholesale_price > thisvalue) {
            $(this).next('span.alert').show().text('يجب ان يكون اكبر من سعر الجمله.');
        }
        if (Wholesale_price < thisvalue) {

            $(this).next('span.alert').hide();
        }

    });

</script>
<script>
    $(document.body).on('input', 'input[name="Sector_price[]"]', function () {
        var Wholesale_price_two = parseInt($('input[name="Wholesale_price_two[]"]').val());
        var thisvalue = parseInt($(this).val());
        if (Wholesale_price_two > thisvalue) {
            $(this).next('span.alert').show().text('يجب ان يكون اكبر من سعر نصف الجمله.');
        }
        if (Wholesale_price_two < thisvalue) {

            $(this).next('span.alert').hide();
        }

    });

</script>
@endsection
@endsection
