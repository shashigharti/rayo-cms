@extends('core::admin.layouts.default')

@section('content')
    <div id="main" class="page {{$title}}">
        <div class="row">
            <div class="container">
                <div class="row breadcrumbs-inline" id="breadcrumbs-wrapper">
                    {!! Breadcrumb::getInstance()->render()  !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            @include("core::admin.partials.tabs.tabs")
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
    </div>
@endsection

