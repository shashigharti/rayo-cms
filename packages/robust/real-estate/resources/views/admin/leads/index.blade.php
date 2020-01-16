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
                                        <span class="pull-left">{{ Form::text('keyword', (isset($keyword))? $keyword:'', ['class' => 'form-control']) }}</span>
                                        <span class="input-group-btn">
                                            {{ Form::button('Search', ['type' => 'submit', 'class' => 'btn theme-btn']) }}
                                        </span>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        @endif
                        @yield('before_table')

                        

                        <div class="row filter--bar">
                            <div class="col s12">
                                <div class="col left">
                                    <ul class="tabs theme__tabs">
                                        <li class="tab"><a class="active" href="#">Active</a></li>
                                        <li class="tab"><a href="#">New</a></li>
                                        <li class="tab"><a href="#">Unassigned</a></li>
                                        <li class="tab"><a href="#">Archived</a></li>
                                        <li class="tab"><a href="#">Discarded</a></li>
                                        <li class="tab"><a href="#">Unregistered</a></li>
                                    </ul>
                                </div>
                                <div class="input-field theme--select col s2">
                                    <select>
                                        <option value="" disabled selected>All Agents</option>
                                        <option value="1">John C</option>
                                        <option value="2">Sam Mazor</option>
                                    </select>
                                </div>
                                <div class="col s12 btn--bar">
                                    <button class="btn btn-sm"><i aria-hidden="true" class="fa fa-check-square"></i></button>
                                    <button class="btn  btn-sm lead-action-btn">
                                        <i aria-hidden="true" class="fa fa-plus-circle"></i> Add
                                    </button>
                                    <button id="filter_leads_btn" class="btn btn-sm">
                                        <i class="fa fa-refresh fa-lg"></i>Refresh
                                    </button>
                                    <div class="right-align pagination--top">
                                        <ul class="pagination theme--pagination right">
                                            <li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                        <span class="badge badge-secondary">Total Leads: 3 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="panel col s12">
                                    <table class="card table striped leads-table responsive-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="name-col"></th>
                                                <th class="tags-col">Tags</th>
                                                <th class="budg-city-time-col text-center">
                                                    <div class="sortable-head col-sub-heading">
                                                        <i aria-hidden="true" class="fa fa-usd"></i>
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon"></i>
                                                        <i aria-hidden="true" class="fa fa-sort-desc down-caret" style="display: none;"></i>
                                                        <i aria-hidden="true" class="fa fa-sort-asc up-caret" style="display: none;"></i>
                                                    </div>
                                                    <span class="v-line"></span>
                                                    <div class="sortable-head col-sub-heading">
                                                        TimeFrame
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon"></i>
                                                        <i aria-hidden="true" class="fa fa-sort-desc down-caret" style="display: none;"></i>
                                                        <i aria-hidden="true" class="fa fa-sort-asc up-caret" style="display: none;"></i>
                                                    </div>
                                                    <span class="v-line"></span>
                                                    <div class="sortable-head col-sub-heading">
                                                        City
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon"></i>
                                                        <i aria-hidden="true" class="fa fa-sort-desc down-caret" style="display: none;"></i>
                                                        <i aria-hidden="true" class="fa fa-sort-asc up-caret" style="display: none;"></i>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="sortable-head col-sub-heading">
                                                        Realtor
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon"></i> <i aria-hidden="true" class="fa fa-sort-desc down-caret" style="display: none;"></i> <i aria-hidden="true" class="fa fa-sort-asc up-caret" style="display: none;"></i>
                                                    </div>
                                                    <span class="v-line"></span>
                                                    <div class="sortable-head col-sub-heading">
                                                        Status
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon"></i> <i aria-hidden="true" class="fa fa-sort-desc down-caret" style="display: none;"></i> <i aria-hidden="true" class="fa fa-sort-asc up-caret" style="display: none;"></i>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="sortable-head col-sub-heading">
                                                        Last Login
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon" style=""></i> <i aria-hidden="true" class="fa fa-sort-desc down-caret" style="display: none;"></i> <i aria-hidden="true" class="fa fa-sort-asc up-caret" style="display: none;"></i>
                                                    </div>
                                                    <span class="v-line"></span>
                                                    <div class="sortable-head col-sub-heading">
                                                        Login Count
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon"></i> <i aria-hidden="true" class="fa fa-sort-desc down-caret" style="display: none;"></i> <i aria-hidden="true" class="fa fa-sort-asc up-caret" style="display: none;"></i>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="sortable-head col-sub-heading">
                                                        Age
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon"></i> <i aria-hidden="true" class="fa fa-sort-desc down-caret" style="display: none;"></i> <i aria-hidden="true" class="fa fa-sort-asc up-caret" style="display: none;"></i>
                                                    </div>
                                                    <span class="v-line"></span>
                                                    Source
                                                </th>
                                                <th class="info-col">
                                                    <div class="sortable-head col-sub-heading">
                                                        Info
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon"></i>
                                                        <div class="sortMenu">
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-eye mr-4 aSortable"></i>
                                                                <i aria-hidden="true" class="fa fa-sort-alpha-asc order"></i> <i aria-hidden="true" class="fa fa-sort-alpha-desc order"></i>
                                                            </div>
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-bullhorn mr-4 aSortable"></i> <i aria-hidden="true" class="fa fa-sort-alpha-asc order"></i> <i aria-hidden="true" class="fa fa-sort-alpha-desc order"></i>
                                                            </div>
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-heart-o mr-4 aSortable"></i> <i aria-hidden="true" class="fa fa-sort-alpha-asc order"></i> <i aria-hidden="true" class="fa fa-sort-alpha-desc order"></i>
                                                            </div>
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-car mr-4 aSortable"></i> <i aria-hidden="true" class="fa fa-sort-alpha-asc order"></i> <i aria-hidden="true" class="fa fa-sort-alpha-desc order"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="sortable-head col-sub-heading">
                                                        Actions
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon"></i>
                                                        <div class="sortMenu" style="">
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-envelope-o mr-4 aSortable"></i>
                                                                <i aria-hidden="true" class="fa fa-sort-alpha-asc order"></i> <i aria-hidden="true" class="fa fa-sort-alpha-desc order"></i>
                                                            </div>
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-phone mr-4 aSortable"></i> <i aria-hidden="true" class="fa fa-sort-alpha-asc order"></i> <i aria-hidden="true" class="fa fa-sort-alpha-desc order"></i>
                                                            </div>
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-commenting-o mr-4 aSortable"></i> <i aria-hidden="true" class="fa fa-sort-alpha-asc order"></i> <i aria-hidden="true" class="fa fa-sort-alpha-desc order"></i>
                                                            </div>
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-sticky-note-o mr-4 aSortable"></i> <i aria-hidden="true" class="fa fa-sort-alpha-asc order"></i> <i aria-hidden="true" class="fa fa-sort-alpha-desc order"></i>
                                                            </div>
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-reply mr-4 aSortable"></i> <i aria-hidden="true" class="fa fa-sort-alpha-asc order"></i> <i aria-hidden="true" class="fa fa-sort-alpha-desc order"></i>
                                                            </div>
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-star mr-4 aSortable"></i> <i aria-hidden="true" class="fa fa-sort-alpha-asc order"></i> <i aria-hidden="true" class="fa fa-sort-alpha-desc order"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th id="follow_up">
                                                    <div class="sortable-head col-sub-heading">
                                                        Followup
                                                        <i aria-hidden="true" class="fa fa-sort sortable-icon"></i> <i aria-hidden="true" class="fa fa-sort-desc down-caret" style="display: none;"></i> <i aria-hidden="true" class="fa fa-sort-asc up-caret" style="display: none;"></i>
                                                    </div>
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" value="[object Object]"></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <span class="name lead"><a href="#" class="">RWS Dev</a></span>
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-question-circle-o"></i> <small>9818361595</small>
                                                            </div>
                                                            <div>
                                                                <i aria-hidden="true" class="fa fa-question-circle-o"></i> <small>pranav.ga.wri@gmail.com</small>
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
                                                                            <a href="#" title="Click for Properties Viewed"><i aria-hidden="true" class="fa fa-eye"></i> <small><sub>3</sub></small></a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="info-unit">
                                                                        <div>
                                                                            <a href="#" title="Favorite Properties"><i aria-hidden="true" class="fa fa-heart-o"></i> <small><sub>0</sub></small></a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="info-unit has-tooltip" aria-describedby="tooltip_2xmnz29knb">
                                                                        <div>
                                                                            <a href="#" title="Neighborhood Camps"><i aria-hidden="true" class="fa fa-home"></i> <small><sub> 0</sub></small></a>
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
                                                                            <a href="#" title="Listings / Alerts" class="position-relative">
                                                                                <i aria-hidden="true" class="fa fa-bullhorn" style="color: red !important;"></i> <small><sub>1</sub></small>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="info-unit">
                                                                        <div>
                                                                            <a href="#" title="Distance / Drivetime">
                                                                                <i aria-hidden="true" class="fa fa-car"></i> <small><sub> 0</sub></small>
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
                                                                            <a title="Click to see communications"><i aria-hidden="true" class="fa fa-envelope-o"></i> <small><sub>1</sub></small></a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="info-unit">
                                                                        <div>
                                                                            <a href="#" title="Click to see notes"><i aria-hidden="true" class="fa fa-sticky-note-o"></i> <small><sub>0</sub></small></a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="info-unit">
                                                                        <div>
                                                                            <a href="#" title="Click to see calls detail"><i aria-hidden="true" class="fa fa-phone"></i> <small><sub>0</sub></small></a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="info-unit">
                                                                        <div>
                                                                            <a title="Click to see replies"><i aria-hidden="true" class="fa fa-mail-reply"></i> <small><sub>0</sub></small></a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="info-unit">
                                                                        <div>
                                                                            <a href="#" title="Click to rate lead."><i aria-hidden="true" class="fa fa-star-o"></i> <small><sub>0</sub></small></a>
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
                        

                        @section('after_table')
                            @if(isset($extra_view))
                                @include($extra_view)
                            @endif
                        @show                       
                    </div>
                </div>
            </div>
        </div>          
    </div>
@endsection
