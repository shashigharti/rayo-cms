<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{settings('general-setting','company_name')}}</title>
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">           

    
    @set('secure', (env('APP_ENV') == 'production') ? true : false)

    {{ \Site::assets('assets/css/app-1.min.css', 'style', $secure) }} <!-- its for css files compiled -->
    {{ \Site::assets('assets/css/app.min.css', 'style', $secure) }}
    


    <!--[if lt IE 9]>
    <script src="bower_components/html5shiv/dist/html5shiv.min.js"></script>
    <![endif]-->

    {{ \Site::assets('assets/js/app.min.js', 'script', $secure) }}
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    {{ settings('contact-setting', 'g-analytics') }}

</head>
    <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark 2-columns  " data-open="click" data-menu="vertical-menu-nav-dark" data-col="2-columns">
        {{--@include("core::admin.partials.nav")
        @include("core::admin.partials.menus.left-menu")}} --}}
        @yield('content')
        {{-- @include("core::admin.partials.footer")
        @include("core::admin.medias.ajax.media")
        @include("core::admin.partials.modals.modal")
        @include("core::admin.partials.modals.crud")
        @include("core::admin.partials.modals.content_modal")
        @include("core::admin.medias.ajax.media") --}}
    </body>
</html>
