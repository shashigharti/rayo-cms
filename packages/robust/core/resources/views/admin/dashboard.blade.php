@extends('core::admin.layouts.default')
@section('content')
    @set('ui', new $ui)
    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
      <div class="navbar navbar-fixed"> 
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar--theme gradient-shadow">
          <div class="nav-wrapper">            
            <ul class="navbar-list right">              
                <li class="hide-on-large-only">
                    <a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);">
                        <i class="material-icons">search</i>
                    </a>
                </li>
              <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">5</small></i></a>
                <!-- notifications-dropdown-->
                <ul class="dropdown-content" id="notifications-dropdown">
                  <li>
                    <h6>NOTIFICATIONS<span class="new badge purple">5</span></h6>
                  </li>
                  <li class="divider"></li>
                  <li>
                        <a class="grey-text text-darken-2" href="#!">
                            <span class="material-icons icon-bg-circle purple small">add_shopping_cart</span> 
                            A new order has been placed!
                        </a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                  </li>
                  <li>
                        <a class="grey-text text-darken-2" href="#!">
                            <span class="material-icons icon-bg-circle purple small">stars</span> 
                            Completed the task
                        </a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                  </li>
                  <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle purple small">settings</span> Settings updated</a>
                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                  </li>             
                </ul>
              </li>
              <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar"><i></i></span></a>
                <!-- profile-dropdown-->
                <ul class="dropdown-content" id="profile-dropdown">
                  <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>
                  <li><a class="grey-text text-darken-1" href="app-chat.html"><i class="material-icons">settings</i> Settings</a></li>             
                  <li><a class="grey-text text-darken-1" href="user-login.html"><i class="material-icons">keyboard_tab</i> Logout</a></li>
                </ul>
              </li>       
            </ul>       
          </div>
          <nav class="display-none search-sm">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                    <input class="search-box-sm" type="search" required="">
                    <label class="label-icon" for="search">
                        <i class="material-icons search-sm-icon">search</i>
                    </label>
                    <i class="material-icons search-sm-close">close</i>
                </div>
              </form>
            </div>
          </nav>
        </nav>
      </div>
    </header>
    <!-- END: Header-->



    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><span class="logo-text hide-on-med-and-down">RealEstateNepal</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="active bold"><a class="active waves-effect waves-cyan " href="#"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="">Dashboard</span></a>
        </li>
        
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">content_paste</i><span class="menu-title" data-i18n="">Pages</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li>
                <a class="collapsible-body" href="page-edit.html" data-i18n="">
                    <i class="material-icons">radio_button_unchecked</i><span>Page Categories</span>
                </a>
              </li>
              <li>
                <a class="collapsible-body" href="page-list.html" data-i18n="">
                    <i class="material-icons">radio_button_unchecked</i><span>Pages</span>
                </a>
              </li>
              </li>
            </ul>
          </div>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan " href="create-menu.html"><i class="material-icons">crop_original</i><span class="menu-title" data-i18n="">Menus</span></a>
        </li> 
        <li class="bold"><a class="waves-effect waves-cyan " href="leads.html"><i class="material-icons">show_chart</i><span class="menu-title" data-i18n="">Leads</span></a>
        </li> 
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">people_outline</i><span class="menu-title" data-i18n="">User Management</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a class="collapsible-body" href="roles-list.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Roles</span></a>
              </li>
              <li><a class="collapsible-body" href="user.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Users</span></a>
              </li>
              </li>
            </ul>
          </div>
        </li>    
      </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="col s12">
                <div class="container-fluid">
                    <div class="row breadcrumbs-inline" id="breadcrumbs-wrapper">
                        <div class="col s10 m6 l6 breadcrumbs-left">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item">
                                    <a class="" href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="active disable-click" href="/leads">LEAD</a>
                                </li>
                            </ol>
                        </div>
                    </div>
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
    <!-- END: Page Main-->
    {{-- <div class="page">
        <div class="page-content container-fluid">            
            <div class="page-title text-center">
                <span class="create-btn">
                    @set('dashboard_menu', isset($child_ui)?$child_ui->dashboard_menu:$ui->dashboard_menu)
                    <div class="pull-right">
                        <div role="group" class="media-arrangement">
                            @can($dashboard_menu['add']['permission'])
                                <a data-toggle="modal"
                                           data-modal="crudModal"
                                           data-url="{{route($dashboard_menu['add']['url'], ['parent_id' => $model->id])}}"
                                           href='javascript:void(0)'>
                                        <i aria-hidden="true"
                                               class="{{$dashboard_menu['icon'] or 'icon md-plus'}}"></i><span>{{$dashboard_menu['add']['display_name']}}</span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </span>
            </div>
            @foreach($widgets as  $widget)
                @include("{$widget->package_name}::admin.dashboard-widgets.{$widget->path}")
            @endforeach
        </div>
    </div> --}}

@endsection