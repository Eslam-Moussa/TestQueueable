@extends('backend.layouts.layout')
@section('title')
محطات المترو
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
                            <li class="breadcrumb-item active">محطات المترو</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="myLargeModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">أضافه محطة جديدة</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/AddNewStations')}}" method="post" enctype="multipart/form-data"
                            class="form-material m-t-40">
                            {{ csrf_field() }}
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم الخط بالعربى</label>
                                    <input type="text" name="Metroline_name" class="form-control"
                                        placeholder="اسم الخط بالعربى" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم المحطه</label>
                                    <input type="text" name="Stations_name" class="form-control"
                                        placeholder="اسم المحطه" required>
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
                        <h4 class="modal-title" id="myLargeModalLabel">تعديل بيانات المحطة</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/EditNewStations')}}" method="post" enctype="multipart/form-data"
                            class="form-material m-t-40">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" class="form-control" value="">
                                <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم الخط بالعربى</label>
                                    <input type="text" id="metroline_name" name="Metroline_name" class="form-control"
                                        placeholder="اسم الخط بالعربى" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم المحطه</label>
                                    <input type="text" id="stations_name" name="Stations_name" class="form-control"
                                        placeholder="اسم المحطه" required>
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
                <span>أضافه محطة جديدة</span>
            </button>

            <br /><br />
            <!-- /.modal -->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">محطات المترو</h4>
                    <h6 class="card-subtitle">جدول بعرض جميع المحطات المضافة</h6>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الخط</th>
                                    <th>المحطة</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                    <th>#</th>
                                    <th>اسم الخط</th>
                                    <th>المحطة</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(!empty($Stations))
                                @foreach($Stations as $get)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><span class="label label-danger">{{$get->Metroline_name}}</span></td>
                                    <td><span class="label label-success">{{$get->Stations_name}}</span></td>
                                    <td>
                                        @if($get->Stations_active == 2)
                                        <span class="btn btn-dark btn-sm">UnActive</span>
                                        @elseif($get->Stations_active == 1)
                                        <span class="btn btn-success btn-sm">Active</span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a data-id="{{$get->id}}" data-metroline_name="{{$get->Metroline_name}}" data-stations_name="{{$get->Stations_name}}"
                                            data-target="#exampleModal" data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse m-r-10"></i>تعديل</a>

                                        <a href="{{url('/admin/DeleteStations/'.$get->id)}}"
                                            onclick="return confirm('هل تريد الحذف ! ')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>حذف</a>
                                        @if($get->Stations_active == 1)
                                        <a href="{{url('/admin/UnActiveStations/'.$get->id)}}"
                                            class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                        @else
                                        <a href="{{url('/admin/ActiveStations/'.$get->id)}}"
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
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var metroline_name = button.data('metroline_name');
        var stations_name = button.data('stations_name');
        var modal = $(this)
        modal.find('#id').val(id);
        modal.find('#metroline_name').val(metroline_name);
        modal.find('#stations_name').val(stations_name);
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
