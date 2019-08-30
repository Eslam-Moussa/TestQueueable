@extends('backend.layouts.layout')
@section('title')
الأعضاء الاداريين
@endsection
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="col-md-7">
                    <div class="d-flex">
                        <ol class="breadcrumb m-b-10">
                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item">الأداريين</li>
                            <li class="breadcrumb-item active">المديرين</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-success"><i class="ti-user"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{$admincount}}</h3>
                                <h5 class="text-muted m-b-0">عدد المديرين</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-info"><i class=" ti-check"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{$admincountactive}}</h3>
                                <h5 class="text-muted m-b-0">عدد المديرين المفعلة</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-success"><i class="ti-close"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{$admincountUnactive}}</h3>
                                <h5 class="text-muted m-b-0">عدد المديرين الغير المفعلة</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">المديرين</h4>
                        <a  href="{{url('/admin/AddNewAdmin')}}" class="btn btn-outline-info">
                        <i class="fa fa-plus"></i>
                          <span>اضافة مدير جديد</span>
                        </a> 
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>صورة</th>
                                        <th>اسم المدير</th>
                                        <th>البريد الإلكترونى</th>
                                        <th>رقم الهاتف</th>
                                        <th>تاريخ الاضافة</th>
                                        <th>الصلاحية</th>
                                       <th>التفعيل</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($AdminSite))
                                    @foreach($AdminSite as $get)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                          @if(!empty($get->user_photo))
                                            <a href="{{url($get->user_photo)}}" data-toggle="lightbox">
                                                <img src="{{url($get->user_photo)}}" style="height:50px; width: 60px;" class="img-fluid">
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/EditAdminSite/'.$get->id)}}" target="_blank">{{$get->name}}</a>
                                        </td>
                                        <td>
                                           {{$get->email}}
                                        </td>
                                
                                        <td> <span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">{{$get->user_phone}}</span></td>
                                        <td><span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">{{date('Y-m-d', strtotime($get->created_at ))}}</span></td>
                                        <td>
                                           <span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">admin</span>
                                        </td>
                                       <td>
                                            @if($get->user_active == 2)
                                            <span class="btn btn-dark btn-sm">unactive</span>
                                            @elseif($get->user_active == 1)
                                            <span class="btn btn-success btn-sm">active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!--<a href="{{url('/admin/DeleteAdminSite/'.$get->id)}}"> <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('هل تريد الحذف ! ')" data-toggle="tooltip" data-original-title="حذف"><i class="fa fa-trash"></i> حذف</button></a>-->
                                            <a href="{{url('/admin/EditAdminSite/'.$get->id)}} " class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @if($get->user_active == 1)
                                           <a href="{{url('/admin/UnActiveAdminSite/'.$get->id)}}" class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                           @else
                                            <a href="{{url('/admin/ActiveAdminSite/'.$get->id)}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i> تفعيل</a>
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