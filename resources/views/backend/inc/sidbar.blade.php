<aside class="left-sidebar d-print-none">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img @if(!empty(Auth::user()->user_photo)) src="{{url(Auth::user()->user_photo)}}"@endif alt="user-img" class="img-circle"><span class="hide-menu">@if(!empty(Auth::user()->name)){{Auth::user()->name}}@endif</span><span class="hide-menu">@if(!empty(Auth::user()->email)){{Auth::user()->email}}@endif</span></a>
                    <ul aria-expanded="false" class="collapse">
                       @if(!empty(Auth::user()->id))
                        <li><a href="{{url('/admin/EditAdminSite/'.Auth::user()->id)}}"><i class="ti-user"></i> My Profile</a></li>
                        @endif

                        <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>


				<br>
                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin')}}" aria-expanded="false">
                        <i class="fa fa-home"></i>
                        <span class="hide-menu">الصفحة الرئيسية</span>
                    </a>
                </li>
                <li> <a class=" waves-effect waves-dark" href="{{url('/')}}/admin/SiteSetting" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">اعدادات الموقع الرئيسية</ <span class="badge badge-pill badge-cyan ml-auto"></span></span></a></li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                        <span class="hide-menu">اعدادات الصفحة الرئيسية</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('/admin/SliderSite')}}"><i class="fa fa-image"></i>&nbsp; الأسليدر</a></li>
                        <li><a href="{{url('/admin/GetPosterSite')}}"><i class="fa fa-flag"></i>&nbsp; أعلانات</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="hide-menu">الأداريين</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('/admin/SiteAdmin')}}"><i class="fa fa-gear"></i>&nbsp; المديرين</a></li>
                       <li><a href="{{url('/admin/SitePermissions')}}"><i class="fa fa-edit"></i>&nbsp; الصلاحيات</a></li>
                    </ul>
                </li>

                <li> <a class=" waves-effect waves-dark" href="{{url('/')}}/admin/SiteClient" aria-expanded="false"><i class="fa fa-cart-plus"></i><span class="hide-menu">مستخدمين الموقع</ <span class="badge badge-pill badge-cyan ml-auto"></span></span></a></li>


                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-globe"></i>
                        <span class="hide-menu">البلاد والمدن والمناطق</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('/admin/SiteCountries')}}"><i class="fa fa-flag"></i> البلاد</a></li>
                        <li><a href="{{url('/admin/SiteCities')}}"><i class="fa fa-flag"></i> المدن</a></li>
                        <li><a href="{{url('/admin/SiteArea')}}"><i class="fa fa-flag"></i> المناطق</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-tags"></i>
                        <span class="hide-menu">طلبات الموقع</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                    <li><a href="{{url('/admin/OrderCosts')}}"><i class="fa fa-edit"></i> المصاريف المضافه</a></li>
                        <li><a href="{{url('/admin/SiteOrderTyp')}}"><i class="fa fa-edit"></i> انواع الطلبات</a></li>
                        <li><a href="{{url('/admin/OrderSite')}}"><i class="fa fa-edit"></i> الطلبات</a></li>
                        <li><a href="{{url('/admin/OrderInternal')}}"><i class="fa fa-edit"></i> الطلبات الداخليه</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                        <span class="hide-menu">أعدادات المنتج</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('/admin/SiteProductStyle')}}"><i class="fa fa-edit"></i> الأشكال</a></li>
                        <li><a href="{{url('/admin/SiteProductSize')}}"><i class="fa fa-edit"></i> المقاسات</a></li>
                        <li><a href="{{url('/admin/SiteProductColor')}}"><i class="fa fa-edit"></i> الألوان</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-list-ul"></i>
                        <span class="hide-menu">الصفحات</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('/admin/SiteAboutUs')}}"><i class="fa fa-angle-left"></i> من نحن</a></li>
                        <li><a href="{{url('/admin/SiteConditions')}}"><i class="fa fa-angle-left"></i> الشروط و الأحكام</a></li>
                        <li><a href="{{url('/admin/SitePolicy')}}"><i class="fa fa-angle-left"></i> سياسة الاستخدام والخصوصية</a></li>
                    </ul>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteGallery')}}" aria-expanded="false">
                        <i class="fa fa-image"></i>
                        <span class="hide-menu">معرض الصور</span>
                    </a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteCategory')}}" aria-expanded="false">
                        <i class="fa fa-list-ul"></i>
                        <span class="hide-menu">الأقسام</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteProduct')}}" aria-expanded="false">
                        <i class="fa fa-cart-plus"></i>
                        <span class="hide-menu">المنتجات</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/OfferProduct')}}" aria-expanded="false">
                        <i class="fa fa-tags"></i>
                        <span class="hide-menu">العروض</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteBlog')}}" aria-expanded="false">
                        <i class="fa fa-edit"></i>
                        <span class="hide-menu">المقالات</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteClienType')}}" aria-expanded="false">
                        <i class="fa fa-edit"></i>
                        <span class="hide-menu">أنواع العملاء</span>
                    </a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteShippingCompany')}}" aria-expanded="false">
                        <i class="fa fa-edit"></i>
                        <span class="hide-menu">أداره شركات الشحن</span>
                    </a>
                </li>
               
                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteMainStore')}}" aria-expanded="false">
                        <i class="fa fa-edit"></i>
                        <span class="hide-menu">بيانات المخزن الرئيسى</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteTeamWork')}}" aria-expanded="false">
                        <i class="fa fa-edit"></i>
                        <span class="hide-menu">فريق العمل</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteBank')}}" aria-expanded="false">
                        <i class="fa fa-edit"></i>
                        <span class="hide-menu">بيانات البنوك</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteAlerts')}}" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="hide-menu">التنبيهات</span>
                    </a>
                </li> 

                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteMetroStations')}}" aria-expanded="false">
                        <i class="fa fa-ship"></i>
                        <span class="hide-menu">محطات المترو</span>
                    </a>
                </li>  

                <li> 
                    <a class="waves-effect waves-dark" href="{{url('/admin/SiteComplaints')}}" aria-expanded="false">
                        <i class="fa fa-align-justify"></i>
                        <span class="hide-menu">بيانات الشكاوى</span>
                    </a>
                </li> 

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>