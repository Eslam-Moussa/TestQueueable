@extends('backend.layouts.layout')
@section('title')
أنواع الأشكال
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
                            <li class="breadcrumb-item">أعدادات المنتج</li>
                            <li class="breadcrumb-item active">أنواع الأشكال</li>
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
                        <h4 class="modal-title" id="myLargeModalLabel">أضافه نوع جديد</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/AddSettingStyle')}}" method="post" enctype="multipart/form-data"
                            class="form-horizontal m-t-40">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>وصف مختصر للشكل</p>
                                        <textarea class="form-control" rows="5" name="settingstyle_desc"
                                            maxlength="100"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <p>الصوره</p>
                                            <input type="file" id="input-file-now" name="settingstyle_image"
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
                        <h4 class="modal-title" id="myLargeModalLabel">تعديل بيانات الشكل</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/EditSettingStyle')}}" method="post" enctype="multipart/form-data"
                            class="form-horizontal m-t-40">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" class="form-control" value="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>وصف مختصر للشكل</p>
                                            <textarea class="form-control" rows="5" id="settingstyle_desc"
                                                name="settingstyle_desc" maxlength="100"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>الصوره</p>
                                                <input type="file" id="input-file-now" name="settingstyle_image"
                                                    class="dropify" @if(!empty($Stylefirst->settingstyle_image))
                                                data-default-file="{{ url($Stylefirst->settingstyle_image) }}" @endif />
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
                <span>أضافه نوع جديد</span>
            </button>

            <br /><br />
            <!-- /.modal -->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">انواع الأشكال</h4>
                    <h6 class="card-subtitle">جدول بعرض جميع انواع الأشكال المضافة</h6>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصوره</th>
                                    <th>وصف مختصر</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                    <th>#</th>
                                    <th>الصوره</th>
                                    <th>وصف مختصر</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(!empty($Style))
                                @foreach($Style as $get)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        @if(!empty($get->settingstyle_image))
                                        <a href="{{url($get->settingstyle_image)}}" data-toggle="lightbox">
                                            <img src="{{url($get->settingstyle_image)}}"
                                                style="height:50px; width: 60px;" class="img-fluid">
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        {{$get->settingstyle_desc}}
                                    </td>
                                    <td>
                                        @if($get->settingstyle_active == 2)
                                        <span class="btn btn-dark btn-sm">UnActive</span>
                                        @elseif($get->settingstyle_active == 1)
                                        <span class="btn btn-success btn-sm">Active</span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a data-id="{{$get->id}}" data-settingstyle_image="{{$get->settingstyle_image}}"
                                            data-settingstyle_desc="{{$get->settingstyle_desc}}"
                                            data-target="#exampleModal" data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse m-r-10"></i>تعديل</a>

                                        <a href="{{url('/admin/DeleteSettingStyle/'.$get->id)}}"
                                            onclick="return confirm('هل تريد الحذف ! ')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>حذف</a>
                                        @if($get->settingstyle_active == 1)
                                        <a href="{{url('/admin/UnActiveSettingStyle/'.$get->id)}}"
                                            class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                        @else
                                        <a href="{{url('/admin/ActiveSettingStyle/'.$get->id)}}"
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
        var settingstyle_image = button.data('settingstyle_image');
        var settingstyle_desc = button.data('settingstyle_desc');
        var modal = $(this)
        modal.find('#id').val(id);
        modal.find('#settingstyle_image').val(settingstyle_image);
        modal.find('#settingstyle_desc').val(settingstyle_desc);
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
