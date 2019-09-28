$(window).scroll(function() {
    if ($(document).scrollTop() > 50){
        $('nav').addClass('shrink');
//        $('nav').addClass('navbar-inverse');
    } else {
//        $('nav').removeClass('navbar-inverse');
        $('nav').removeClass('shrink').addClass('unshrink')
    }
});

