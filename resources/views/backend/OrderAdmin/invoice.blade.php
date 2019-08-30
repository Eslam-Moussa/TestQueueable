@extends('backend.layouts.layout')
@section('title')
فاتورة رقم (#INV-{{$orderfirst->order_number}})
@endsection
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12 d-print-none">
                <div class="col-md-7">
                    <div class="d-flex">
                        <ol class="breadcrumb m-b-10">
                            <li class="breadcrumb-item"><a style="margin-left: 1px;" href="{{url('/admin')}}">الرئيسية
                                </a></li>
                            <li class="breadcrumb-item">طلبات الموقع</li>
                            <li class="breadcrumb-item"><a style="margin-left: 1px;"
                                    href="{{url('/admin/OrderInternal')}}">الطلبات الداخليه </a></li>
                            <li class="breadcrumb-item active">فاتورة رقم (#INV-{{$orderfirst->order_number}})</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>فاتورة </b> <span class="pull-right">#INV-{{$orderfirst->order_number}}</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">بيانات العميل</b></h3>
                                    @if(!empty($orderfirst->order_user_id))
                                    <p class="text-muted m-t-20"><b>اسم العميل :</b>
                                        @if($orderfirst->user_type == 2)
                                        <a href="{{url('/admin/EditClientSite/'.$orderfirst->order_user_id)}}" target="_blank">
                                            {{$orderfirst->use_name}} {{$orderfirst->user_secondname}}
                                        </a>
                                        @elseif($orderfirst->user_type == 1)
                                        <a href="{{url('/admin/EditAdminSite/'.$orderfirst->order_user_id)}}" target="_blank">
                                            {{$orderfirst->use_name}} {{$orderfirst->user_secondname}}
                                        </a>
                                        @endif
                                    </p>
                                    @endif
                                    @if(!empty($orderfirst->use_email))
                                    <p class="text-muted"><b>البريد الألكترونى :</b> {{$orderfirst->use_email}}</p>
                                    @endif
                                    @if(!empty($orderfirst->user_phone))
                                    <p class="text-muted"><b> رقم الجوال :</b> {{$orderfirst->user_phone}}</p>
                                    @endif
                                    @if(!empty($orderfirst->country_name))
                                    <p class="text-muted"><b>دولة الأقامة :</b> {{$orderfirst->country_name}} </p>
                                    @endif
                                    @if(!empty($orderfirst->city_name))
                                    <p class="text-muted"><b>المدينة :</b> {{$orderfirst->city_name}}</p>
                                    @endif
                                    @if(!empty($orderfirst->area_name))
                                    <p class="text-muted"><b>المنطقة :</b> {{$orderfirst->area_name}}</p>
                                    @endif
                                    @if(!empty($orderfirst->user_address))
                                    <p class="text-muted"><b>العنوان :</b> {{$orderfirst->user_address}}</p>
                                    @endif
                                    @if(!empty($orderfirst->created_at))
                                    <p class="text-muted"><b>تاريخ الطلب :</b>
                                        {{date("F j, Y, g:i a", strtotime($orderfirst->created_at ))}} </p>
                                    @endif

                                </address>
                            </div>

                            <div class="pull-right text-right">
                                <address>
                                    <div class="card-body">
                                        <center>
                                            @if(!empty($setting->sit_logo_ar))
                                            <img src="{{url($setting->sit_logo_ar)}}" class="img-circle" width="130" />
                                            @else
                                            <img src="{{url($setting->sit_logofooter_ar)}}" class="img-circle"
                                                width="150" />
                                            @endif
                                            <h4 class="card-title m-t-10">الجوكر.كوم</h4>
                                            <h6 class="card-subtitle">jokermms.com</h6>
                                        </center>
                                    </div>
                                </address>
                            </div>
                        </div>
                        <div class="modal fade bs-example-modal modal-sm" tabindex="-1" role="dialog" id="myLargeModalLabel"
                            aria-hidden="true" style="display: none;/*margin-right:auto;margin-left:auto;*/">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">أضافه مصاريف للفاتوره</h4>

                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('/admin/CostInvoice/'.$orderfirst->id)}}" method="post"
                                            enctype="multipart/form-data" class="form-material m-t-40">
                                            <form method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" id="id" name="id" class="form-control" value="">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                            <label class="font-bold">المصاريف</label>
                                                            <a class="btn btn-danger waves-effect waves-light addserv text-white">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <br>
                                                            <br>
                                                        </div>
                                                     </div>
                                                    <div class="clearfix"></div>
                                                    <div class="serv_one"></div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn waves-effect waves-light btn-outline-success">
                                                        <i class="fa fa-check"></i>
                                                        <span>حفظ</span>
                                                    </button>
                                                    <button type="button" data-dismiss="modal"
                                                        class="btn waves-effect  waves-light btn-outline-danger">
                                                        <i class="fa fa-close"></i>
                                                        <span>اغلاق</span>
                                                    </button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>المنتج</th>
                                            <th>الصوره</th>
                                            <th>اللون / الشكل</th>
                                            <th>المقاس</th>
                                            <th>الكمية</th>
                                            <th>القيمة</th>
                                            <th>الأجمالى</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($orderdetails))
                                        @foreach($orderdetails as $get)
                                        <tr>
                                            <td class="text-center">{{$i++}}</td>
                                            <td>{{$get->product_name}}</td>
                                            <td>
                                            @if(!empty($get->product_main_image))
                                            <a href="{{url($get->product_main_image)}}" data-toggle="lightbox">
                                                <img src="{{url($get->product_main_image)}}" style="height:50px; width: 60px;"
                                                    class="img-fluid">
                                            </a>
                                            @endif
                                           </td>
                                            <td>{{$get->color_name}}</td>
                                            <td>{{$get->size_value}}</td>
                                            <td>{{$get->pro_count}}</td>
                                            <td>{{$get->pro_price}} {{$setting->sit_mony}}</td>
                                            <td>{{$get->pro_price_total}} {{$setting->sit_mony}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button data-toggle="modal" data-target="#myLargeModalLabel" type="button" class="btn btn-outline-info d-print-none">
                                <i class="fa fa-plus"></i>
                                <span>أضافه مصاريف</span>
                            </button>
                            <div class="clearfix"></div>
                            <div class="pull-left mt-3 text-left">
                                @if(!empty($orderfirst->total_price))
                                <p>أجمالى الملبغ : {{$orderfirst->total_price}} {{$setting->sit_mony}}</p>
                                @endif
                                @if(!empty($Costsdetails))
                                @foreach($Costsdetails as $cost)
                                <p style="color:red;">{{$cost->cost_name}} : {{$cost->cost_price}} {{$setting->sit_mony}}  <a href="{{url('/admin/deleteCostFrom')}}/{{$cost->id}}" onclick="return confirm('هل متاكد من الحذف')" class="btn btn-danger btn-sm d-print-none"> <i class="fa fa-close"></i></a></p>
                                @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <hr>
                                <hr>
                                @if(!empty($orderfirst->total_price))
                                <h4 style="color:#00c292;"><b>الأجمالى :</b> {{$orderfirst->total_price + $CostsSum}} {{$setting->sit_mony}}</h4>
                                @endif
                            </div>

                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-center disnone">
                                <button  class="btn btn-default btn-outline d-print-none" type="button" onclick="myFunction()"> <span><i
                                            class="fa fa-print"></i> طباعة</span> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')

<script>
    function myFunction() {
                window.print();
            }
</script>

<script>
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

</script>
<script>
    $(window).on("load", function () {
        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".serv_one"); //Fields wrapper
        var add_button = $(".addserv"); //Add button ID

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
                    '<div class="col-md-6">'+
                    '<div class="form-group">'+
                    '<label class="control-label">المصروف</label>'+
                    '<select class=" form-control custom-select" style="width: 100%; height:36px;" name="cost_id[]" required>'+
                    '<option value="">اختر</option>'+
                    '@if(!empty($Costs))'+
                    '@foreach($Costs as $get)'+
                    '<option value="{{$get->id}}">{{$get->cost_name}}'+
                    '</option>'+
                    '@endforeach'+
                    '@endif'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label class="control-label">القيمة</label>' +
                    '<input type="number" name="cost_price[]"  class="form-control result" placeholder="القيمة" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<button style="margin-top: 30px;" class="mx-0 mb-0 btn btn-danger btn-flat btn-icon-only remove_field">  <i class="fa fa-trash-o"></i> </button>' +
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
@endsection
@endsection
