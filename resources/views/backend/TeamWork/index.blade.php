@extends('backend.layouts.layout')
@section('title')
فريق العمل
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
                            <li class="breadcrumb-item active">فريق العمل</li>
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
                        <h4 class="modal-title" id="myLargeModalLabel">أضافه عضو جديد</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/AddTeamWork')}}" method="post" enctype="multipart/form-data"
                            class="form-horizontal m-t-40">
                            {{ csrf_field() }}
                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <p>اسم العضو <span style="color: red">*</span></p>
                                        <input class="form-control"  name="team_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>المسمى الوظيفى <span style="color: red">*</span></p>
                                        <input class="form-control"  name="team_position" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <p>الصوره <span style="color: red">*</span></p>
                                            <input type="file" id="input-file-now" name="team_image"
                                                class="dropify" required/>
                                        </div>
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
                        <h4 class="modal-title" id="myLargeModalLabel">تعديل بيانات العضو</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/EditTeamWork')}}" method="post" enctype="multipart/form-data"
                            class="form-horizontal m-t-40">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" class="form-control" value="">
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>اسم العضو <span style="color: red">*</span></p>
                                        <input class="form-control" id="team_name"  name="team_name" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>المسمى الوظيفى <span style="color: red">*</span></p>
                                        <input class="form-control" id="team_position" name="team_position" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <p>الصوره <span style="color: red">*</span></p>
                                            <input type="file" id="input-file-now" name="team_image"
                                                class="dropify" />
                                        </div>
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
                <span>أضافه عضو جديد</span>
            </button>

            <br /><br />
            <!-- /.modal -->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">فريق العمل </h4>
                    <h6 class="card-subtitle">جدول بعرض جميع فريق العمل المضافة</h6>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصوره</th>
                                    <th>اسم العضو</th>
                                    <th>المسمى الوظيفى</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                    <th>#</th>
                                    <th>الصوره</th>
                                    <th>اسم العضو</th>
                                    <th>المسمى الوظيفى</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(!empty($Team))
                                @foreach($Team as $get)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        @if(!empty($get->team_image))
                                        <a href="{{url($get->team_image)}}" data-toggle="lightbox">
                                            <img src="{{url($get->team_image)}}"
                                                style="height:50px; width: 60px;" class="img-fluid">
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        {{$get->team_name}}
                                    </td>
                                    <td>
                                    <span class="btn btn-info"> {{$get->team_position}} </span>
                                    </td>
                                    <td>
                                        @if($get->team_active == 2)
                                        <span class="btn btn-dark btn-sm">UnActive</span>
                                        @elseif($get->team_active == 1)
                                        <span class="btn btn-success btn-sm">Active</span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a data-id="{{$get->id}}" data-team_image="{{$get->team_image}}"
                                            data-team_name="{{$get->team_name}}" data-team_position="{{$get->team_position}}"
                                            data-target="#exampleModal" data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse m-r-10"></i>تعديل</a>

                                        <a href="{{url('/admin/DeleteTeamWork/'.$get->id)}}"
                                            onclick="return confirm('هل تريد الحذف ! ')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>حذف</a>
                                        @if($get->team_active == 1)
                                        <a href="{{url('/admin/UnActiveTeamWork/'.$get->id)}}"
                                            class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                        @else
                                        <a href="{{url('/admin/ActiveTeamWork/'.$get->id)}}"
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
        var team_image = button.data('team_image');
        var team_name = button.data('team_name');
        var team_position = button.data('team_position');
        var modal = $(this)
        modal.find('#id').val(id);
        modal.find('#team_image').val(team_image);
        modal.find('#team_name').val(team_name);
        modal.find('#team_position').val(team_position);
    })

</script>
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
