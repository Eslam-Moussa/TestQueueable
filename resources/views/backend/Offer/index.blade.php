@extends('backend.layouts.layout')
@section('title')
العروض
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
                            <li class="breadcrumb-item active">العروض</li>
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
                                    <p class="text-muted">عدد العروض</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">{{$Offerscount}}</h2>
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
                                    <p class="text-muted">عدد العروض المفعله</p>
                                 </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-cyan">{{$Offerscountactive}}</h2>
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
                                    <p class="text-muted">عدد العروض الغير مفعله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">{{$OfferscountUnactive}}</h2>
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
                        <h4 class="modal-title" id="myLargeModalLabel">أضافه عرض جديد</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/AddNewOffer')}}" method="post" enctype="multipart/form-data"
                            class="form-material m-t-40">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> إسم العرض</label>
                                        <input type="text" name="offer_name" class="form-control"
                                            placeholder=" إسم العرض" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">المنتج</label>
                                        <select class="select2 form-control custom-select"
                                            style="width: 100%; height:36px;" name="product_id" required>
                                            <option value="">اختر</option>
                                            @if(!empty($Product))
                                            @foreach($Product as $get)
                                            <option value="{{$get->id}}">{{$get->product_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>سعر المنتج</label>
                                        <input type="number" name="price_product" class="form-control"
                                            placeholder="سعر المنتج" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>مده العرض من</label>
                                        <input type="date" name="offer_date_from" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>مده العرض إلى</label>
                                        <input type="date" name="offer_date_to" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>عدد القطع المسموح بها</label>
                                        <input type="number" name="offer_count" class="form-control"
                                            placeholder="عدد القطع المسموح بها" required>
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
                        <h4 class="modal-title" id="myLargeModalLabel">تعديل بيانات العرض</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/EditNewOffer')}}" method="post" enctype="multipart/form-data"
                        class="form-material m-t-40">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                  <input type="hidden" id="id" name="id" class="form-control" value="">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> إسم العرض</label>
                                            <input type="text" id="offer_name" name="offer_name" class="form-control"
                                                placeholder=" إسم العرض" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">المنتج</label>
                                            <select class="form-control" id="product_id" name="product_id">
                                                <option value="">اختر</option>
                                                @if(!empty($Product))
                                                @foreach($Product as $get)
                                                <option value="{{$get->id}}"@if($get->id == $OffersFirst->product_id)selected @endif>{{$get->product_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>سعر المنتج</label>
                                            <input type="number" id="price_product" name="price_product" class="form-control"
                                                placeholder="سعر المنتج" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>مده العرض من</label>
                                            <input type="date" id="offer_date_from" name="offer_date_from" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>مده العرض إلى</label>
                                            <input type="date" id="offer_date_to" name="offer_date_to" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>عدد القطع المسموح بها</label>
                                            <input type="number" id="offer_count" name="offer_count" class="form-control"
                                                placeholder="عدد القطع المسموح بها" required>
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
                <span>أضافه عرض جديد</span>
            </button>

            <br /><br />
            <!-- /.modal -->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">العروض</h4>
                    <h6 class="card-subtitle">جدول بعرض جميع العروض المضافة</h6>
                    <div class="table-responsive">
                       
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم العرض</th>
                                    <th>المنتج</th>
                                    <th>السعر</th>
                                    <th>مده العرض من</th>
                                    <th>مده العرض الى</th>
                                    <th>العدد المسموح بى</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>اسم العرض</th>
                                    <th>المنتج</th>
                                    <th>السعر</th>
                                    <th>مده العرض من</th>
                                    <th>مده العرض الى</th>
                                    <th>العدد المسموح بى</th>
                                    <th>الحاله</th>
                                    <th class="text-nowrap">التحكم</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(!empty($Offers))
                                @foreach($Offers as $get)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><span class="label label-danger">{{$get->offer_name}}</span></td>
                                    <td><span class="label label-info">{{$get->product_name}}</span></td>
                                    <td>{{$get->price_product}}</td>
                                    <td>{{$get->offer_date_from}}</td>
                                    <td>{{$get->offer_date_to}}</td>
                                    <td>{{$get->offer_count}}</td>
                                    <td>
                                        @if($get->offer_active == 2)
                                        <span class="btn btn-dark btn-sm">UnActive</span>
                                        @elseif($get->offer_active == 1)
                                        <span class="btn btn-success btn-sm">Active</span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a data-id="{{$get->id}}" data-offer_name="{{$get->offer_name}}" data-product_id="{{$get->product_id}}" data-price_product="{{$get->price_product}}" data-offer_date_from="{{$get->offer_date_from}}" data-offer_date_to="{{$get->offer_date_to}}" data-offer_count="{{$get->offer_count}}" data-target="#exampleModal"
                                            data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse m-r-10"></i>تعديل</a>

                                        <a href="{{url('/admin/DeleteOffer/'.$get->id)}}"
                                            onclick="return confirm('هل تريد الحذف ! ')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>حذف</a>
                                        @if($get->offer_active == 1)
                                        <a href="{{url('/admin/UnActiveOffer/'.$get->id)}}"
                                            class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                        @else
                                        <a href="{{url('/admin/ActiveOffer/'.$get->id)}}"
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
        var offer_name = button.data('offer_name');
        var product_id = button.data('product_id');
        var price_product = button.data('price_product');
        var offer_date_from = button.data('offer_date_from');
        var offer_date_to = button.data('offer_date_to');
        var offer_count = button.data('offer_count');
        var modal = $(this)
        modal.find('#id').val(id);
        modal.find('#offer_name').val(offer_name);
        modal.find('#product_id').val(product_id);
        modal.find('#price_product').val(price_product);
        modal.find('#offer_date_from').val(offer_date_from);
        modal.find('#offer_date_to').val(offer_date_to);
        modal.find('#offer_count').val(offer_count);
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
