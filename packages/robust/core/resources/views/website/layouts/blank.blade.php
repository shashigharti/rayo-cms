<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{settings('general-setting','company_name')}}</title>

        {{--FAVICONS--}}
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/apple-touch-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/apple-touch-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/apple-touch-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/apple-touch-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/apple-touch-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/apple-touch-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/apple-touch-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon-180x180.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('/favicon-192x192.png') }}" sizes="192x192">
        <link rel="icon" type="image/png" href="{{ asset('/favicon-160x160.png') }}" sizes="160x160">
        <link rel="icon" type="image/png" href="{{ asset('/favicon-96x96.png') }}" sizes="96x96">
        <link rel="icon" type="image/png" href="{{ asset('/favicon-16x16.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ asset('/favicon-32x32.png') }}" sizes="32x32">
        {{--END FAVICONS--}}
        
        <script type='application/ld+json'>
            {
              "@context": "http://www.schema.org",
              "@type": "Website",
              "name": "RealWebSystem",
              "url": "http://167.71.244.240/",
              "image":"http://167.71.244.240/assets/website/images/Logo.jpg",
              "description":"Real estate websites with advanced IDX handling. Search engine optimized pages for homebuyer and home seller leads." 

            }
        </script>
        <style>
            body {
                margin: 0;
                font-family: 'Poppins',sans-serif;
                font-weight: normal;
                font-size: 14px;
                line-height: 1.57142857;
                color: #666;
                background-color: #fff;
            }
            article, aside, footer, header, nav, section {
                display: block;
            }
            header {
                background: #002349;
            }
            @media screen and (min-width: 1400px){
                .banner {
                    height: 610px;
                }
            }
            .banner {
                height: 436px;
                position: relative;
                overflow: hidden;
            }
            .banner .slider {
                position: relative;
                width: 100%;
                height: 100vh !important;
            }
            .owl-carousel {
                display: none;
                width: 100%;
                -webkit-tap-highlight-color: transparent;
                position: relative;
                z-index: 1;
            }
            .slider .slides {
                background-color: #9e9e9e;
                margin: 0;
                height: 400px;
            }
            .owl-carousel.owl-loaded {
                display: block;
            }
            .banner .slider .slides {
                height: 100%;
            }
            .owl-carousel .owl-stage-outer {
                position: relative;
                overflow: hidden;
                -webkit-transform: translate3d(0,0,0);
            }
            .owl-carousel .owl-stage-outer {
                position: relative;
                overflow: hidden;
                -webkit-transform: translate3d(0,0,0);
            }
            .container-fluid {
                width: 100%;
                margin-right: auto;
                margin-left: auto;
                padding-right: 45px;
                padding-left: 45px;
            }
            .container-fluid:before, .container-fluid:after ,.row:before, .row:after,.navbar:before, .navbar:after{
                display: table;
                content: " ";
            }
            .row {
                margin-bottom: 0;
                margin-left: auto;
                margin-right: auto;
            }
            .banner-overlay {
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.4);
                position: absolute;
                top: 0;
                left: 0;
                z-index: 9;
            }
            .banner-caption {
                margin-top: 8.3%;
                width: 100%;
            }
            .banner-caption h1 {
                text-align: center;
                font-size: 36px;
                color: #fff;
                background-color: transparent;
            }
            .site-menu {
                width: 100%;
                padding: 10px 0;
                position: relative;
            }
            .navbar {
                position: relative;
                min-height: 52px;
                margin-bottom: 0;
                border: 1px solid transparent;
            }
            .site-menu nav {
                background-color: transparent;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            nav a {
                color: #fff;
                background-color: transparent;
            }
            img{
                border-style: none;
                vertical-align: middle;
                border:0;
            }
            .mobile-menu-btn {
                display: none;
            }
            .dropdown-content {
                background-color: #fff;
                margin: 0;
                display: none;
                min-width: 100px;
                overflow-y: auto;
                opacity: 0;
                position: absolute;
                left: 0;
                top: 0;
                z-index: 9999;
                -webkit-transform-origin: 0 0;
                transform-origin: 0 0;
            }
            nav ul li {
                -webkit-transition: background-color .3s;
                transition: background-color .3s;
                float: left;
                padding: 0;
            }
            .dropdown-content li {
                clear: both;
                color: rgba(0,0,0,0.87);
                cursor: pointer;
                min-height: 50px;
                line-height: 1.5rem;
                width: 100%;
                text-align: left;
            }
            ul:not(.browser-default)>li {
                list-style-type: none;
            }
            nav ul a {
                -webkit-transition: background-color .3s;
                transition: background-color .3s;
                font-size: 1rem;
                color: #fff;
                display: block;
                padding: 0 15px;
                cursor: pointer;
            }
            .dropdown-content li>a, .dropdown-content li>span {
                font-size: 16px;
                color: #26a69a;
                display: block;
                line-height: 22px;
                padding: 14px 16px;
            }
            .site-menu .nav-link {
                color: white;
                font-size: 14px;
                text-transform: uppercase;
                font-weight: 400;
                text-decoration: none;
            }
            .nav-btn .nav-link {
                font-size: 12px !important;
                vertical-align: middle;
                border: 1px solid #fff;
                width: 110px;
                text-align: center;
                border-radius: 4px;
                margin-left: 10px;
                margin-right: 0 !important;
                height: 41px;
                line-height: 41px;
                margin-top: 10px;
            }
            .search-section {
                background: rgba(199,199,199,0.5);
                padding: 20px;
                margin: 30px 30px 10px;
                position: relative;
            }          
            .row .col {
                float: left;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                padding: 0 .75rem;
                min-height: 1px;
            }
            .row .col.s3 {
                width: 25%;
                margin-left: auto;
                left: auto;
                right: auto;
            }
            p {
                margin: 0 0 11px;
            }
            .search-section p {
                text-align: center;
                color: #fff;
                font-size: 11px;
            }
            input:not([type]), input[type=text]:not(.browser-default), input[type=password]:not(.browser-default), input[type=email]:not(.browser-default), input[type=url]:not(.browser-default), input[type=time]:not(.browser-default), input[type=date]:not(.browser-default), input[type=datetime]:not(.browser-default), input[type=datetime-local]:not(.browser-default), input[type=tel]:not(.browser-default), input[type=number]:not(.browser-default), input[type=search]:not(.browser-default), textarea.materialize-textarea {
                background-color: transparent;
                border: 0;
                border-bottom: 1px solid #9e9e9e;
                border-radius: 0;
                outline: 0;
                height: 3rem;
                width: 100%;
                font-size: 16px;
                margin: 0 0 8px 0;
                padding: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
                -webkit-box-sizing: content-box;
                box-sizing: content-box;
                -webkit-transition: border .3s,-webkit-box-shadow .3s;
                transition: border .3s,-webkit-box-shadow .3s;
                transition: box-shadow .3s,border .3s;
                transition: box-shadow .3s,border .3s,-webkit-box-shadow .3s;
            }
            .search-section input[type="text"] {
                border: 1px solid #ccc !important;
                padding: 0 10px !important;
                width: 90%;
            }
            .search-section input {
                width: 94% !important;
            }
            .row .col.s6 {
                width: 50%;
                margin-left: auto;
                left: auto;
                right: auto;
            }
            .col .row {
                margin-left: -0.75rem;
                margin-right: -0.75rem;
            }
            .row .col.s4 {
                width: 33.33333%;
                margin-left: auto;
                left: auto;
                right: auto;
            }
            .range-bar p {
                color: #fff;
                margin-bottom: 1.7rem;
            }
            .range-bar .slider-container {
                margin: 0 auto;
            }
            .theme-green .back-bar {
                height: 5px;
                border-radius: 2px;
                background-color: #eee;
                background-color: #e7e7e7;
                background-image: -webkit-gradient(linear,left top,left bottom,from(#eee),to(#ddd));
                background-image: linear-gradient(to bottom,#eee,#ddd);
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffeeeeee',endColorstr='#ffdddddd',GradientType=0);
            }
            .range-bar .theme-green .back-bar {
                height: 2px;
            }
            .slider-container .back-bar .selected-bar {
                position: absolute;
                height: 100%;
            }
            .range-bar .theme-green .back-bar .selected-bar {
                border-radius: 2px;
                background-color: #012466;
                background-image: -webkit-gradient(linear,left top,left bottom,from(#012466),to(#012466));
                background-image: linear-gradient(to bottom,#012466,#012466);
            }
            .slider-container .back-bar .pointer {
                position: absolute;
                cursor: col-resize;
                opacity: 1;
                z-index: 2;
            }
            .theme-green .back-bar .pointer {
                width: 12px;
                height: 12px;
                top: -5px;
                box-sizing: border-box;
                border-radius: 0;
                border: 1px solid #012466;
                background: #012466;
                -webkit-transform: rotate(45deg);
                transform: rotate(45deg);
            }
            .slider-container .back-bar .pointer-label {
                position: absolute;
                white-space: nowrap;
                line-height: 1;
            }
            .range-bar .slider-container .back-bar .pointer-label {
                top: 14px;
            }
            .slider-container .back-bar .pointer-label.low {
                left: 0 !important;
            }
            .range-bar .slider-container .back-bar .pointer-label {
                background: transparent;
                font-size: 10px;
                color: #fff;
            }
            .center, .center-align {
                text-align: center;
            }
            .left {
                float: left !important;
            }
            .right {
                float: right !important;
            }
            .theme-btn {
                color: #fff;
                font-size: 12px;
                background: #012466;
                margin: 0 auto;
                padding: 8px;
                border-radius: 3px;
                -webkit-box-shadow: 1px 1px 2px 1px #111;
                box-shadow: 1px 1px 2px 1px #111;
                width: 140px;
                display: inline-block;
                text-align: center;
            }
            .search-section a.theme-btn {
                width: 120px;
                padding: 0;
                border: 0;
                height: 35px;
                line-height: 35px;
            }
            .single-block {
                height: 400px;
                overflow: hidden;
                position: relative;
                margin-bottom: 50px;
            }
            .single-block img {
                width: 100%;
                object-fit: cover;
                height: 100%;
            }
            .figcaption {
                position: absolute;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                color: #fff;
                padding: 50px 10px 0;
            }
            .single-block .figcaption h2 {
                color: #fff;
                font-size: 21px;
                margin-top: 20px;
                font-weight: 500;
                text-shadow: 0 0 5px #0a0a0a;
            }
            .figcaption .available-prices {
                width: 100%;
                padding-bottom: 14px;
                max-height: 0;
                opacity: 0;
                margin-top: 0;
                overflow: hidden;
                -webkit-transition: max-height 1.4s,opacity .9s;
                transition: max-height 1.4s,opacity .9s;
            }
            .subdivs--list__btn {
                display: inline-block;
                background: #fff;
                padding: 5px 10px;
                border-radius: 2px;
                border: 1px solid #ddd;
                margin: 0 auto;
                cursor: pointer;
                top: -2px;
                z-index: 3;
                color: #111;
                font-size: 10px;
            }
            .material-icons {
                font-family: "Material Icons";
                font-weight: normal;
                font-style: normal;
                font-size: 24px;
                display: inline-block;
                line-height: 1;
                text-transform: none;
                letter-spacing: normal;
                word-wrap: normal;
                white-space: nowrap;
                direction: ltr;
                -webkit-font-smoothing: antialiased;
                text-rendering: optimizeLegibility;
                -moz-osx-font-smoothing: grayscale;
                -webkit-font-feature-settings: 'liga';
                font-feature-settings: 'liga';
            }
            i.material-icons {
                display: inline-block;
                font-size: 17px;
                vertical-align: text-bottom;
                margin-right: 2px;
            }
            .subdivs--list__btn i {
                font-size: 13px;
            }
            .adv--block {
                margin-bottom: 60px;
                height: 324px;
                overflow: hidden;
            }
            .row .col.s5 {
                width: 41.66667%;
                margin-left: auto;
                left: auto;
                right: auto;
            }
            .adv--block h4 {
                font-size: 20px !important;
                font-weight: 500 !important;
            }
            a.buy-now-btn {
                color: #fff;
                display: inline-block;
                background: #012466;
                padding: 10px 43px;
            }
            .row .col.s7 {
                width: 58.33333%;
                margin-left: auto;
                left: auto;
                right: auto;
            }
            .adv--block img {
                width: 100%;
            }

        </style>

        <link href="{{ URL::asset('assets/website/css/app.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/website/css/app-1.min.css') }}" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="bower_components/html5shiv/dist/html5shiv.min.js"></script>
        <![endif]-->

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        {!! settings('fb-analytics','code') !!}
    </head>
    <body>
        {!! settings('ga-analytics','code') !!}
        @yield('body_content')

        <script src="{{ url('assets/website/js/app.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    </body>
</html>
