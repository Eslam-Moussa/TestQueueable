@extends('backend.layouts.layout')
@section('title')
من نحن
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
                            <li class="breadcrumb-item active">الصفحات</li>
                            <li class="breadcrumb-item active">من نحن</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">من نحن</h4>
                        <br>

                        @if(!empty($about))
                        <form action="{{url('/admin/EditAboutUs')}}" method="post" class="form-material m-t-40"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @else
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @endif
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>العنوان عربى</label>
                                                <div class="form-group form-material">
                                                    <input type="text" id="example-email2" name="about_title"
                                                        class="form-control" placeholder="العنوان"
                                                        @if(!empty($about->about_title))value="{{$about->about_title}}"@endif>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <b>وصف عربى</b>
                                                    <textarea class="form-control" id="mymcefour" name="about_desc"
                                                        style=resize:none;
                                                        rows="15">@if(!empty($about->about_desc)){{$about->about_desc}}@endif</textarea>
                                                </div>
                                            </div>

                                            <br><br>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">صورة رئيسية</label>
                                                    <input type="file" id="firstName" name="about_image" class="dropify"
                                                        @if(!empty($about->about_image))
                                                    data-default-file="{{ url($about->about_image) }}" @endif>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                            <i class="fa fa-check"></i>
                                            <span>حفظ</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
