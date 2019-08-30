@extends('backend.layouts.layout')
@section('title')
شركات الشحن
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
                            <li class="breadcrumb-item active">شركات الشحن</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">شركات الشحن</h4>
                        <a href="{{url('/admin/AddShippingCompany')}}" class="btn btn-outline-info">
                            <i class="fa fa-plus"></i>
                            <span>اضافه شركة جديدة</span>
                        </a>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>رقم</th>
                                        <th>صورة الشركة</th>
                                        <th>اسم الشركة</th>
                                        <th>المسؤل عن الشركة</th>
                                        <th>تاريخ الاضافة</th>
                                        <th>التفعيل</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($shipping))
                                    @foreach($shipping as $get)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            @if(!empty($get->ship_image))
                                            <a href="{{url($get->ship_image)}}" data-toggle="lightbox">
                                                <img src="{{url($get->ship_image)}}" style="height:50px; width: 60px;"
                                                    class="img-fluid">
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/EditShippingCompany/'.$get->id)}}"
                                                target="_blank">{{$get->ship_name}}</a>
                                        </td>

                                        <td> <span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">{{$get->ship_admin_name}}</span>
                                        </td>
                                        <td><span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">{{date('Y-m-d', strtotime($get->created_at ))}}</span>
                                        </td>
                                        <td>
                                            @if($get->ship_active == 2)
                                            <span class="btn btn-dark btn-sm">unactive</span>
                                            @elseif($get->ship_active == 1)
                                            <span class="btn btn-success btn-sm">active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/DeleteShippingCompany/'.$get->id)}}"> <button
                                                    type="button" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('هل تريد الحذف ! ')" data-toggle="tooltip"
                                                    data-original-title="حذف"><i class="fa fa-trash"></i>
                                                    حذف</button></a>
                                            <a href="{{url('/admin/EditShippingCompany/'.$get->id)}} "
                                                class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @if($get->ship_active == 1)
                                            <a href="{{url('/admin/UnActiveShippingCompany/'.$get->id)}}"
                                                class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                            @else
                                            <a href="{{url('/admin/ActiveShippingCompany/'.$get->id)}}"
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
