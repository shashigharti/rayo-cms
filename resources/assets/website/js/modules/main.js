$(window).load(function () {
    $('.adv-slider2').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    $('#banner--slider').owlCarousel({
        loop:true,
        nav:false,
        slideSpeed : 300,
        items:1,
        animateOut: 'fadeOut',
        autoplay:true,
        dots:false
    });


	$('.inner-list-tabs').tabs();
	$('select').formSelect();
	$('.tabs').tabs();
	$('.modal').modal();
	$('.advance-search').click(function (e) {
		e.preventDefault();
		$('#adv-search-dropdown').toggleClass('show');
	});
});
