$(window).load(function () {
    $('.adv-slider2').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    $('#banner--slider').owlCarousel({
        loop: true,
        nav: false,
        slideSpeed: 300,
        items: 1,
        animateOut: 'fadeOut',
        autoplay: true,
        dots: false
    });
    $(".right-icon").click(function () {
        $("#thebar").toggleClass("change fix");
        $('.arrow').html($('.arrow').text() == 'keyboard_arrow_right' ? 'keyboard_arrow_left' : 'keyboard_arrow_right');
        $(".search--main--content").toggleClass("page page-slide");
    });
    $('.inner-list-tabs').tabs();
    $('select').formSelect();
    $('.modal').modal();
    $('.sidenav').sidenav();
    $('.tabs').tabs();
});
