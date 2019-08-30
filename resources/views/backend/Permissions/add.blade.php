@extends('backend.layouts.layout')
@section('title')
اضافة صلاحية جديدة
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
                            <li class="breadcrumb-item"><a style="margin-left: 1px;"
                                    href="{{url('/')}}/admin/SitePermissions">صلاحيات الأدارين </a></li>
                            <li class="breadcrumb-item active">اضافة صلاحية جديدة</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="m-b-0">اضافة صلاحية جديدة</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="example-email">اسم الصلاحية</label>
                                    <input type="text" class="form-control" placeholder="اسم الصلاحية">
                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="font-bold">الأداريين /الصلاحيات</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list ">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-2"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-2"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3"> تعديل</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-4"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-4"> حذف</label>
                                                    </li>
                                                    <li>
                                                    <input type="checkbox" class="check" id="flat-checkbox-11"
                                                        data-checkbox="icheckbox_flat-red">
                                                    <label for="flat-checkbox-11">التفعيل</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="font-bold">الأداريين /المديرين</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list ">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-2"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-2"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3"> تعديل</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">الاسم </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">الايميل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">رقم الهاتف</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">الصلاحيه</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">كلمه المرور</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">الصورة</label>
                                                    </li>
                                                    <li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-4"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-4"> حذف</label>
                                                    </li>
                                                    <li>
                                                    <input type="checkbox" class="check" id="flat-checkbox-11"
                                                        data-checkbox="icheckbox_flat-red">
                                                    <label for="flat-checkbox-11">التفعيل</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="font-bold">مسنخدمين الموقع</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list ">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-2"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-2"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3"> تعديل</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3"> الاسم الاول</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3"> الاسم الاخير</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3"> الايميل</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3"> رقم الهاتف</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">البلد</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">المدينة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">المنطقة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">العنوان</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">توع العميل</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">توقيت الطلب</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">توقيت السله</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">كلمه المرور</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">طريقه الدفع</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">السوشيال id</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-3"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-3">الصوره</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-4"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-4"> حذف</label>
                                                    </li>
                                                    <li>
                                                    <input type="checkbox" class="check" id="flat-checkbox-11"
                                                        data-checkbox="icheckbox_flat-red">
                                                    <label for="flat-checkbox-11">التفعيل</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">البلاد</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">اسم البلد</label>
                                                    </li>
                                                    <li>
                                                    <input type="checkbox" class="check" id="flat-checkbox-11"
                                                        data-checkbox="icheckbox_flat-red">
                                                    <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                    <li>
                                                    <input type="checkbox" class="check" id="flat-checkbox-11"
                                                        data-checkbox="icheckbox_flat-red">
                                                    <label for="flat-checkbox-11">التفعيل</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">المدن</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">البلد </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">اسم المدينه</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                    <li>
                                                    <input type="checkbox" class="check" id="flat-checkbox-11"
                                                        data-checkbox="icheckbox_flat-red">
                                                    <label for="flat-checkbox-11">التفعيل</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">المناطق</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">البلد</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">المدينه</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">اسم المنطقه</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">مصاريف الشحن</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                    <li>
                                                    <input type="checkbox" class="check" id="flat-checkbox-11"
                                                        data-checkbox="icheckbox_flat-red">
                                                    <label for="flat-checkbox-11">التفعيل</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">أنواع الطلبات</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">النوع</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">عدد القطع</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                    <li>
                                                    <input type="checkbox" class="check" id="flat-checkbox-11"
                                                        data-checkbox="icheckbox_flat-red">
                                                    <label for="flat-checkbox-11">التفعيل</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="font-bold">طلبات الموقع</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">أعدادات المنتج / الأشكال</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="font-bold">أعدادات المنتج / المقاسات</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">الصفحات / من نحن </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">الصفحات / الشروط والاحكام</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">الصفحات / سياسه الاستخدام</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">الأقسام </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">المنتجات</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">المقالات </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">انواع العملاء </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">أداره شركات الشحن </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">بيانات المخزن الرئيسى </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">فريق العمل</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">بيانات البنوك</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">التنبيهات</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">محطات المترو</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-2 ">
                                    <div class="card">
                                        <div class="card-header">

                                            <label class="font-bold">بيانات الشكاوى</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <ul class="icheck-list list-inline">
                                                    <li>
                                                        <input type="checkbox" class="check" value="site.interface"
                                                            name="per_name[]" id="flat-checkbox-1"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-1"> مشاهدة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-9"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-9"> اضافة</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-10"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-10">تعديل </label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="check" id="flat-checkbox-11"
                                                            data-checkbox="icheckbox_flat-red">
                                                        <label for="flat-checkbox-11">حذف </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
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
