@extends('backend.layouts.layout')
@section('title')
المنتجات
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
                                <li class="breadcrumb-item"><a href ="{{url('/admin/SiteMainStore/')}}">بيانات المخزن</a></li>
                                <li class="breadcrumb-item">المخزن <a href ="{{url('/admin/EditMainStore/'.$store->id)}}" target="_blank"><span>({{$store->store_name}})</span></a></li>
                            <li class="breadcrumb-item active">المنتجات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- sample modal content -->
        <!-- <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="myLargeModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">أضافه جديد</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/AddNewArea')}}" method="post" enctype="multipart/form-data"
                            class="form-material m-t-40">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">البلاد</label>
                                        <select class="select2 form-control custom-select"
                                            style="width: 100%; height:36px;" name="country_id" required>
                                            <option value="">اختر</option>
                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">المدن</label>
                                        <select class="select2 form-control custom-select"
                                            style="width: 100%; height:36px;" name="city_id" required>
                                            <option value="">اختر</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اسم المنطقة بالعربى</label>
                                        <input type="text" name="area_name"  class="form-control"
                                            placeholder="اسم المنطقة بالعربى" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>مصاريف الشحن</label> <span>بالجنيه المصرى</span>
                                        <input type="text" name="shipping_area" class="form-control"
                                            placeholder="مصاريف الشحن" required>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="modal-footer">
                                <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                    <i class="fa fa-check"></i>
                                    <span>حفظ</span>
                                </button>
                                <button type="button" data-dismiss="modal"
                                    class="btn waves-effect  waves-light btn-outline-danger ">
                                    <i class="fa fa-close"></i>
                                    <span>اغلاق</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">أضافه جديد</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/EditProductStore')}}" method="post" enctype="multipart/form-data"
                            class="form-material m-t-40">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" class="form-control" value="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>اسم المنتج</label>
                                            <input type="text" id="prodect_name" name="prodect_name"
                                                class="form-control" placeholder="اسم المنتج" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>اللون / الشكل</label>
                                            <input type="text" id="prodect_color" name="prodect_color"
                                                class="form-control" placeholder="اللون" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>المقاس</label>
                                            <input type="text" id="prodect_size" name="prodect_size"
                                                class="form-control" placeholder="المقاس" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>العدد</label>
                                            <input type="text" id="prodect_number" name="prodect_number"
                                                class="form-control" placeholder="العدد">
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="modal-footer">
                                    <button type="submit" class="btn waves-effect waves-light btn-outline-success">
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

                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>التاريخ</th>
                                            <th>العدد</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if(!empty($storecurrent))
                                      @foreach($storecurrent as $get)
                                        <tr>
                                            <td class="text-center">{{$z++}}</td>
                                            <td class="txt-oflo">{{date('Y-m-d', strtotime($get->created_at ))}}</td>
                                            <td><span class="text-success">{{$get->new_current}}</span></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="container-fluid">

            <!-- <button data-toggle="modal" data-target="#myLargeModalLabel" type="button" class="btn btn-outline-info">
                <i class="fa fa-plus"></i>
                <span>أضافه منطقة جديدة</span>
            </button> -->

            <br /><br />
            <!-- /.modal -->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">المنتجات</h4>
                    <h6 class="card-subtitle">جدول بعرض جميع المنتجات المضافة</h6>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم المنتج</th>
                                    <th>القسم</th>
                                    <th>اللون/الشكل</th>
                                    <th>المقاس</th>
                                    <th>عدد اول المده</th>
                                    <th>المسحوب</th>
                                    <th>العدد الحالى</th>
                                    <th>المخزن</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>اسم المنتج</th>
                                    <th>القسم</th>
                                    <th>اللون/الشكل</th>
                                    <th>المقاس</th>
                                    <th>عدد اول المده</th>
                                    <th>المسحوب</th>
                                    <th>العدد الحالى</th>
                                    <th>المخزن</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @if(!empty($productstore))
                                @foreach($productstore as $get)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><span class="label label-success">{{$get->product_name}}</span></td>
                                    <td><span class="label label-danger">{{$get->cat_name}}</span></td>
                                    <td>
                                        @if(!empty($get->color_name))
                                        {{$get->color_name}}
                                        @else
                                        {{$get->settingstyle_desc}}
                                        @endif
                                    </td>
                                    <td>{{$get->size_value}}</td>
                                    <td>{{$get->size_number}}</td>
                                    <td>{{$get->Drawn}}</td>
                                    <td>{{$get->current}}</td>
                                    <td><span class="label label-info">{{$get->store_name}}</span></td>
                                    <td class="text-nowrap">
                                        <a data-id="{{$get->id}}" data-prodect_name="{{$get->product_name}}" data-prodect_color="@if(!empty($get->color_name)){{$get->color_name}} @else {{$get->settingstyle_desc}} @endif"  data-prodect_size="{{$get->size_value}}" data-prodect_number="{{$get->size_number}}"
                                            data-target="#exampleModal" data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse m-r-10"></i>أضافة</a>

                                        <a href="#"
                                            class="btn btn-danger btn-sm"><i class="fa fa-close"></i>المرتجع</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var prodect_name = button.data('prodect_name');
        var prodect_color = button.data('prodect_color');
        var prodect_style = button.data('prodect_style');
        var prodect_size = button.data('prodect_size');
        var prodect_number = button.data('prodect_number');
        var modal = $(this)
        modal.find('#id').val(id);
        modal.find('#prodect_name').val(prodect_name);
        modal.find('#prodect_color').val(prodect_color);
        modal.find('#prodect_style').val(prodect_style);
        modal.find('#prodect_size').val(prodect_size);
        modal.find('#prodect_number').val(prodect_number);
    })

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
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });

        });
    });

</script>
@endsection
@endsection
