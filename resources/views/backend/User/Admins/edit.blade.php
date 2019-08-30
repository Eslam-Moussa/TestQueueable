@extends('backend.layouts.layout')
@section('title')
تعديل بيانات العضو
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
                            <li class="breadcrumb-item"><a href="{{url('/admin/SiteAdmin')}}">المديرين</a></li>
                            <li class="breadcrumb-item active">تعديل بيانات العضو</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="m-b-0">تعديل بيانات العضو</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin/EditAdminSite/'.$useradmin->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="control-label">اسم العضو <span
                                                    style="color: red">*</span></label>
                                            <input type="text" id="firstName" name="name" class="form-control"
                                                placeholder="اسم العضو" @if(!empty($useradmin->name)) value="{{$useradmin->name}}" @endif>
                                            @if ($errors->has('name'))
                                            <small class="form-control-feedback">{{ $errors->first('name') }} </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="control-label">البريد الإلكترونى <span
                                                    style="color: red">*</span></label>
                                            <input type="email" id="firstName" name="email" class="form-control"
                                                placeholder="البريد الإلكترونى" @if(!empty($useradmin->email)) value="{{$useradmin->email}}" @endif>
                                            @if ($errors->has('email'))
                                            <small class="form-control-feedback">{{ $errors->first('email') }} </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">رقم الهاتف</label>
                                            <input type="number" id="firstName" name="user_phone" class="form-control"
                                                placeholder="رقم الهاتف" @if(!empty($useradmin->user_phone)) value="{{$useradmin->user_phone}}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">الصلاحية</label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="permission_id">
                                                <option value="">اختر</option>
                                                <option value="1" @if($useradmin->permission_id == 1 )selected @endif>admin</option>
                                                <option value="2" @if($useradmin->permission_id == 2 )selected @endif>super admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <label class="control-label">كلمة المرور <span
                                                    style="color: red">*</span></label>
                                            <input type="password" id="firstName" name="password" class="form-control"
                                                placeholder="كلمة المرور">
                                            @if ($errors->has('password'))
                                            <small class="form-control-feedback">{{ $errors->first('password') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">صورة المدير</label>
                                            <input type="file" id="input-file-now" name="user_photo" class="dropify" @if(!empty($useradmin->user_photo)) data-default-file="{{ url($useradmin->user_photo) }}" @endif>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                <i class="fa fa-check"></i>
                                <span>حفظ</span>
                            </button>
                            <a href="{{url('/admin/SiteAdmin')}}"
                                class="btn waves-effect  waves-light btn-outline-danger pull-right">
                                <i class="fa fa-close"></i>
                                <span>رجوع</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
@endsection
