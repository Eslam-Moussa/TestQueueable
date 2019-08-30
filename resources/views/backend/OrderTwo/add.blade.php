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

                        <!-- Tab panes -->
                        <form action="{{url('/admin/AddOrderInternal/'.$order->id)}}" id="form-id" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row" id="firstName">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">رقم الطلب<span style="color: red">*</span></label>
                                        <input type="text" name="order_number" value="INV-{{$order->order_number}}"
                                            class="form-control" placeholder="رقم الطلب" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">تاريخ الطلب<span
                                                style="color: red">*</span></label>
                                        <input type="date" name="order_date" value="<?php echo date('Y-m-d'); ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">اسم الموظف<span style="color: red">*</span></label>
                                        <input type="text" name="order_admin_name"
                                            @if(!empty(Auth::user()->name))value="{{Auth::user()->name}} {{Auth::user()->user_secondname}}"@endif
                                        class="form-control" placeholder="اسم الموظف" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('order_user_id') ? ' has-danger' : '' }}">
                                        <label class="control-label">اسم العميل<span style="color: red">*</span></label>
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
                                <!-- <div class="col-md-6" >
                                    <div class="form-group">
                                        <label class="control-label">اسم العميل<span style="color: red">*</span></label>
                                        <input type="text" name="new_client" value="{{ old('new_client') }}"
                                            class="form-control" placeholder="اسم العميل">
                                    </div>
                                </div> -->
                                <div class="col-lg-6" id="n" style="display: none; margin-top: 29px;">
                                            <div class="input-group mb-6">
                                               <input type="text" name="new_client" value="{{ old('new_client') }}"
                                                 class="form-control" placeholder="اسم العميل">
                                                <div class="input-group-append">
                                                    <button class="btn btn-info addNewclient" type="button">أضف!</button>
                                                </div>
                                        </div>
                                  </div>
                            </div>
                            <hr style="border-bottom: 1px solid #CCC;">
                            <div class="row order_item">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">الباركود</label>
                                        <input type="text" name="product_parcode[]" class="form-control"
                                            placeholder="الباركود">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">المخزن</label>
                                        <select class="form-control custom-select" style="width: 100%; height:36px;"
                                            name="stored_id[]">
                                            <option value="">اختر</option>
                                            @if(!empty($stores))
                                            @foreach($stores as $stor)
                                            <option value="{{$stor->id}}">{{$stor->store_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">المنتج</label>
                                        <input type="text" class="form-control" placeholder="المنتج" name="prodect_id[]">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">اللون</label>
                                        <select class="form-control custom-select" style="width: 100%; height:36px;"
                                            name="color_id[]">
                                            <option value="">اختر</option>
                                            @if(!empty($ColorSetting))
                                            @foreach($ColorSetting as $color)
                                            <option value="{{$color->id}}">{{$color->color_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <input name="order_id" value="{{$order->id}}" type="hidden" />

                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">بيانات المنتج</h4>
                                    </div>
                                    <div class="table-responsive m-t-30" style="clear: both;">
                                        <table class="table table-hover" id="product_info">
                                            <thead> 
                                                <tr>
                                                    <th>المنتج</th>
                                                    <th>باركود</th>
                                                    <th>المخزن</th>
                                                    <th>اللون / الشكل</th>
                                                    <th>المقاس</th>
                                                    <th>العدد المتاح</th>
                                                    <th>قطاعى</th>
                                                    <th>جمله</th>
                                                    <th>نصف جمله</th>
                                                    <th>جمله الجمله</th>
                                                    <th>العدد المطلوب</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 m-t-30">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">تفاصيل الطلب</h4>
                                    </div>
                                    <div class="table-responsive m-t-30" style="clear: both;">
                                        <table class="table table-hover" id="order_table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>المنتج</th>
                                                    <th>اللون / الشكل</th>
                                                    <th>المقاس</th>
                                                     <th>العدد المتاح</th>
                                                    <th>العدد</th>
                                                    <th>السعر</th>
                                                    <th>الأجمالى</th>
                                                    <th>#</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($OrderDetails))
                                            @foreach($OrderDetails as $Pro) 
                                            <tr id="product_{{$Pro->id}}">
                                            <td></td>
                                            <td class="product_{{$Pro->id}}">{{$Pro->product_name}}</td>
                                            <td class="color_{{$Pro->color_id}}">{{$Pro->color_name}}</td>
                                            <td class="size_{{$Pro->size_id}}">{{$Pro->size_value}}</td>
                                            <td>{{$Pro->number_size}}</td>
                                            <td>{{$Pro->pro_count}}</td>
                                            <td>{{$Pro->pro_price}}</td>
                                            <td>{{$Pro->pro_price_total}}</td>
                                            <td class="text-nowrap">
                                             <!-- <a data-id="{{$Pro->details_id}}" data-pro_count="{{$Pro->pro_count}}"
                                            data-target="#exampleModal" data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse"></i></a> -->
                                            <a href="{{url('/admin/DeleteOrderDetails/'.$Pro->details_id)}}"
                                            onclick="return confirm('هل تريد الحذف ! ')" class="btn btn-outline-danger btn-sm">
                                            <i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" onclick="document.getElementById('form-id').submit();" class="btn waves-effect waves-light btn-outline-success">
                                        <i class="fa fa-check"></i>
                                        <span>حفظ</span>
                                    </button>
                                    <a href="{{url('/admin/DeleteOrderButton/'.$order->id)}}" onclick="return confirm('هل متأكد من الرجوع سوف يتم حذف الطلب !')"
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

<!-- <script>
window.onbeforeunload = PopUpExit;
function PopUpExit() {
    return "You want to leave this page?";
}
</script> -->

<!-- <script language="JavaScript">


  window.onbeforeunload = confirmExit;
  function confirmExit()
  {

    return "You want to leave this page?";
  }
</script> -->

<!-- <script>
// Warning before leaving the page (back button, or outgoinglink)
window.onbeforeunload = function() {
   return "Do you really want to leave our brilliant application?";
   //if we return nothing here (just calling return;) then there will be no pop-up question at all
   //return;
};
</script> -->

<!-- <script>
function PopIt() { return "Are you sure you want to leave?"; }
function UnPopIt()  { /* nothing to return */ }

$(document.body).ready(function() {
       
    window.onbeforeunload = PopIt;
    $("a").click(function(){ window.onbeforeunload = UnPopIt; });
});
</script> -->

<script>
    // $(document.body).on('click', 'a:not(.btn-outline-danger)', function (e)
    // {
    //     e.preventDefault();
    // });
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

<script type="text/javascript">
    $(document.body).on('change', 'select[name="order_user_id"]', function () {
        var user_id = $(this).val();
        var order_id = $('input[name="order_id"]').val();
        var order_date = $('input[name="order_date"]').val();
        var token = $("input[name='_token']").val();

        $.ajax({
            url: "<?php echo route('ajax-adduser') ?>",
            method: 'POST',
            data: {
                user_id: user_id,
                order_id: order_id,
                order_date: order_date,
                _token: token
            },
            success: function (data) {
                user_name = data.options;
                // product_info.html(product_name);
            }
        });
    });

</script>

<script>
$(document.body).on('click', 'button.addNewclient', function(){
    // alert('ssss');
    var user_id = $('input[name="order_user_id"]').val();
    var new_client = $('input[name="new_client"]').val();
    var order_id = $('input[name="order_id"]').val();
    var order_date = $('input[name="order_date"]').val();
    var token = $("input[name='_token']").val();

    $.ajax({
            url: "<?php echo route('ajax-addNewuser') ?>",
            method: 'POST',
            data: {
                user_id: user_id,
                order_id: order_id,
                new_client:new_client,
                order_date: order_date,
                _token: token
            },
            success: function (data) {
                user_name = data.options;
                $('input[name="new_client"]').attr('disabled', true);
                $('button.addNewclient').attr('disabled', true);
            }
        });
});
</script>


<script type="text/javascript">
    $(document.body).on('input', 'input[name="product_parcode[]"]', function () {
        var product_info = $('#product_info tbody');
        var prodect_parent = $(this).parents('.order_item');
        var product_parcode = $(this).val(); 
        var token = $("input[name='_token']").val();

        prodect_parent.find("select[name='stored_id[]']").val('');
        prodect_parent.find("input[name='prodect_id[]']").val('');
        prodect_parent.find("select[name='color_id[]']").val('');
        product_info.empty();
        
        $.ajax({
            url: "<?php echo route('ajax-store-pro') ?>",
            method: 'POST',
            data: {
                product_parcode: product_parcode,
                _token: token
            },
            success: function (data) {
                product_name = data.options;
                product_info.html(product_name);
            }
        });
    });

</script>
<script type="text/javascript">
    $(document.body).on('change', 'select[name="stored_id[]"]', function () {
        var product_info = $('#product_info tbody');
        var stored_parent = $(this).parents('.order_item');
        var stored_id = $(this).val();
        var token = $("input[name='_token']").val();

        stored_parent.find("input[name='product_parcode[]']").val('');
        stored_parent.find("input[name='prodect_id[]']").val('');
        stored_parent.find("select[name='color_id[]']").val('');
        product_info.empty();

        $.ajax({
            url: "<?php echo route('ajax-store') ?>",
            method: 'POST',
            data: {
                stored_id: stored_id,
                _token: token
            },
            success: function (data) {
                product_name = data.options;
                product_info.html(product_name);
            }
        });
    });

</script>



<script type="text/javascript">
    $(document.body).on('input', 'input[name="prodect_id[]"]', function () {
        var product_info = $('#product_info tbody');
        var prodect_parent = $(this).parents('.order_item');
        var prodect_id = $(this).val();
        var token = $("input[name='_token']").val();


        prodect_parent.find("input[name='product_parcode[]']").val('');
        prodect_parent.find("select[name='stored_id[]']").val('');
        prodect_parent.find("select[name='color_id[]']").val('');
        product_info.empty();

        $.ajax({
            url: "<?php echo route('ajax-color') ?>",
            method: 'POST',
            data: {
                prodect_id: prodect_id,
                _token: token
            },
            success: function (data) {
                product_name = data.options;
                product_info.html(product_name);
            }
        }); 
    });

</script>

<script type="text/javascript">
    $(document.body).on('change', 'select[name="color_id[]"]', function () {
        var product_info = $('#product_info tbody');
        var color_parent = $(this).parents('.order_item');
        var color_id = $(this).val();
        var token = $("input[name='_token']").val();

        color_parent.find("input[name='product_parcode[]']").val('');
        color_parent.find("select[name='stored_id[]']").val('');
        color_parent.find("input[name='prodect_id[]']").val('');
        product_info.empty();

        $.ajax({
            url: "<?php echo route('ajax-size') ?>",
            method: 'POST',
            data: {
                color_id: color_id,
                _token: token
            },
            success: function (data) {
                product_name = data.options;
                product_info.html(product_name);
            } 
        });
    });

</script>



<script type="text/javascript">
 function checked($size_id, $product_id, $color_id, $store_id, $token){
    var current_count_in_db = null;
    $.ajax({
            url: "<?php echo route('ajax-checked') ?>",
            method: 'POST',
            data: {
                size_id:$size_id,
                product_id:$product_id,
                color_id:$color_id,
                store_id:$store_id,
                _token: $token
            },
            success: function (data) {
                product_name = data.options;
                alert('After Ajax End: ' + product_name);
                $('<input type="hidden" name="' + $token + '" class="somcode" value="' + product_name +'" />').appendTo(document.body);
                
            }
        });
        
  }
    $(document.body).on('click', 'button.addthisproduct', function(){

        var elem = $(this);
        var product_parent = $(this).parents('tr');
        var order_table = $('#order_table tbody');
        var order_table_tr = $('#order_table tbody tr');
        var token = $("input[name='_token']").val();
 
        var product_id_name = product_parent.attr('id');
        var product_id = product_id_name.replace('product_row_', '');
        var pro_count = parseInt(order_table.find('input[name="pro_count[]"]').val());
        var current_value = parseInt(product_parent.find('td.current_value').html());
        var maximum = product_parent.find('input[name="Maximum_four[]"]').val();
        var product_count = product_parent.find('input[name="single_product_count[]"]').val();
        var product_count_input = product_parent.find('input[name="single_product_count[]"]');
        var order_user = $('select[name="order_user_id"]').val();
        /* SOME FUCK */
        var color_td = product_parent.find('[class^="color_id_"]').attr("class");
        var color_id = color_td.replace('color_id_', '');

        var size_td = product_parent.find('[class^="size_id_"]').attr("class");
        var size_id = size_td.replace('size_id_', '');

        var store_td = product_parent.find('[class^="store_id_"]').attr("class");
        var store_id = store_td.replace('store_id_', '');


        var order_id = $('input[name="order_id"]').val();

        var stored_id_two = product_parent.find('input[name="stored_id_two[]"]').val();

        var prodect_id_two = product_parent.find('input[name="prodect_id_two[]"]').val();

        var product_parcode_two = product_parent.find('input[name="product_parcode_two[]"]').val();

        var color_id_two = product_parent.find('input[name="color_id_two[]"]').val();

        var size_id_two = product_parent.find('input[name="size_id[]"]').val();

        
        var Sector_price_ax = product_parent.find('input[name="Sector_price_ax[]"]').val();

        var Wholesale_price_ax = product_parent.find('input[name="Wholesale_price_ax[]"]').val();

        var Wholesale_price_two_ax = product_parent.find('input[name="Wholesale_price_two_ax[]"]').val();

        var Wholesale_price_three_ax = product_parent.find('input[name="Wholesale_price_three_ax[]"]').val();

        var number_size_two = product_parent.find('input[name="number_size_two[]"]').val();
        // var checked_td = product_parent.find('[class^="checked_"]').attr("class");
        // var checked_id = checked_td.replace('checked_id_', '');
        
        quiz_count = 0;
        order_table_tr.each(function() {
            
            var somename = $(this).attr('id');
            
            var color_table = $(this).find('[class^="color_"]').attr("class");
            var color_id_table = color_table.replace('color_', '');

            var size_table = $(this).find('[class^="size_"]').attr("class");
            var size_id_table = size_table.replace('size_', '');

            var product_table = $(this).find('[class^="product_"]').attr("class");
            var product_id_table = product_table.replace('product_', '');

            if(color_id_table == color_id_two && size_id_table == size_id_two && product_id_table == prodect_id_two){
               quiz_count += parseInt($(this).find('input[name="pro_count[]"]').val());
            }
            
            // alert(quiz_count);
        }); 

        var totalincome = parseInt(quiz_count) + parseInt(product_count);
        /* AJAX REQUEST NEEDED HERE */
        // alert(totalincome);

        //var somecode = checked(size_id, product_id, color_id, store_id, token);
        
        // var refreshId = setInterval( function() 
        // {
        //     var r = parseInt(product_parent.find('td.current_value').html());
        // }, 1000);
        
        // setInterval(function() {
        //     var r = parseInt(product_parent.find('td.current_value').html());
        //     alert(r);
        // }, 1000);
        
        

        if(!order_user){
            alert('يجب أدخال اسم العميل');
        }else if(parseInt(product_count) < 0){
            alert('يجب أدخال قيمه اكبر من 0');
        }else if(product_count.length === 0){
            alert('يجب أدخال قيمه ');
        }else if(parseInt(product_count) > parseInt(maximum)){
            alert('الحد الأقصى للطلب' + maximum);
        }else if(totalincome > parseInt(maximum)){
            alert('الحد الأقصى للمنتج المطلوب' + maximum);
        }else if(current_value >= product_count){

            $.ajax({
                url: "<?php echo route('ajax-style') ?>",
                method: 'POST',
                async: false,
                data: {
                    order_id: order_id,
                    prodect_id: product_id,
                    product_count: product_count,
                    color_id: color_id,
                    totalincome: totalincome, 
                    stored_id_two: stored_id_two,
                    prodect_id_two: prodect_id_two,
                    product_parcode_two: product_parcode_two,
                    color_id_two: color_id_two,
                    size_id_two: size_id_two,
                    Sector_price_ax: Sector_price_ax,
                    Wholesale_price_ax: Wholesale_price_ax,
                    Wholesale_price_two_ax: Wholesale_price_two_ax,
                    Wholesale_price_three_ax: Wholesale_price_three_ax,
                    number_size_two:number_size_two,
                    _token: token
                },
                 success: function (data) {
                    
                    if ($.trim(data.options) != "") {
                        product_name = data.options;
                        order_table.empty();
                        order_table.append(product_name);
                        product_count_input.val('');
                        //product_parent.find('td.current_value').html(current_value - product_count);
                        // $('input[name="product_parcode[]"]').trigger('input');
                        if(elem.hasClass( "parcode" )){
                            $('input[name="product_parcode[]"]').trigger('input');
                        }else if(elem.hasClass( "store" )){
                            $('select[name="stored_id[]"]').trigger('change');
                        }else if(elem.hasClass( "product" )){
                            $('input[name="prodect_id[]"]').trigger('input');
                        }else if(elem.hasClass( "color" )){
                            $('select[name="color_id[]"]').trigger('change');
                        }
                        // $('input[name="prodect_id[]"]').trigger('input');
                        // $('select[name="color_id[]"]').trigger('change');
                    }else if ($.trim(data.options) == ""){
                        alert('الكمية المتوفره في المخزن أقل من المطلوب.');
                    }
                  
                }
            });

        }else{
            alert('يجب طلب كمية اصغر او تساوي الكمية المتاحة في المخزن.');
        } 
     
    });

</script> 

<script type="text/javascript">
    $(document.body).on('click', 'button.deletedthisproduct', function () {
        var product_parent = $(this).parents('tr');
        var order_table = $('#order_table tbody');
        var token = $("input[name='_token']").val();
        
        var product_id_name = product_parent.attr('id');
        var product_id = product_id_name.replace('product_', '');
        var current_value = parseInt(product_parent.find('td.current_value').html());
        var product_count = product_parent.find('[class^="count_"]').attr("class");
        var product_count = product_count.replace('count_', '');
        /* SOME FUCK */
        var color_td = product_parent.find('[class^="color_"]').attr("class");
        var color_id = color_td.replace('color_', '');
        
        /* AJAX REQUEST NEEDED HERE */
       
            $.ajax({
                url: "<?php echo route('ajax-deleted') ?>",
                method: 'POST',
                data: {
                    prodect_id: product_id,
                    product_count: product_count,
                    color_id: color_id,
                    _token: token
                },
                success: function (data) {
                    product_parent.remove();
                    var removed_value_td = $('#product_info tr#product_row_'+product_id+'').find('td.color_id_'+color_id+'').next().next('td.current_value');
                    var removed_value = parseInt(removed_value_td.html());
                    var product_count_no = parseInt(product_count);
                    removed_value_td.html( removed_value + product_count_no );
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
