@extends('backend.layouts.layout')
@section('title')
الأسليدر
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
                            <li class="breadcrumb-item active">الأسليدر </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">الأسليدر</h4>
                        <a href="{{url('/admin/AddSlider')}}" class="btn btn-outline-info">
                            <i class="fa fa-plus"></i>
                            <span>اضافة اسليدر</span>
                        </a>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>رقم</th>
                                        <th>الصورة</th>
                                        <th>عنوان الصورة</th>
                                        <th>الحاله</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($slider))
                                    @foreach($slider as $get)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            @if(!empty($get->slider_image))
                                            <a href="{{url($get->slider_image)}}" data-toggle="lightbox">
                                                <img src="{{url($get->slider_image)}}" style="height:50px; width: 60px;" class="img-fluid">
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{$get->slider_title}}
                                        </td>

                                        <td>
                                            @if($get->slider_active == 2)
                                            <span class="btn btn-dark btn-sm">موقوف</span>
                                            @elseif($get->slider_active == 1)
                                            <span class="btn btn-success btn-sm">مفعل</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{url('/admin/DeleteSlider/'.$get->id)}}"> <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('هل تريد الحذف ! ')" data-toggle="tooltip" data-original-title="حذف"><i class="fa fa-trash"></i> حذف</button></a>
                                            <a href="{{url('/admin/EditSlider/'.$get->id)}} " class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @if($get->slider_active == 1)
                                            <a href="{{url('/admin/unactivesilder/'.$get->id)}}"
                                                class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                            @else
                                            <a href="{{url('/admin/activesilder/'.$get->id)}}"
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