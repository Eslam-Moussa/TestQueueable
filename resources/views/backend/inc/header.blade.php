<!DOCTYPE html>
<html lang="en" dir="rtl">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('/')}}/back/assets/images/s4-loading.gif">
        <title>
            @yield('title')
        </title>
        @section('title')
        Admin-Panel Sawa4
        @endsection
        <!-- This page CSS -->
        <!-- chartist CSS -->

        <link href="{{url('/')}}/back/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
        <!--Toaster Popup message CSS -->
        <link href="{{url('/')}}/back/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
        <link href="{{url('/')}}/back/assets/node_modules/wizard/steps.css" rel="stylesheet">
        <!--alerts CSS -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="{{url('/')}}/back/css/pages/floating-label.css" rel="stylesheet">
        <link rel="stylesheet" href="{{url('/')}}/back/assets/node_modules/dropify/dist/css/dropify.min.css">
        <link rel="stylesheet" href="{{url('/')}}/back/assets/node_modules/html5-editor/bootstrap-wysihtml5.css" />
        <link href="{{url('/')}}/back/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="{{url('/')}}/back/assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/back/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/back/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/back/assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/back/assets/node_modules/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Custom CSS -->
        <link href="{{url('/')}}/back/assets/node_modules/css-chart/css-chart.css" rel="stylesheet">
        <link href="{{url('/')}}/back/css/style.min.css" rel="stylesheet">
        <link href="{{url('/')}}/back/css/pages/widget-page.css" rel="stylesheet">
        <!-- fontIconPicker core CSS -->
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/back/fontIconPicker/css/jquery.fonticonpicker.min.css" />

        <!-- required default theme -->
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/back/fontIconPicker/themes/grey-theme/jquery.fonticonpicker.grey.min.css" />

        <!-- optional themes -->
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/back/fontIconPicker/themes/dark-grey-theme/jquery.fonticonpicker.darkgrey.min.css" />
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/back/fontIconPicker/themes/bootstrap-theme/jquery.fonticonpicker.bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/back/fontIconPicker/themes/inverted-theme/jquery.fonticonpicker.inverted.min.css" />
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/back/fontIconPicker/demo/fontello-7275ca86/css/fontello.css" />
        
        <!-- Dashboard 1 Page CSS -->
        <link href="{{url('/')}}/back/assets/node_modules/icheck/skins/all.css" rel="stylesheet">
        <link href="{{url('/')}}/back/css/pages/form-icheck.css" rel="stylesheet">
        <link href="{{url('/')}}/back/css/pages/dashboard1.css" rel="stylesheet">
        <link href="{{url('/')}}/back/css/pages/bootstrap-switch.css" rel="stylesheet">
        <link href="{{url('/')}}/back/css/pages/icon-page.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        @yield('header')
    </head>

    <body class="skin-blue fixed-layout">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <img src="{{url('/')}}/back/assets/images/jm-loader.gif" alt="homepage" class="dark-logo" />

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{url('/')}}/admin">
                            <!-- Logo icon --><b class="icon-logo">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="{{url('/')}}/back/assets/images/s4-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{url('/')}}/back/assets/images/s4-icon.png" alt="homepage" class="light-logo " />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text --><span>
                                <!-- dark Logo text -->
                                <img src="{{url('/')}}/back/assets/images/s4-full.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->    
                                <img src="{{url('/')}}/back/assets/images/s4-full.png" class="light-logo" alt="homepage" /></span> </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                            <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <li class="nav-item">
                                <form class="app-search d-none d-md-block d-lg-block">
                                    <input type="text" class="form-control" placeholder="Search & enter">
                                </form>
                            </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">
                            <!-- ============================================================== -->
                            <!-- Comment -->
                            <!-- ============================================================== -->
                            <li>
                                <a target="_blank"  href="{{url('/')}}" style=" line-height: 60px; margin-left: 10px;font-size: 19px; vertical-align: middle;">
                                    <i class="fa fa-eye" style="color:#fff; opacity: .7"></i>
                                    <span style="color:#fff;">مشاهدة الموقع</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-bell"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                    <ul>

                                        <li>
                                            <div class="drop-title">Notifications</div>
                                        </li>
                                        <!-- <li>
                                            <div class="message-center">
                                               
                                                <a href="{{url('/admin/GetMail')}}">
                                                    <div class="btn btn-danger btn-circle"><i class="fa fa-envelope"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>القائمة البريدية</h5> <span class="mail-desc">لم يتم مشاهداتها</span> <span class="time"></span> </div>
                                                </a>
                                                
                                                <a href="{{url('/admin/getcontactus')}}">
                                                    <div class="btn btn-success btn-circle"><i class="fa fa-phone-square"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>أتصل بنا</h5> <span class="mail-desc">اتصالات لم يتم مشاهدتها</span> <span class="time"></span> </div>
                                                </a>
                                                
                                                <a href="{{url('/admin/ServiceInquiries')}}">
                                                    <div class="btn btn-info btn-circle"><i class="fa fa-list-alt"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>الاستفتسارات</h5> <span class="mail-desc">استفسارات لم يتم مشاهدتها</span> <span class="time"></span> </div>
                                                </a>
                                              
                                   
                                            </div>
                                        </li> -->
<!--                                        <li>
                                            <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>-->
                                    </ul>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End Comment -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->
<!--                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>
                                <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                    <ul>
                                        <li>
                                            <div class="drop-title">You have 4 new messages</div>
                                        </li>
                                        <li>
                                            <div class="message-center">
                                                 Message 
                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="{{url('/')}}/back/assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                                </a>
                                                 Message 
                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="{{url('/')}}/back/assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                                </a>
                                                 Message 
                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="{{url('/')}}/back/assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                                </a>
                                                 Message 
                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="{{url('/')}}/back/assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->
                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- mega menu -->
                            <!-- ============================================================== -->
<!--                            <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-layout-width-default"></i></a>
                                <div class="dropdown-menu animated bounceInDown">
                                    <ul class="mega-dropdown-menu row">
                                        <li class="col-lg-3 col-xlg-2 m-b-30">
                                            <h4 class="m-b-20">CAROUSEL</h4>
                                             CAROUSEL 
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="carousel-item active">
                                                        <div class="container"> <img class="d-block img-fluid" src="{{url('/')}}/back/assets/images/big/img1.jpg" alt="First slide"></div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="container"><img class="d-block img-fluid" src="{{url('/')}}/back/assets/images/big/img2.jpg" alt="Second slide"></div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="container"><img class="d-block img-fluid" src="{{url('/')}}/back/assets/images/big/img3.jpg" alt="Third slide"></div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                            </div>
                                             End CAROUSEL 
                                        </li>
                                        <li class="col-lg-3 m-b-30">
                                            <h4 class="m-b-20">ACCORDION</h4>
                                             Accordian 
                                            <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Collapsible Group Item #1
                                                            </a>
                                                        </h5> </div>
                                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                Collapsible Group Item #2
                                                            </a>
                                                        </h5> </div>
                                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingThree">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                Collapsible Group Item #3
                                                            </a>
                                                        </h5> </div>
                                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-lg-3  m-b-30">
                                            <h4 class="m-b-20">CONTACT US</h4>
                                             Contact 
                                            <form>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Enter email"> </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </form>
                                        </li>
                                        <li class="col-lg-3 col-xlg-4 m-b-30">
                                            <h4 class="m-b-20">List style</h4>
                                             List style 
                                            <ul class="list-style-none">
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                             ============================================================== 
                             End mega menu 
                             ============================================================== 
                             ============================================================== 
                             User Profile 
                             ============================================================== 
                            <li class="nav-item dropdown u-pro">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{url('/')}}/back/assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down">Mark &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                     text
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                     text
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                                     text
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                     text
                                    <div class="dropdown-divider"></div>
                                     text
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                     text
                                    <div class="dropdown-divider"></div>
                                     text
                                    <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                     text
                                </div>
                            </li>-->
                            <!-- ============================================================== -->
                            <!-- End User Profile -->
                            <!-- ============================================================== -->
<!--                            <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>-->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
