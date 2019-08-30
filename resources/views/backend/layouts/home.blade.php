@extends('backend.layouts.layout')
@section('title')
الصفحة الرئيسية
@endsection
@section('content')
<div class="page-wrapper">

<div class="container-fluid">

    <div class="row page-titles">

    </div>
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="fa fa-user-circle"></i></h3>
                                <p class="text-muted">المديرين</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-primary">{{$admincount}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="fa fa-user-plus"></i></h3>
                                <p class="text-muted">مستخدمين الموقع</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-cyan">{{$Userscount}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="fa fa-desktop"></i></h3>
                                <p class="text-muted">المنتجات</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-purple">{{$productcount}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="fa fa-list"></i></h3>
                                <p class="text-muted">طلبات الموقع</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-success">{{$OrderSitecount}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">المنتجات</h4>
                    <h6 class="card-subtitle">جدول يعرض آخر المنتجات المضافة ...</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="font-size: 13px;">رقم</th>
                                    <th>الصورة</th>
                                    <th>الإسم</th>
                                    <th>القسم الرئيسى</th>
                                    <th>الحالة</th>
                                    <th>التاريخ</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="font-size: 13px;">رقم</th>
                                    <th>الصورة</th>
                                    <th>الإسم</th>
                                    <th>القسم الرئيسى</th>
                                    <th>الحالة</th>
                                    <th>التاريخ</th>
                                    <th></th>

                                </tr>
                            </tfoot>
                            <tbody>
     
                                    @if(count($productsite)>0)
                                    @foreach($productsite as $get)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            @if(!empty($get->product_main_image))
                                            <a href="{{url($get->product_main_image)}}" data-toggle="lightbox">
                                                <img src="{{url($get->product_main_image)}}" style="height:50px; width: 60px;" class="img-fluid">
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{$get->product_name}}
                                        </td>

                                        <td>
                                            {{$get->cat_name}}
                                        </td>
                                       
                                        <td>
                                            @if($get->product_active == 2)
                                            <span class="btn btn-dark btn-sm">موقوف</span>
                                            @elseif($get->product_active == 1)
                                            <span class="btn btn-success btn-sm">مفعل</span>
                                            @endif
                                        </td>

                                        <td><span class="btn waves-effect waves-light btn-rounded btn-cyan btn-sm">{{date('Y-m-d', strtotime($get->created_at ))}}</span></td>
                                        <td>
                                            <a target="_blank" href="{{url('/details-Product')}}/{{$get->id}}/{{$get->product_slog}}"><button class="btn btn-instagram waves-effect btn-circle waves-light"> <i class="fa fa-eye"></i> </button></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td>عفوا لا يوجد معلومات</td>
                                        <td>عفوا لا يوجد معلومات</td>
                                        <td>عفوا لا يوجد معلومات</td>
                                        <td>عفوا لا يوجد معلومات</td>
                                        <td>عفوا لا يوجد معلومات</td>
                                        <td>عفوا لا يوجد معلومات</td>
                                        <td>عفوا لا يوجد معلومات</td>

                                    </tr>
                                    @endif 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@section('js')
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

</script>
<script>
$(document).ready(function () {
    $('#myTable').DataTable();
    $(document).ready(function () {
        var table = $('#example').DataTable({
            "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        //            $('#example tbody').on('click', 'tr.group', function() {
        //                var currentOrder = table.order()[0];
        //                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
        //                    table.order([2, 'desc']).draw();
        //                } else {
        //                    table.order([2, 'asc']).draw();
        //                }
        //            });
    });
});
//    $('#example23').DataTable({
//        dom: 'Bfrtip',
//        buttons: [
//            'copy', 'csv', 'excel', 'pdf', 'print'
//        ]
//    });
</script>

<script>
$(document).ready(function () {
    $('#myTablees').DataTable();
    $(document).ready(function () {
        var table = $('#example').DataTable({
            "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        //            $('#example tbody').on('click', 'tr.group', function() {
        //                var currentOrder = table.order()[0];
        //                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
        //                    table.order([2, 'desc']).draw();
        //                } else {
        //                    table.order([2, 'asc']).draw();
        //                }
        //            });
    });
});
//    $('#example23').DataTable({
//        dom: 'Bfrtip',
//        buttons: [
//            'copy', 'csv', 'excel', 'pdf', 'print'
//        ]
//    });
</script>

@endsection 
@endsection