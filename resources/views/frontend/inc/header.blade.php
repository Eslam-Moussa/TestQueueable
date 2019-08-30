<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    @if(!empty($setting->sit_desc_ar))
    <meta name="description" content="{{$setting->sit_desc_ar}}">
    @endif
    @if(!empty($setting->sit_keywords_ar))
    <meta name="keywords" content="{{$setting->sit_keywords_ar}}">
    @endif
    @if(!empty($setting->sit_title_ar))
    <meta name="author" content="{{$setting->sit_title_ar}}">
    @endif
    <title>@yield('title')</title>
    <link rel="icon" @if(!empty($setting->sit_favicon)) href="{{url($setting->sit_favicon)}}" @endif type="image/gif"
    sizes="16x16">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/bootstrap/css/bootstrap.min.css">
    <link href="{{url('/')}}/website/assets/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('/')}}/website/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/Corporate-Footer-Clean.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/dh-agency-bootstrap-theme.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/Filter.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/gift-product-small-double.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/smoothproducts.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/Swiper-Slider-Card-For-Blog-Or-Product-1.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/Swiper-Slider-Card-For-Blog-Or-Product.css">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Changa:400,700&display=swap&subset=arabic" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('header')
</head>

<body>
    <div class="sale-message" role="mainalert">
        <div class="container">
            <p class="mb-0">تخفيضات تصل إلى 40% &nbsp;<a class="btn btn-outline-light ml-3" role="button" href="#">تسوّق
                    الآن</a></p>
        </div>
    </div>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle
                    navigation</span><span class="navbar-toggler-icon"></span></button>
            <ul class="nav ml-auto position-relative text-light d-inline-block d-lg-none"
                style="width: calc( 100% - 70px );font-size:80%;">
                @if(Auth::user())
                <li class="nav-item float-right" role="presentation"><a class="nav-link px-2"
                        href="{{url('/Shopping-Cart-Show')}}"><i class="material-icons"
                            style="font-size: 14px;transform: translateY(3px);">shopping_cart</i>
                        @if(!empty($carheadercount)) {{$carheadercount}} @else 0 @endif عنصر -
                        @if(!empty($cartsum)){{$setting->sit_mony}} {{$cartsum}} @else 0 @endif</a></li>
                <li class="nav-item float-right" role="presentation"><a class="nav-link px-2"
                        href="my-orders.html">طلباتي</a></li>
                <li class="nav-item float-right" role="presentation"><a class="nav-link px-2"
                        href="my-invoices.html">فواتيري</a></li>
                @endif
            </ul>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                    @if(Auth::user()->user_type == 1)
                    <li class="nav-item mr-2" role="presentation"><a class="nav-link btn-primary text-dark"
                            href="{{url('/admin')}}"><i class="material-icons"
                                style="font-size: 18px;transform: translateY(5px);">settings</i> لوحه التحكم</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/My-profile')}}">حسابي</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/My-orders')}}">طلباتي</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link"
                            href="{{url('/My-invoices')}}">فواتيري</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link btn-primary text-dark"
                            href="{{url('/logout')}}"><i class="material-icons"
                                style="font-size: 18px;transform: translateY(5px);">input</i> خروج</a></li>
                    @elseif(Auth::user()->user_type == 2)
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/My-profile')}}">حسابي</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/My-orders')}}">طلباتي</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link"
                            href="{{url('/My-invoices')}}">فواتيري</a>
                    <li class="nav-item" role="presentation"><a class="nav-link btn-primary text-dark"
                            href="{{url('/logout')}}"><i class="material-icons"
                                style="font-size: 18px;transform: translateY(5px);">input</i> خروج</a></li>
                    @endif
                    @else 
                    <li class="nav-item mr-2" role="presentation"><a class="nav-link btn-primary text-dark"
                            href="{{url('/Site-login')}}"><i class="material-icons"
                                style="font-size: 18px;transform: translateY(5px);">vpn_key</i> دخول</a></li>
                    <li class="nav-item mr-2" role="presentation"><a class="nav-link btn-primary text-dark"
                            href="{{url('/Site-register')}}"><i class="material-icons"
                                style="font-size: 18px;transform: translateY(5px);">security</i> إشتراك</a></li>
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/Site-login')}}"><i
                                    class="material-icons"
                                    style="font-size: 18px;transform: translateY(5px);">stars</i>&nbsp;المفضلة</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/Site-login')}}"><i
                                    class="material-icons"
                                    style="font-size: 18px;transform: translateY(5px);">shopping_cart</i>
                                @if(!empty($carheadercount)) {{$carheadercount}} @else 0 @endif عنصر -
                                @if(!empty($cartsum)){{$setting->sit_mony}} {{$cartsum}} @else 0 @endif </a></li>
                        @endif
                    </ul>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    @if(Auth::user())
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/My-favourites')}}"><i
                                class="material-icons"
                                style="font-size: 18px;transform: translateY(5px);">stars</i>&nbsp;المفضلة</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link"
                            href="{{url('/Shopping-Cart-Show')}}"><i class="material-icons"
                                style="font-size: 18px;transform: translateY(5px);">shopping_cart</i>
                            @if(!empty($carheadercount)) {{$carheadercount}} @else 0 @endif عنصر -
                            @if(!empty($cartsum)){{$setting->sit_mony}} {{$cartsum}} @else 0 @endif </a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                    <div class="mainlogo"><img src="{{url('/')}}/website/assets/img/eljokermems.jpg"></div>
                </div>
                <div class="col-12 col-sm-8 col-md-9 col-lg-9 col-xl-9 d-flex justify-content-end align-items-center">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                                href="{{url('/')}}">الرئيسية</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::is('Show-Product') ? 'active' : '' }}"
                                href="{{url('/Show-Product')}}">المنتجات</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::is('Offers') ? 'active' : '' }}"
                                href="{{url('/Offers')}}">العروض</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::is('Galleries') ? 'active' : '' }}"
                                href="{{url('/Galleries')}}">معرض الصور</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::is('Contact-Us') ? 'active' : '' }}"
                                href="{{url('/Contact-Us')}}">اتصل بنا</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="mainmenu">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <div></div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
                    <div class="filter d-block">
                       <form action="{{url('/Product-Search')}}" method="post">
                             {{csrf_field()}}
                            <input type="text" name="keyword" @if(!empty($productname))value="{{$productname}}"@endif placeholder="ابحث هنا ..."/>
                            <select name="cat_id">
                            <option value="">القسم</option>
                                @if(!empty($Cateheader))
                                @foreach($Cateheader as $get)
                                <option value="{{$get->id}}"@if(!empty($mainname)) @if($mainname == $get->id) selected @endif @endif>{{$get->cat_name}}
                                 </option>
                                 @endforeach
                                 @endif
                            </select>
                            <button class="btn btn-outline-light">البحث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
