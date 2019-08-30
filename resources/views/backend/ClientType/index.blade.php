@extends('backend.layouts.layout')
@section('title')
أنواع العملاء
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
                            <li class="breadcrumb-item active">أنواع العملاء</li>
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
                        <h4 class="modal-title" id="myLargeModalLabel">أضافه نوع عميل جديد</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/AddNewClientType')}}" method="post" enctype="multipart/form-data"
                            class="form-material m-t-40">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>نوع العميل</label>
                                        <input type="text" name="clienttyp_name" class="form-control"
                                            placeholder="نوع العميل" required>
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label>تو قيت الغاء الطلب </label>
                                        <input type="number" name="clienttyp_close_order" class="form-control"
                                            placeholder="تو قيت الغاء الطلب">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>توقيت الأحتفاظ بالسلة بالدقائق</label>
                                        <input type="number" name="clienttyp_cart" class="form-control"
                                            placeholder="توقيت الأحتفاظ بالسلة">
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


        <div class="container-fluid">

            <button data-toggle="modal" data-target="#myLargeModalLabel" type="button" class="btn btn-outline-info">
                <i class="fa fa-plus"></i>
                <span>أضافه نوع عميل</span>
            </button>

            <br /><br />
            <!-- /.modal -->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">أنواع العملاء</h4>
                    <h6 class="card-subtitle">جدول بعرض جميع أنواع العملاء المضافة</h6>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نوع العميل</th>
                                    <!-- <th>توقيت الغاء الطلب </th> -->
                                    <th>توقيت الأحتفاظ بالسلة</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>نوع العميل</th>
                                    <!-- <th>توقيت الغاء الطلب </th> -->
                                    <th>توقيت الأحتفاظ بالسلة</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(!empty($Type))
                                @foreach($Type as $get)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><span class="label label-danger">{{$get->clienttyp_name}}</span></td>
                                    <!-- <td>{{$get->clienttyp_close_order}} <span class="label label-success">ساعه</span></td> -->
                                    <td>{{$get->clienttyp_cart}} <span class="label label-success">دقيقه</span></td>
                                    <td>
                                        @if($get->clienttyp_active == 2)
                                        <span class="btn btn-dark btn-sm">UnActive</span>
                                        @elseif($get->clienttyp_active == 1)
                                        <span class="btn btn-success btn-sm">Active</span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a data-id="{{$get->id}}" data-clienttyp_name="{{$get->clienttyp_name}}" data-clienttyp_close ="{{$get->clienttyp_close_order}}" data-clienttyp_cart="{{$get->clienttyp_cart}}"
                                            data-target="#exampleModal" data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse m-r-10"></i>تعديل</a>

                                        <a href="{{url('/admin/DeleteClientType/'.$get->id)}}"
                                            onclick="return confirm('هل تريد الحذف ! ')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>حذف</a>
                                        @if($get->clienttyp_active == 1)
                                        <a href="{{url('/admin/UnActiveClientType/'.$get->id)}}"
                                            class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                        @else
                                        <a href="{{url('/admin/ActiveClientType/'.$get->id)}}"
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
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">تعديل بيانات نوع العميل</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/EditClientType')}}" method="post" enctype="multipart/form-data"
                            class="form-material m-t-40">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" class="form-control" value="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>نوع العميل</label>
                                            <input type="text" id="clienttyp_name" name="clienttyp_name"
                                                class="form-control" placeholder="نوع العميل" required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label>توقيت الغاء الطلب </label>
                                            <input type="number" id="clienttyp_close" name="clienttyp_close_order"
                                                class="form-control" placeholder="توقيت الغاء الطلب">
                                        </div>
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label>توقيت الأحتفاظ بالسلة بالدقائق</label>
                                            <input type="number" id="clienttyp_cart" name="clienttyp_cart"
                                                class="form-control" placeholder="توقيت الأحتفاظ بالسلة">
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
    </div>
</div>
@section('js')
<script>

    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var clienttyp_name = button.data('clienttyp_name');
        var clienttyp_close = button.data('clienttyp_close');
        var clienttyp_cart = button.data('clienttyp_cart');
        var modal = $(this);
        modal.find('#id').val(id);
        modal.find('#clienttyp_name').val(clienttyp_name);
        modal.find('#clienttyp_close').val(clienttyp_close);
        modal.find('#clienttyp_cart').val(clienttyp_cart);
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
