$(document).ready(function(){
    alert('Script is running!');
    $('.testimonial-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 3000,
        nextArrow: '<div class="slick-next">›</div>',
        prevArrow: '<div class="slick-prev">‹</div>',
    });
});
