@extends('core::admin.layouts.default') @section('content') @set('ui', new $ui)

    @include("core::admin.partials.nav")
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full">
        <div class="brand-sidebar">
            <h1 class="logo-wrapper">
                <a class="brand-logo darken-1" href="index.html">
                    <span class="logo-text hide-on-med-and-down">RealEstate</span>
                </a>
            </h1>
        </div>
        @include("core::admin.partials.menus.left-menu")
        <div class="navigation-background"></div>
        <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out">
            <i class="material-icons">menu</i>
        </a>
    </aside>
    <div id="main">
        <div class="row">
            <div class="col s12">
                <div class="container-fluid">
                    @include("core::admin.partials.breadcrumb")
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container-fluid">

                </div>
            </div>
        </div>
    </div>    
@endsection