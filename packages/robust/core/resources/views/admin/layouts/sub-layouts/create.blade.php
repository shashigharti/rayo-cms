@extends('core::admin.layouts.default')

@section('content')
    <div id="main" class="page {{$title}}">
        <div class="row">
            <div class="col s12">
                <div class="container">
                    <div class="row breadcrumbs-inline" id="breadcrumbs-wrapper">
                        <div class="col s10 m6 l6 breadcrumbs-left">
                            {!! Breadcrumb::getInstance()->render(false)  !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab"><a class="active" href="#pages"> {{ $title }} </a></li>
                            </ul>
                        </div>
                        <div class="col s12">
                            <div class="panel card tab--content">
                                @yield('form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- <div class="page-content">
            <div class="container form-container">
                <div class="page-title">
                    <div class="rayo-breadcrumb pull-left">
                        <span><h3>{{ $title }}</h3></span>
                        {!! Breadcrumb::getInstance()->render(false)  !!}
                    </div>
                </div>
                @include("core::admin.partials.tabs.tabs")
                <div class="panel-box panel-default">
                    <div class="form__wrapper">
                        @include("core::admin.partials.messages.info")
                        @yield('form')
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

