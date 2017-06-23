/***************Сonnection OWL-CAROUSEL*************/
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        items: 1,
        navigation: true,
        nav: true,
        lazyLoad: true,
        loop: true,
        autoplay: true,
        animateOut: 'fadeOut',
        mouseDrag: false
    });
});
/***************************Header Scroll**********************/
$(window).scroll(function(){
    if(document.documentElement.clientWidth > 765) {
    $('.header-up').toggleClass('header-up-fixed', $(this).scrollTop() > 400);
    }
});