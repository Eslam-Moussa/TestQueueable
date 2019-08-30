if ($('.clean-product').length > 0) {
    $(window).on("load",function() {
        $('.sp-wrap').smoothproducts();
    });
}

$("input.productcount").inputSpinner();

var headerfrombody = $("#header").offset();
$(window).scroll(function(){
    if ($(this).scrollTop() > headerfrombody.top) {
       $('.navbar.navbar-dark.navbar-expand-lg.bg-dark').addClass('fixed-top');
    } else {
       $('.navbar.navbar-dark.navbar-expand-lg.bg-dark').removeClass('fixed-top');
    }
});