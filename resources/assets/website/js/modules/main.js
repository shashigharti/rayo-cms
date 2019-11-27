$(window).load(function () {
    console.log('Hello');
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
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

    $('.main--banner_slider').owlCarousel({
        loop:true,
        nav:true,
        items:1
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
