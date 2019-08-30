@extends('backend.layouts.layout')
@section('title')
المنتجات
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
                            <li class="breadcrumb-item active">المنتجات</li>
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
                                    <p class="text-muted">عدد المنتجات</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">{{$productcount}}</h2>
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
                                    <p class="text-muted">عدد المنتجات المفعله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-cyan">{{$productcountactive}}</h2>
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
                                    <p class="text-muted">عدد المنتجات الغير مفعله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">{{$productcountUnactive}}</h2>
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
                        <h4 class="card-title">المنتجات</h4>
                        <a href="{{url('/admin/AddNewProduct')}}" class="btn btn-outline-info">
                            <i class="fa fa-plus"></i>
                            <span>اضافه منتج جديد</span>
                        </a>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive">
                           <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>رقم</th>
                                        <th>صورة المنتج</th>
                                        <th>اسم المنتج</th>
                                        <th>القسم الرئيسى</th>
                                        <th>اللون</th>
                                        <th>المقاس</th>
                                        <th>سعر الشراء</th>
                                        <th>تاريخ الاضافة</th>
                                        <th>التفعيل</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($productsite))
                                    @foreach($productsite as $get)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            @if(!empty($get->product_main_image))
                                            <a href="{{url($get->product_main_image)}}" data-toggle="lightbox">
                                                <img src="{{url($get->product_main_image)}}" style="height:50px; width: 60px;"
                                                    class="img-fluid">
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                           <h5>
                                            <a href="{{url('/admin/EditProduct/'.$get->id)}}"
                                                target="_blank">{{$get->product_name}}</a>
                                                </h5>
                                        </td>

                                        <td> <span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">{{$get->cat_name}}</span>
                                        </td>
                                        <td>{{$get->color_name}}</td>
                                        <td>{{$get->size_value}}</td>
                                        <td>
                                            {{$get->product_Purch_price}}
                                         </td>
                                        <td><span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">{{date('Y-m-d', strtotime($get->created_at ))}}</span>
                                        </td>
                                        <td>
                                            @if($get->product_active == 2)
                                            <span class="btn btn-dark btn-sm">unactive</span>
                                            @elseif($get->product_active == 1)
                                            <span class="btn btn-success btn-sm">active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/DeleteProduct/'.$get->id)}}"> <button
                                                    type="button" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('هل تريد الحذف ! ')" data-toggle="tooltip"
                                                    data-original-title="حذف"><i class="fa fa-trash"></i>
                                                    حذف</button></a>
                                            <a href="{{url('/admin/EditProduct/'.$get->id)}} "
                                                class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @if($get->product_active == 1)
                                            <a href="{{url('/admin/UnActiveProduct/'.$get->id)}}"
                                                class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                            @else
                                            <a href="{{url('/admin/ActiveProduct/'.$get->id)}}"
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
