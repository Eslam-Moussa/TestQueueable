@extends('backend.layouts.layout')
@section('title')
الشكاوى
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
                            <li class="breadcrumb-item active">الشكاوى</li>
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
                                    <p class="text-muted">عدد الشكاوى</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">{{$Complaintscount}}</h2>
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
                                    <p class="text-muted">عدد الشكاوى المفعله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-cyan">{{$Complaintscountactive}}</h2>
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
                                    <p class="text-muted">عدد الشكاوى الغير مفعله</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">{{$ComplaintscountUnactive}}</h2>
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
                        <h4 class="card-title">الشكاوى المضافه من الموقع</h4>
                        <!-- <a href="{{url('/admin/AddNewBlog')}}" class="btn btn-outline-info">
                            <i class="fa fa-plus"></i>
                            <span>اضافه مقال جديد</span>
                        </a> -->
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>رقم</th>
                                        <th>إسم العضو</th>
                                        <th>سبب التواصل</th>
                                        <th>وصف الاستفسار</th>
                                        <th>التاريخ</th>
                                        <th>الحاله</th>
                                        <th></th>

                                    </tr>
                                </thead> 
                                <tbody>
                                    @if(!empty($Complaints))
                                    @foreach($Complaints as $get)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                           {{$get->complain_name}}
                                        </td>
                                        <td>
                                           {{$get->complain_reason}}
                                        </td>
                                        <td>
                                           {{$get->complain_desc}}
                                        </td>
                                        <td><span class="btn waves-effect waves-light btn-rounded btn-dribbble btn-sm">{{date('Y-m-d', strtotime($get->created_at ))}}</span></td>
                                       <td>
                                            @if($get->complain_active == 2)
                                            <span class="btn btn-dark btn-sm">Close</span>
                                            @elseif($get->complain_active == 1)
                                            <span class="btn btn-success btn-sm">Open</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/DeleteComplaints/'.$get->id)}}"> <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('هل تريد الحذف ! ')" data-toggle="tooltip" data-original-title="حذف"><i class="fa fa-trash"></i> حذف</button></a>
                                            <a href="{{url('/admin/EditComplaints/'.$get->id)}} " class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @if($get->complain_active == 1)
                                           <a href="{{url('/admin/UnActiveComplaints/'.$get->id)}}" class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                           @else
                                            <a href="{{url('/admin/ActiveComplaints/'.$get->id)}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i> تفعيل</a>
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

@endsection
