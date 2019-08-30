@extends('backend.layouts.layout')
@section('title')
الطلبات الداخلية
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
                            <li class="breadcrumb-item active">الطلبات الداخلية</li>
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
                                    <h2 class="counter text-primary">{{$OrderInternalcount}}</h2>
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
                                    <p class="text-muted">عدد الطلبات المكتمله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-cyan">{{$OrderInternalcountactive}}</h2>
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
                                    <p class="text-muted">عدد الطلبات الغير المكتمله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">{{$OrderInternalcountUnactive}}</h2>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">الطلبات الداخلية</h4>
                        <form action="{{url('/admin/CreateOrder')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- @if(!empty($checked))
                        <a href="{{url('/admin/DeleteOrderButton/'.$checked->id)}}" onclick="return confirm('يوجد طلب موجود بالفعل , هل تريد استكماله ام بدأ طلب جديد ؟')" class="btn btn-outline-info">
                            <i class="fa fa-plus"></i>
                            <span>اضافه طلب جديد</span>
                        </a>
                        @else
                        <button type="submit" class="btn btn-outline-info">
                            <i class="fa fa-plus"></i>
                            <span>اضافه طلب جديد</span>
                        </button>
                        @endif -->
                        <button type="submit" class="btn btn-outline-info">
                            <i class="fa fa-plus"></i>
                            <span>اضافه طلب جديد</span>
                        </button>
                        </form>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>التاريخ</th>
                                        <th>اسم العميل</th>
                                        <th>اسم الموظف</th>
                                        <th>أجمالى الطلب</th>
                                        <th>حاله الطلب</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($OrderInternal))
                                    @foreach($OrderInternal as $get)
                                    <tr>
                                        <td>INV-{{$get->order_number}}</td>
                                        <td><span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">{{$get->order_date}}</span>
                                        </td>
                                        <td>
                                           {{$get->use_name}} {{$get->user_secondname}}
                                        </td>
                                        <td> 
                                        {{$get->order_admin_name}} 
                                        </td>
                                        <td><span class="btn waves-effect waves-light btn-rounded btn-danger btn-sm">{{$get->total_price}} {{$setting->sit_mony}}</span>
                                        </td>
                                        <td>
                                            @if($get->status == 0)
                                            <span class="btn btn-danger btn-sm">غير مكتمل</span>
                                            @elseif($get->status == 1)
                                            <span class="btn btn-success btn-sm">مكتمل</span>
                                            @endif
                                        </td>
                                        <td>
                                            
                                            <a href="{{url('/admin/EditOrderInternal/'.$get->id)}} "
                                                class="btn btn-info btn-sm"><i class="fa fa-edit"></i> مشاهدة</a>

                                             <a href="{{url('/admin/DeleteOrderInternal/'.$get->id)}}"> <button
                                                    type="button" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('هل تريد الحذف ! ')" data-toggle="tooltip"
                                                    data-original-title="حذف"><i class="fa fa-trash"></i>
                                                    حذف</button></a>
                                                    
                                            <!-- @if($get->order_active == 1)
                                            <a href="{{url('/admin/UnActiveOrderInternal/'.$get->id)}}"
                                                class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                            @else 
                                            <a href="{{url('/admin/ActiveOrderInternal/'.$get->id)}}"
                                                class="btn btn-success btn-sm"><i class="fa fa-check"></i> تفعيل</a>
                                            @endif -->
                                            <a href="{{url('/admin/OrderInternalInvoice/'.$get->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i> الفاتورة</a>
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
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

</script>
@endsection
@endsection
