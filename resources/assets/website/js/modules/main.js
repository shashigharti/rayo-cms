$(window).load(function() {
        $('.adv-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
        $('.adv-slider2').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
	    $('.slider').slider({
            fullWidth:true,
            indicators:false
        });
        autoplay();
		function autoplay() {
			$('.carousel').carousel('next');
			setTimeout(autoplay, 4500);
		}
		$(".right-icon").click(function(){
            $("#thebar").toggleClass("change fix");
            $(this).toggleClass("bar-open bar-close");
            $('.arrow').toggleClass("fa-chevron-left fa-chevron-right");
            $(".search--main--content").toggleClass("page page-slide");
        });
        $('.mobile-menu-btn').dropdown();

		$('.price-range-slider').jRange({
	    from:0,
	    to:100,
	    step: 1,
	    scale: [0,100],
	    format: '%s',
	    width:150,
	    showLabels: true,
	    isRange : true
	});
		$('.bedroom-range-slider').jRange({
	    from:0,
	    to:100,
	    step:1,
	    scale: [0,100],
	    format: '%s',
	    width:150,
	    showLabels: true,
	    isRange : true
	});
		$('.bathroom-range-slider').jRange({
	    from:0,
	    to:100,
	    step: 1,
	    scale: [0,100],
	    format: '%s',
	    width:150,
	    showLabels: true,
	    isRange : true
	});

});
