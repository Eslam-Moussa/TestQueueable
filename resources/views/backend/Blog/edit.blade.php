@extends('backend.layouts.layout')
@section('title')
تعديل بيانات المقال
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
                                    href="{{url('/admin/SiteBlog')}}">المقالات
                                </a></li>
                            <li class="breadcrumb-item active">تعديل بيانات المقال</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body wizard-content">
                        <label>تعديل بيانات المقال</label>

                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1"
                                    role="tab"><span class="hidden-sm-up"><i class="fa fa-edit"></i></span> <span
                                        class="hidden-xs-down">تفاصيل المقال</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#logo2" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-search"></i></span> <span
                                        class="hidden-xs-down">محركات البحث SEO</span></a> </li>

                        </ul>
                        <form action="{{url('/admin/EditNewBlog/'.$Blog->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="tab-content">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">اسم المقال عربى<span
                                                    style="color: red">*</span></label>
                                            <div class="form-group form-material">
                                                <input type="text" id="example-email2" name="Blog_name"
                                                    class="form-control" value="{{$Blog->Blog_name}}" placeholder="اسم المقال عربى">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label">الرابط عربى<span
                                                    style="color: red">*</span></label>
                                            <div class="form-group form-material">
                                                <input type="text" id="example-email2" name="Blog_link"
                                                    class="form-control" value="{{$Blog->Blog_link}}" placeholder="الرابط عربى">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">وصف عربى<span
                                                        style="color: red">*</span></label>
                                                <textarea class="form-control" id="mymcefour" name="Blog_desc"
                                                    style=resize:none;>@if(!empty($Blog->Blog_desc)){{$Blog->Blog_link}}@endif</textarea>
                                            </div>
                                        </div>

                                        <br><br>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">صورة المقال</label>
                                                <input type="file" id="firstName" name="Blog_image" class="dropify" @if(!empty($Blog->Blog_image)) data-default-file="{{ url($Blog->Blog_image) }}" @endif/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="logo2" role="tabpanel">
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-12 m-t-20">
                                            <label class="control-label">الكلمات الدلالية<span
                                                    style="color: red">*</span></label>

                                            <input type="text" id="example-email2" name="Blog_keywords"
                                                class="form-control" placeholder="الكلمات الدلالية"
                                                data-role="tagsinput" value="{{$Blog->Blog_keywords}}">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="control-label">وصف المقال بالعربى<span
                                                        style="color: red">*</span></label>
                                                <textarea class="form-control" rows="8" name="Blog_desctwo">@if(!empty($Blog->Blog_desctwo)){{$Blog->Blog_desctwo}}@endif</textarea>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                <i class="fa fa-check"></i>
                                <span>حفظ</span>
                            </button>
                            <a href="{{url('/')}}/admin/SiteBlog"
                                class="btn waves-effect  waves-light btn-outline-danger pull-right">
                                <i class="fa fa-close"></i>
                                <span>رجوع</span>
                            </a>
                        </div>
                    </div>
                </div>
                </form>
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
<script>
    $(document).ready(function () {

        if ($("#mymcefour").length > 0) {
            tinymce.init({
                selector: "textarea#mymcefour",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            });
        }
    });

</script>
@endsection
@endsection
