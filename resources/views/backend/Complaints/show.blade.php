@extends('backend.layouts.layout')
@section('title')
مشاهدة بيانات الشكوى
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
                                    href="{{url('/admin/SiteComplaints')}}">الشكاوى
                                </a></li>
                            <li class="breadcrumb-item active">مشاهدة بيانات الشكوى</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body wizard-content">
                        <label>مشاهدة بيانات الشكوى</label>

                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1"
                                    role="tab"><span class="hidden-sm-up"><i class="fa fa-edit"></i></span> <span
                                        class="hidden-xs-down">بيانات الشكوى</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#logo2" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-image"></i></span> <span
                                        class="hidden-xs-down">صور الطلب</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#logo3" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-image"></i></span> <span
                                        class="hidden-xs-down">رد الأدمن</span></a> </li>

                        </ul>
                        <form action="{{url('/admin/EditComplaints/'.$complain->id)}}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="tab-content">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">اسم العضو<span
                                                    style="color: red">*</span></label>
                                            <div class="form-group form-material">
                                                <input type="text" id="example-email2" name="complain_name"
                                                    class="form-control" value="{{$complain->complain_name}}"
                                                    placeholder="اسم العضو" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label">سبب التواصل<span
                                                    style="color: red">*</span></label>
                                            <div class="form-group form-material">
                                                <input type="text" id="example-email2" name="complain_mail"
                                                    class="form-control" value="{{$complain->complain_mail}}"
                                                    placeholder="سبب التواصل" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label">الايميل<span
                                                    style="color: red">*</span></label>
                                            <div class="form-group form-material">
                                                <input type="text" id="example-email2" name="complain_reason"
                                                    class="form-control" value="{{$complain->complain_reason}}"
                                                    placeholder="سبب التواصل" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label">وصف الأستفسار<span
                                                    style="color: red">*</span></label>
                                            <div class="form-group form-material">
                                                <input type="text" id="example-email2" name="complain_desc"
                                                    class="form-control" value="{{$complain->complain_desc}}"
                                                    placeholder="وصف الأستفسار" readonly>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="tab-pane" id="logo2" role="tabpanel">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">الصوره الاولى<span style="color: red">*</span></label>
                                                <input type="file" id="firstName" name="complain_image_one"
                                                    class="dropify" @if(!empty($complain->complain_image_one))
                                                data-default-file="{{ url($complain->complain_image_one) }}" @endif disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">الصوره الثانية</label>
                                                <input type="file" id="firstName" name="complain_image_two"
                                                    class="dropify" @if(!empty($complain->complain_image_two))
                                                data-default-file="{{ url($complain->complain_image_two) }}" @endif disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">الصوره الثالثة</label>
                                                <input type="file" id="firstName" name="complain_image_three"
                                                    class="dropify" @if(!empty($complain->complain_image_three))
                                                data-default-file="{{ url($complain->complain_image_three) }}" @endif disabled/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="logo3" role="tabpanel">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">الرد على الشكوى</label>
                                            <div class="form-group form-material">
                                                <input type="text" id="example-email2" name="complain_replay"
                                                    class="form-control" value="{{$complain->complain_replay}}"
                                                    placeholder="الرد على الشكوى">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">صور الرد على الشكوى</label>
                                                <input type="file" id="firstName" name="complain_replay_image"
                                                    class="dropify" @if(!empty($complain->complain_replay_image))
                                                data-default-file="{{ url($complain->complain_replay_image) }}" @endif/>
                                            </div>
                                        </div>

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
                            <a href="{{url('/')}}/admin/SiteComplaints"
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
