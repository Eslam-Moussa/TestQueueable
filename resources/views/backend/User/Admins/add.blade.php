@extends('backend.layouts.layout')
@section('title')
اضافة عضو جديد
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
                            <li class="breadcrumb-item active">اضافه عضو جديد</li>
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
                        <h4 class="m-b-0">اضافة عضو جديد</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin/AddNewAdmin')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="control-label">اسم العضو <span
                                                    style="color: red">*</span></label>
                                            <input type="text" id="firstName" name="name" value="{{ old('name') }}" class="form-control"
                                                placeholder="اسم العضو">
                                            @if ($errors->has('name'))
                                            <small class="form-control-feedback">{{ $errors->first('name') }} </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="control-label">البريد الإلكترونى <span
                                                    style="color: red">*</span></label>
                                            <input type="email" id="firstName" name="email" value="{{ old('email') }}" class="form-control"
                                                placeholder="البريد الإلكترونى">
                                            @if ($errors->has('email'))
                                            <small class="form-control-feedback">{{ $errors->first('email') }} </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('user_phone') ? ' has-danger' : '' }}">
                                            <label class="control-label"> رقم الهاتف <span
                                                    style="color: red">*</span></label>
                                            <input type="number" id="firstName" name="user_phone" value="{{ old('user_phone') }}" class="form-control"
                                                placeholder="رقم الهاتف">
                                            @if ($errors->has('user_phone'))
                                            <small class="form-control-feedback">{{ $errors->first('user_phone') }} </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('permission_id') ? ' has-danger' : '' }}">
                                            <label class="control-label">الصلاحية <span
                                                    style="color: red">*</span></label>
                                            <select class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" name="permission_id">
                                                <option value="">اختر</option>
                                                <option value="1"{{ old('permission_id')== 1 ? 'selected' : ''  }}>admin</option>
                                                <option value="2"{{ old('permission_id')== 2 ? 'selected' : ''  }}>super admin</option>
                                            </select>
                                            @if ($errors->has('permission_id'))
                                            <small class="form-control-feedback">{{ $errors->first('permission_id') }} </small>
                                            @endif
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
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                            <label class="control-label">تاكيد كلمة المرور <span
                                                    style="color: red">*</span></label>
                                            <input type="password" id="firstName" name="password_confirmation"
                                                class="form-control" placeholder="تأكيد كلمة المرور">
                                             @if ($errors->has('password_confirmation'))
                                            <small class="form-control-feedback">{{ $errors->first('password_confirmation') }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">صورة المدير</label>
                                            <input type="file" id="input-file-now" name="user_photo" data-default-file="{{ old('user_photo') }}" class="dropify">
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
