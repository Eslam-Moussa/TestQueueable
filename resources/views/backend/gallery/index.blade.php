@extends('backend.layouts.layout')
@section('title')
معرض الصور
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
                            <li class="breadcrumb-item active">معرض الصور</li>
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
                        <h4 class="modal-title" id="myLargeModalLabel">أضافه صور جديدة</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/AddGallerySite')}}" method="post" enctype="multipart/form-data"
                            class="form-horizontal m-t-40">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p>الصوره</p>
                                            <input type="file" id="input-file-now" name="gallery_list" class="dropify"
                                                required />
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
                        <h4 class="modal-title" id="myLargeModalLabel">تعديل الصوره</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/EditGallerySite')}}" method="post" enctype="multipart/form-data"
                            class="form-horizontal m-t-40">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" class="form-control" value="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>الصوره</p>
                                                <input type="file" id="input-file-now" id="gallery_list" name="gallery_list"
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
                <span>أضافه صوره</span>
            </button>

            <br /><br />
            <!-- /.modal -->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">الصور</h4>
                    <h6 class="card-subtitle">جدول بعرض جميع الصور المضافة</h6>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصوره</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                    <th>#</th>
                                    <th>الصوره</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(!empty($Gallery))
                                @foreach($Gallery as $get) 
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        @if(!empty($get->gallery_list))
                                        <a href="{{url($get->gallery_list)}}" data-toggle="lightbox">
                                            <img src="{{url($get->gallery_list)}}" style="height:50px; width: 60px;"
                                                 class="img-fluid">
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($get->gallery_active == 2)
                                        <span class="btn btn-dark btn-sm">UnActive</span>
                                        @elseif($get->gallery_active == 1)
                                        <span class="btn btn-success btn-sm">Active</span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a data-id="{{$get->id}}"  data-gallery_list="{{$get->gallery_list}}"
                                            data-target="#exampleModal" data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse m-r-10"></i>تعديل</a>

                                        <a href="{{url('/admin/deleteGallerySite/'.$get->id)}}"
                                            onclick="return confirm('هل تريد الحذف ! ')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>حذف</a>
                                            @if($get->gallery_active == 1)   
                                        <a href="{{url('/admin/unactiveGallerySite/'.$get->id)}}"
                                            class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                        @else
                                        <a href="{{url('/admin/activeGallerySite/'.$get->id)}}"
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
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

</script>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var gallery_list = button.data('gallery_list');
        var modal = $(this)
        modal.find('#id').val(id);
        modal.find('#gallery_list').val(gallery_list);
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
