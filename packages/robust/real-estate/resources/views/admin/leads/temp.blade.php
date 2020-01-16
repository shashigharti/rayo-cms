@extends('core::admin.layouts.default')

@section('content')
    @set('ui', new $ui)
    <div class="page {{ $title }}">
        <div id="main" class="content">
            <div class="row">
                <div class="container">
                    <div class="row breadcrumbs-inline" id="breadcrumbs-wrapper">
                        {!! Breadcrumb::getInstance()->render()  !!}
                        <div class="col s2 m6 l6 right--button">
                            @section('left_menu')
                                @if(isset($ui->right_menu))
                                    <span class="create-btn clearfix pull-right">
                                        @include("core::admin.layouts.sub-layouts.partials.tables.create",
                                        [
                                            'ui' => isset($child_ui)?$child_ui:$ui
                                        ])
                                    </span>
                                @endif
                            @show
                        </div>
                    </div>
                </div>
            </div>
            <div class="row content__table">
                <div class="col s12 content__">
                    <div class="container-fluid">
                        @include("core::admin.partials.tabs.tabs")
                        @include("core::admin.partials.messages.info")
                        @if(method_exists($ui, 'getModel'))
                            <div class="col s6">
                                {{ Form::open(['url' => route($ui->getSearchURL()), 'method' => 'get']) }}
                                <div class="input-group row">
                                    <span class="col s3">{{ Form::select('type', $ui->getSearchable(), null) }}</span>
                                    <span
                                        class="pull-left">{{ Form::text('keyword', (isset($keyword))? $keyword:'', ['class' => 'form-control']) }}</span>
                                    <span class="input-group-btn">
                                            {{ Form::button('Search', ['type' => 'submit', 'class' => 'btn theme-btn']) }}
                                        </span>
                                </div>
                                {{ Form::close() }}
                            </div>
                        @endif
                        @include('real-estate::admin.leads.partials.filter')
                        <div class="row">
                            <div class="col s12">
                                <div class="panel col s12">
                                    <table class="card table striped leads-table responsive-table">
                                        @include('real-estate::admin.leads.partials.table-header')
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" value="[object Object]"></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <span class="name lead"><a href="#" class="">Buyer</a></span>
                                                        <div>
                                                            <i aria-hidden="true" class="fa fa-question-circle-o"></i>
                                                            <small>{{$lead->phone}}</small>
                                                        </div>
                                                        <div>
                                                            <i aria-hidden="true" class="fa fa-question-circle-o"></i>
                                                            <small>{{$lead->member->email}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td class="center-align"><small>unknown</small></td>
                                            <td>
                                                <div>
                                                    <a href="#">Glenn Musto</a>
                                                </div>
                                                <div class="status-dlg">
                                                    <a href="#">Showing</a>
                                                </div>
                                            </td>
                                            <td>
                                                <small><span>20 days ago</span></small> <br>
                                                <small>19 Total</small> <br>
                                            </td>
                                            <td>
                                                <small>
                                                    1 Months Ago
                                                </small> <br>
                                                <small>-</small> <br>
                                            </td>
                                            <td>
                                                <table class="table-custom">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="info-unit">
                                                                <div>
                                                                    <a title="Click for Properties Viewed" class='dropdown-trigger' href='#' data-target='dropdown1'>
                                                                        <i aria-hidden="true" class="fa fa-eye"></i>
                                                                        <small><sub>3</sub></small></a>
                                                                    </a>
                                                                    <ul id='dropdown1' class='dropdown-content'>
                                                                        Testing
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="info-unit">
                                                                <div>
                                                                    <a href="#" title="Favorite Properties"><i
                                                                            aria-hidden="true"
                                                                            class="fa fa-heart-o"></i>
                                                                        <small><sub>0</sub></small></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="info-unit has-tooltip"
                                                                 aria-describedby="tooltip_2xmnz29knb">
                                                                <div>
                                                                    <a href="#" title="Neighborhood Camps"><i
                                                                            aria-hidden="true" class="fa fa-home"></i>
                                                                        <small><sub> 0</sub></small></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="info-unit">
                                                                <div>
                                                                    <a href="#" title="Market Reports">
                                                                        <small>MR</small> <small><sub> 0</sub></small>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="info-unit">
                                                                <div>
                                                                    <a href="#" title="Listings / Alerts"
                                                                       class="position-relative">
                                                                        <i aria-hidden="true" class="fa fa-bullhorn"
                                                                           style="color: red !important;"></i>
                                                                        <small><sub>1</sub></small>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="info-unit">
                                                                <div>
                                                                    <a href="#" title="Distance / Drivetime">
                                                                        <i aria-hidden="true" class="fa fa-car"></i>
                                                                        <small><sub> 0</sub></small>
                                                                    </a> <!---->
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table class="table-custom">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="info-unit">
                                                                <div>
                                                                    <a title="Click to see communications"><i
                                                                            aria-hidden="true"
                                                                            class="fa fa-envelope-o"></i>
                                                                        <small><sub>1</sub></small></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="info-unit">
                                                                <div>
                                                                    <a href="#" title="Click to see notes"><i
                                                                            aria-hidden="true"
                                                                            class="fa fa-sticky-note-o"></i>
                                                                        <small><sub>0</sub></small></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="info-unit">
                                                                <div>
                                                                    <a href="#" title="Click to see calls detail"><i
                                                                            aria-hidden="true" class="fa fa-phone"></i>
                                                                        <small><sub>0</sub></small></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="info-unit">
                                                                <div>
                                                                    <a title="Click to see replies"><i
                                                                            aria-hidden="true"
                                                                            class="fa fa-mail-reply"></i>
                                                                        <small><sub>0</sub></small></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="info-unit">
                                                                <div>
                                                                    <a href="#" title="Click to rate lead."><i
                                                                            aria-hidden="true" class="fa fa-star-o"></i>
                                                                        <small><sub>0</sub></small></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <a href="#">Add</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
