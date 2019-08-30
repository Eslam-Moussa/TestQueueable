@extends('backend.layouts.layout')
@section('title')
صلاحيات الأدارين
@endsection
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="col-md-7">
                    <div class="d-flex">
                        <ol class="breadcrumb m-b-10">
                            <li class="breadcrumb-item"><a style="margin-left: 1px;" href="{{url('/admin')}}">الرئيسية </a></li>
                            <li class="breadcrumb-item active">صلاحيات الأدارين </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">صلاحيات الأدارين</h4>
                        <a href="{{url('/admin/AddPermissions')}}" class="btn btn-outline-info">
                            <i class="fa fa-plus"></i>
                            <span>اضافة صلاحيه جديدة</span>
                        </a>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>رقم</th>
                                        <th>الاسم</th>
                                        <th>تاريخ اللأضافة</th>
                                        <th>الحاله</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($permaions))
                                    @foreach($permaions as $get)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                        {{ $get->title_per}}
                                        </td>
                                        <td><span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">{{date('Y-m-d', strtotime($get->created_at ))}}</span>
                                        </td>

                                        <td>
                                            @if($get->group_active == 2)
                                            <span class="btn btn-dark btn-sm">موقوف</span>
                                            @elseif($get->group_active == 1)
                                            <span class="btn btn-success btn-sm">مفعل</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{url('/admin/DeletePermissions/'.$get->id)}}"> <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('هل تريد الحذف ! ')" data-toggle="tooltip" data-original-title="حذف"><i class="fa fa-trash"></i> حذف</button></a>
                                            <a href="{{url('/admin/EditPermissions/'.$get->id)}} " class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @if($get->group_active == 1)
                                            <a href="{{url('/admin/unactivePermissions/'.$get->id)}}"
                                                class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                            @else
                                            <a href="{{url('/admin/activePermissions/'.$get->id)}}"
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