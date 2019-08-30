@extends('backend.layouts.layout')
@section('title')
المناطق
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
                            <li class="breadcrumb-item">البلاد والمدن والمناطق</li>
                            <li class="breadcrumb-item active">المناطق</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-globe"></i></h3>
                                    <p class="text-muted">عدد المناطق</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">{{$Areacount}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                                    <h3><i class="icon-globe"></i></h3>
                                    <p class="text-muted">عدد المناطق المفعله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-cyan">{{$Areacountactive}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                                    <h3><i class="icon-globe"></i></h3>
                                    <p class="text-muted">عدد المناطق الغير مفعله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">{{$AreacountUnactive}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
        </div>
        <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="myLargeModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">أضافه منطقة جديدة</h4>
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
                                            @if(!empty($Country))
                                            @foreach($Country as $getcat)
                                            <option value="{{$getcat->id}}">{{$getcat->country_name}}</option>
                                            @endforeach
                                            @endif
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
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">تعديل بيانات المنطقة</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/EditNewArea')}}" method="post" enctype="multipart/form-data"
                            class="form-material m-t-40">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" class="form-control" value="">
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">البلاد</label>
                                        <select class="form-control" id="country_id" name="country_id" required>
                                            <option value="">اختر</option>
                                            @if(!empty($Country))
                                            @foreach($Country as $getcat)
                                            <option value="{{$getcat->id}}"@if(!empty($Areafirst->country_id))@if($getcat->id == $Areafirst->country_id)selected @endif @endif>{{$getcat->country_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">المدن</label>
                                            <select class="form-control" id="city_id"  name="city_id" required>
                                                <option value="">اختر</option>
                                             @if(!empty($City))
                                            @foreach($City as $get)
                                            <option value="{{$get->id}}"@if(!empty($Areafirst->city_id))@if($get->id == $Areafirst->city_id)selected @endif @endif>{{$get->city_name}}</option>
                                            @endforeach
                                            @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>اسم المنطقة بالعربى</label>
                                            <input type="text" id="area_name"  name="area_name" class="form-control"
                                                placeholder="اسم المنطقة بالعربى" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>مصاريف الشحن</label>
                                        <input type="text" id="shipping_area" name="shipping_area" class="form-control"
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

        <div class="container-fluid">

            <button data-toggle="modal" data-target="#myLargeModalLabel" type="button" class="btn btn-outline-info">
                <i class="fa fa-plus"></i>
                <span>أضافه منطقة جديدة</span>
            </button>

            <br /><br />
            <!-- /.modal -->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">المناطق</h4>
                    <h6 class="card-subtitle">جدول بعرض جميع المناطق المضافة</h6>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>البلد</th>
                                    <th>المدينة</th>
                                    <th>المنطقة</th>
                                    <th>مصاريف الشحن</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                    <th>#</th>
                                    <th>البلد</th>
                                    <th>المدينة</th>
                                    <th>المنطقة</th>
                                    <th>مصاريف الشحن</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               @if(!empty($Area))
                                @foreach($Area as $get)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><span class="label label-danger">{{$get->country_name}}</span></td>
                                    <td><span class="label label-danger">{{$get->city_name}}</span></td>
                                    <td>{{$get->area_name}}</td>
                                    <td><span class="badge badge-danger badge-pill">{{$get->shipping_area}} ج</span></td>
                                    <td>
                                        @if($get->area_active == 2)
                                        <span class="btn btn-dark btn-sm">UnActive</span>
                                        @elseif($get->area_active == 1)
                                        <span class="btn btn-success btn-sm">Active</span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a data-id="{{$get->id}}" data-country_id="{{$get->country_id}}" data-area_name="{{$get->area_name}}" data-city_id="{{$get->city_id}}" data-shipping_area="{{$get->shipping_area}}"
                                            data-target="#exampleModal" data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse m-r-10"></i>تعديل</a>

                                        <a href="{{url('/admin/DeleteArea/'.$get->id)}}"
                                            onclick="return confirm('هل تريد الحذف ! ')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>حذف</a>
                                        @if($get->area_active == 1)
                                        <a href="{{url('/admin/UnActiveArea/'.$get->id)}}"
                                            class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                        @else
                                        <a href="{{url('/admin/ActiveArea/'.$get->id)}}"
                                            class="btn btn-success btn-sm"><i class="fa fa-check"></i> تفعيل</a>
                                        @endif
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

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var country_id = button.data('country_id');
        var city_id = button.data('city_id');
        var area_name = button.data('area_name');
        var shipping_area = button.data('shipping_area');
        var modal = $(this)
        modal.find('#id').val(id);
        modal.find('#country_id').val(country_id);
        modal.find('#city_id').val(city_id);
        modal.find('#area_name').val(area_name);
        modal.find('#shipping_area').val(shipping_area);
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
