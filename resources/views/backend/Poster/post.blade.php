@extends('backend.layouts.layout')
@section('title')
أعلانات الموقع
@endsection
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="col-md-7">
                    <div class="d-flex">
                        <ol class="breadcrumb m-b-10">
                            <li class="breadcrumb-item"><a style="margin-left: 1px;" href="{{url('/admin')}}">الرئيسية
                                </a></li>
                            <li class="breadcrumb-item active">الإعلانات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body wizard-content">
                        <label>أعلانات الموقع</label>

                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1"
                                    role="tab"><span class="hidden-sm-up"><i class="fa fa-flag-checkered"></i></span>
                                    <span class="hidden-xs-down">أعلانات الصفحة الرئيسية</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home2" role="tab"><span
                                        class="hidden-sm-up"><i class="fa fa-flag-checkered"></i></span> <span
                                        class="hidden-xs-down">أعلانات صفحة المنتجات</span></a> </li>
                        </ul>
                        @if(!empty($poster))
                        <form action="{{url('/admin/EditPosterSite')}}" method="post" enctype="multipart/form-data"
                            class="form-horizontal m-t-20">

                            {{ csrf_field() }}
                            @else
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @endif
                                <br>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="m-b-0 ">الإعلان الأول</h4>
                                            </div>
                                            <div class="card-body">
                                               <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-material">
                                                            <label>عنوان الاعلان</label>
                                                            <input type="text" name="title1_poster" class="form-control" placeholder="عنوان الاعلان"
                                                                @if(!empty($poster->title1_poster)) value="{{$poster->title1_poster}}"@endif>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-material">
                                                            <label>لينك الاعلان</label>
                                                            <input type="text" name="link1_poster" class="form-control"
                                                                placeholder="لينك الاعلان"
                                                                @if(!empty($poster->link1_poster))
                                                            value="{{$poster->link1_poster}}"@endif>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>الصورة</label>
                                                        <div class="input-group form-material">
                                                            <div class="form-line">
                                                                <input type="file" name="image1_poster"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 m-b-10">
                                                    @if(!empty($poster->image1_poster))
                                                    <a href="{{url($poster->image1_poster)}}"
                                                        data-toggle="lightbox">
                                                        <img src="{{ url($poster->image1_poster) }}"
                                                            style="height:100px; width: 200px;"
                                                            class="img-fluid">
                                                    </a>
                                                    @endif
                                                    </div>
                                                    <br>
                                                    <div class="col-md-12 text-center">
                                                        <span class="label label-danger"> او</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <label>كود جوجل ادسنس</label>
                                                            <div class="body">
                                                                <textarea class="form-control" name="desc1_poster"
                                                                    style=resize:none;
                                                                    rows="5">@if(!empty($poster->desc1_poster)){{$poster->desc1_poster}}@endif</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="m-b-0 ">الإعلان الثانى</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-material">
                                                            <label>عنوان الاعلان</label>
                                                            <input type="text" name="title2_poster" class="form-control" placeholder="عنوان الاعلان"
                                                                @if(!empty($poster->title2_poster)) value="{{$poster->title2_poster}}"@endif>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-material">
                                                            <label>لينك الاعلان</label>
                                                            <input type="text" name="link2_poster" class="form-control"
                                                                placeholder="لينك الاعلان"
                                                                @if(!empty($poster->link2_poster)) value="{{$poster->link2_poster}}"@endif>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>الصورة</label>
                                                        <div class="input-group form-material">
                                                            <div class="form-line">
                                                                <input type="file" name="image2_poster"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 m-b-10">
                                                    @if(!empty($poster->image2_poster))
                                                        <a href="{{url($poster->image2_poster)}}"
                                                            data-toggle="lightbox">
                                                            <img src="{{ url($poster->image2_poster) }}"
                                                                style="height:100px; width: 200px;"
                                                                class="img-fluid">
                                                        </a>
                                                    @endif
                                                    </div>
                                                    
                                                    <div class="col-md-12 text-center">
                                                        <span class="label label-danger"> او</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <div class="header">
                                                                <b>كود جوجل ادسنس</b>
                                                            </div>
                                                            <div class="body">
                                                                <textarea class="form-control" name="desc2_poster"
                                                                    style=resize:none;
                                                                    rows="5">@if(!empty($poster->desc2_poster)){{$poster->desc2_poster}}@endif</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="home2" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="m-b-0 ">الإعلان الأول</h4>
                                            </div>
                                            <div class="card-body">
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-material">
                                                            <label>عنوان الاعلان</label>
                                                            <input type="text" name="title3_poster" class="form-control" placeholder="عنوان الاعلان"
                                                                @if(!empty($poster->title3_poster)) value="{{$poster->title3_poster}}"@endif>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-material">
                                                            <label>لينك الاعلان</label>
                                                            <input type="text" name="link3_poster" class="form-control"
                                                                placeholder="لينك الاعلان"
                                                                @if(!empty($poster->link3_poster)) value="{{$poster->link3_poster}}"@endif>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>الصورة</label>
                                                        <div class="input-group form-material">
                                                            <div class="form-line">
                                                                <input type="file" name="image3_poster"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 m-b-10">
                                                    @if(!empty($poster->image3_poster))
                                                    <a href="{{url($poster->image3_poster)}}"
                                                        data-toggle="lightbox">
                                                        <img src="{{ url($poster->image3_poster) }}"
                                                            style="height:100px; width: 200px;"
                                                            class="img-fluid">
                                                    </a>
                                                    @endif
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <span class="label label-danger"> او</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <div class="header">
                                                                <b>كود جوجل ادسنس</b>
                                                            </div>
                                                            <div class="body">
                                                                <textarea class="form-control" name="desc3_poster"
                                                                    style=resize:none;
                                                                    rows="3">@if(!empty($poster->desc3_poster)){{$poster->desc3_poster}}@endif</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="m-b-0 ">الإعلان الثانى</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-material">
                                                            <label>عنوان الاعلان</label>
                                                            <input type="text" name="title4_poster" class="form-control" placeholder="عنوان الاعلان"
                                                                @if(!empty($poster->title4_poster)) value="{{$poster->title4_poster}}"@endif>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-material">
                                                            <label>لينك الاعلان</label>
                                                            <input type="text" name="link4_poster" class="form-control"
                                                                placeholder="لينك الاعلان"
                                                                @if(!empty($poster->link4_poster)) value="{{$poster->link4_poster}}"@endif>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>الصورة</label>
                                                        <div class="input-group form-material">
                                                            <div class="form-line">
                                                                <input type="file" name="image4_poster"
                                                                    class="form-control">
                                                                <br>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 m-b-10">
                                                    @if(!empty($poster->image4_poster))
                                                        <a href="{{url($poster->image4_poster)}}"
                                                            data-toggle="lightbox">
                                                            <img src="{{ url($poster->image4_poster) }}"
                                                                style="height:100px; width: 200px;"
                                                                class="img-fluid">
                                                        </a>
                                                    @endif
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <span class="label label-danger"> او</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <div class="header">
                                                                <b>كود جوجل ادسنس</b>
                                                            </div>
                                                            <div class="body">
                                                                <textarea class="form-control" name="desc4_poster"
                                                                    style=resize:none;
                                                                    rows="3">@if(!empty($poster->desc4_poster)){{$poster->desc4_poster}}@endif</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <br>
                                    <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                        <i class="fa fa-check"></i>
                                        <span>حفظ</span>
                                    </button>

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
@endsection
@endsection
