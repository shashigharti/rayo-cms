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
    $('.tabs').tabs();
    $('.modal').modal();
    $('.sidenav').sidenav();


    const priceSlider = $('.price-range-slider');
    let min = priceSlider.data('min');
    let max = priceSlider.data('max');
    let scale_min = priceSlider.data('scale-min');
    let scale_max = priceSlider.data('scale-max');
    priceSlider.jRange({
        from: min,
        to: max,
        step: 1,
        scale: [scale_min, scale_max],
        format: '$%s',
        width: 150,
        isRange: true,
    });
    const bedroomSlider = $('.bedroom-range-slider');
    min = bedroomSlider.data('min');
    max = bedroomSlider.data('max');
    scale_min = bedroomSlider.data('scale-min');
    scale_max = bedroomSlider.data('scale-max');
    bedroomSlider.jRange({
        from: min,
        to: max,
        step: 1,
        scale: [scale_min, scale_max],
        format: '%s',
        width: 150,
        isRange: true
    });
    const bathroomSlider = $('.bathroom-range-slider');
    min = bathroomSlider.data('min');
    max = bathroomSlider.data('max');
    scale_min = bathroomSlider.data('scale-min');
    scale_max = bathroomSlider.data('scale-max');
    bathroomSlider.jRange({
        from: min,
        to: max,
        step: 1,
        scale: [scale_min, scale_max],
        format: '%s',
        width: 150,
        isRange: true
    });
});
