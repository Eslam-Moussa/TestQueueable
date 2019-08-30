@extends('backend.layouts.layout')
@section('title')
تعديل السلايدر
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
                                    href="{{url('/')}}/admin/SliderSite">الأسليدر</a></li>
                            <li class="breadcrumb-item active">تعديل السلايدر</li>
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
                        <h4 class="m-b-0">تعديل السلايدر</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin/EditSlider/'.$slider->id)}}" method="post"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">العنوان</label>
                                            <input type="text" name="slider_title" value="{{$slider->slider_title}}"
                                                class="form-control" placeholder="عنوان الصوره">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4 class="card-title">لينك اقرأ المزيد</h4>
                                            <input type="text" name="slider_link" value="{{$slider->slider_link}}"
                                                class="form-control" placeholder="لينك اقرأ المزيد">
                                        </div>
                                    </div>
                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label class="control-label">وصف مختصر</label>
                                            <textarea class="form-control" rows="5" name="slider_desc" maxlength="100">@if(!empty($slider->slider_desc)){{$slider->slider_desc}}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">صورة <span style="color: red">*</span></label>
                                            <input type="file" id="input-file-now" name="slider_image" class="dropify" @if(!empty($slider->slider_image)) data-default-file="{{ url($slider->slider_image) }}" @endif>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                        <i class="fa fa-check"></i>
                                        <span>حفظ</span>
                                    </button>
                                    <a href="{{url('/')}}/admin/SliderSite"
                                        class="btn waves-effect  waves-light btn-outline-danger pull-right">
                                        <i class="fa fa-close"></i>
                                        <span>رجوع</span>
                                    </a>
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
@section('js')

<script>
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

</script>

<script>
    $(document).ready(function () {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
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
