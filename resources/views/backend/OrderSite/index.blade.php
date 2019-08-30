@extends('backend.layouts.layout')
@section('title')
الطلبات
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
                            <li class="breadcrumb-item">طلبات الموقع</li>
                            <li class="breadcrumb-item active">الطلبات</li>
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
                                    <h3><i class="fa fa-cart-plus"></i></h3>
                                    <p class="text-muted">عدد الطلبات</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">{{$OrderSitecount}}</h2>
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
                                    <h3><i class="fa fa-cart-plus"></i></h3>
                                    <p class="text-muted">عدد الطلبات المفعله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-cyan">{{$OrderSitecountactive}}</h2>
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
                                    <h3><i class="fa fa-cart-plus"></i></h3>
                                    <p class="text-muted">عدد الطلبات الغير مفعله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">{{$OrderSitecountUnactive}}</h2>
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
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">أضافة حاله للطلب</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/EditOrderStatus')}}" method="post" enctype="multipart/form-data"
                            class="form-horizontal m-t-40">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" class="form-control" value="">
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">الحالة</label>
                                        <select class="form-control custom-select"
                                            style="width: 100%; height:36px;" id="order_status" name="order_status" required>
                                            <option value="">اختر</option>
                                            <option value="0">طلب جديد</option>
                                            <option value="1">جارى التجهيز</option>
                                            <option value="2">في انتظار تحويل الحوالة البنكية</option>
                                            <option value="3">تم تحويل الحوالة البنكية</option>
                                            <option value="4"> تم ارسالها لشركة الشحن</option>
                                            <option value="5">ملغاة من قبل الأدارة</option>
                                            <option value="6">ملغاة من العميل</option>
                                        </select>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">طلبات الموقع</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>التاريخ</th>
                                        <th>التوقيت</th>
                                        <th>اسم العميل</th>
                                        <th>أجمالى الطلب</th>
                                        <th>حالة الطلب</th>
                                        <th>التفعيل</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @if(!empty($OrderSite))
                                    @foreach($OrderSite as $get)
                                    <tr>
                                        <td>INV-{{$get->order_number}}</td>
                                        <td><span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">{{date('Y-m-d', strtotime($get->created_at ))}}</span></td>
                                        <td><span class="btn waves-effect waves-light btn-rounded btn-primary btn-sm">{{date('g:i a', strtotime($get->created_at ))}}</span></td>
                                        <td>{{$get->use_name}} {{$get->user_secondname}}</td>
                                        <td><span class="btn waves-effect waves-light btn-rounded btn-danger btn-sm">{{$get->order_total}} {{$setting->sit_mony}}</span></td>
                                        <td>
                                        @if($get->order_status == 0) 
                                          <span style="color:red;">طلب جديد</span>
                                        @elseif($get->order_status == 1)
                                        <span style="color:#2eb82e;">جارى التجهيز</span>
                                        @elseif($get->order_status == 2) 
                                        <span style="color:#ff9900;">في انتظار تحويل الحوالة البنكية</span> 
                                        @elseif($get->order_status == 3)
                                        <span style="color:#0066cc;">تم تحويل الحوالة البنكية</span>
                                        @elseif($get->order_status == 4)
                                        <span style="color:#009900;">تم ارسالها لشركة الشحن</span>
                                        @elseif($get->order_status == 5)
                                        <span style="color:#992600;">ملغاة من قبل الأدارة</span>
                                        @elseif($get->order_status == 6)
                                        <span style="color:#992600;">ملغاة من العميل</span> 
                                        @endif
                                        </td>
                                        <td>
                                            @if($get->order_active == 2)
                                            <span class="btn btn-dark btn-sm">unactive</span>
                                            @elseif($get->order_active == 1)
                                            <span class="btn btn-success btn-sm">active</span>
                                            @endif
                                        </td>
                                        <td>

                                            <a data-id="{{$get->id}}" data-order_status="{{$get->order_status}}"
                                            data-target="#exampleModal" data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse m-r-10"></i>الحالة</a>
                                            @if($get->order_active == 1)
                                            <a href="{{url('/admin/UnActiveOrder/'.$get->id)}}"
                                                class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                            @else 
                                            <a href="{{url('/admin/ActiveOrder/'.$get->id)}}"
                                                class="btn btn-success btn-sm"><i class="fa fa-check"></i> تفعيل</a>
                                            @endif
                                            <a href="{{url('/admin/OrderInvoice/'.$get->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i> الفاتورة</a>
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
</div>
@section('js')
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var order_status = button.data('order_status');
        var modal = $(this)
        modal.find('#id').val(id);
        modal.find('#order_status').val(order_status);
    })

</script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

</script>
@endsection
@endsection
