<footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <h4>العلامات التجارية</h4>
                    <ul class="footer-links">
                        <li><a href="#">Gucci</a></li>
                        <li><a href="#">Prada</a></li>
                        <li><a href="#">Fendi</a></li>
                        <li><a href="#">Givenchy</a></li>
                        <li><a href="#">Hermes</a></li>
                        <li><a href="#">Louis Vuitton</a></li>
                        <li><a href="#">Balenciaga</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <h4>المنتجات</h4>
                    <ul class="footer-links">
                        <li><a href="#">Female Bags</a></li>
                        <li><a href="#">Modern Bags</a></li>
                        <li><a href="#">Classic Bags</a></li>
                        <li><a href="#">Kids Collection</a></li>
                        <li><a href="#">Male Collection</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <h4>العروض الموسمية</h4>
                    <ul class="footer-links">
                        <li><a href="#">Weekly Offers</a></li>
                        <li><a href="#">Aenean tincidunt est</a></li>
                    </ul>
                    <h4>جديد الموضة</h4>
                    <ul class="footer-links">
                        <li><a href="#">Curabitur elementum odio</a></li>
                        <li><a href="#">Proin condimentum ac</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <h4>أخبار الجوكر</h4>
                    <ul class="footer-links">
                        <li><a href="#">About El Joker</a></li>
                        <li><a href="#">Branches</a></li>
                    </ul>
                    <h4>المكتب الإعلامي</h4>
                    <ul class="footer-links">
                        <li><a href="#">Latest News</a></li>
                        <li><a href="#">Fashion Fairs</a></li>
                    </ul>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            <hr>
            <div class="footer-legal">
                <div class="float-md-right region"><a href="#"><img src="{{url('/')}}/website/assets/img/united-states-flag.png">English</a>
                </div>
                <div class="d-inline-block copyright">
                    <p class="d-inline-block">جميع الحقوق محفوظة © 2019.<br></p>
                </div>
                <div class="d-inline-block legal-links">
                    <div class="d-inline-block item">
                    <a href="{{url('/Privacy-policy')}}"><h5>سياسة الخصوصية</h5></a>
                    </div>
                    <div class="d-inline-block item">
                    <a href="{{url('/Termsandconditions')}}"><h5>الشروط والاحكام</h5></a>
                    </div>
                    <div class="d-inline-block item">
                        <a href="{{url('/About-Us')}}"><h5>من نحن</h5></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{url('/')}}/website/assets/js/jquery.min.js"></script>
    <script src="{{url('/')}}/website/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/website/assets/js/smoothproducts.min.js"></script>
    <script src="{{url('/')}}/website/assets/js/bootstrap-input-spinner.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="{{url('/')}}/website/assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js"></script>
    <script src="{{url('/')}}/website/assets/js/custom.js"></script>
    <script src="{{url('/')}}/website/assets/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
  
  <script>
    jQuery(document).ready(function () {
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
    });

</script>
@yield('js')
</body>

</html>