@extends('core::admin.layouts.default') @section('content') @set('ui', new $ui)
@inject('activity_helper','Robust\Admin\Helpers\UserActivityHelper')
@inject('dashboard_helper','Robust\Core\Helpers\DashboardHelper')
<div id="main" class="page {{$title}}">
    <div class="row">
        <div class="container">
            <div class="row breadcrumbs-inline" id="breadcrumbs-wrapper">
                {!! Breadcrumb::getInstance()->render() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="row">
                    <div class="col s9">
                        <div class="panel card statistics__block">
                            @set('active_users',$activity_helper->getActiveUsersByDate('logged-in'))
                            <h5 class="center-align">No. of Active Users</h5>
                            <div class="statistics__block-single card center-align">
                                <h6 class="title">Today</h6>
                                <p class="price">Active Users</p>
                                <p class="count">{{$active_users['today']}}</p>
                                <a href="{{route('admin.leads.index')}}">Send Follow Up</a>
                                <a href="{{route('admin.leads.index')}}">
                                    <button class="btn theme-btn">
                                        More Details
                                    </button>
                                </a>
                            </div>
                            <div class="statistics__block-single card center-align">
                                <h6 class="title">Weekly</h6>
                                <p class="price">Active Users</p>
                                <p class="count">{{$active_users['week']}}</p>
                                <a href="{{route('admin.leads.index')}}">Send Follow Up</a>
                                <a href="{{route('admin.leads.index')}}">
                                    <button class="btn theme-btn">
                                        More Details
                                    </button>
                                </a>
                            </div>
                            <div class="statistics__block-single card center-align">
                                <h6 class="title">Monthly</h6>
                                <p class="price">Active Users</p>
                                <p class="count">{{$active_users['month']}}</p>
                                <a href="{{route('admin.leads.index')}}">Send Follow Up</a>
                                <a href="{{route('admin.leads.index')}}">
                                    <button class="btn theme-btn">
                                        More Details
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <div class="panel card emaildetail__block ">
                                    <div class="icon-block cyan">
                                    </div>
                                    <div class="detail">
                                        <p>Total Single Listing Viewed</p>
                                        <h6 class="green-c">{{$activity_helper->getCountBySlug('listing-viewed')}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="panel card emaildetail__block ">
                                    <div class="icon-block green">
                                    </div>
                                    <div class="detail ">
                                        <p>Total Distance Calculated</p>
                                        <h6 class="red-c">{{$activity_helper->getCountBySlug('calculated-distance')}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="panel card emaildetail__block ">
                                    <div class="icon-block red">
                                    </div>
                                    <div class="detail ">
                                        <p>Total Listings</p>
                                        <h6 class="red-c">{{$dashboard_helper->totalListing()}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="panel card emaildetail__block ">
                                    <div class="icon-block orange">
                                    </div>
                                    <div class="detail">
                                        <p>Newly Added Listing </p>
                                        <h6 class="orange-c">{{$dashboard_helper->newListing()}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col s8 mt-2">
                                <div class="panel card shortcuts__block center-align">
                                    <h5 class="title">Quick Links</h5>
                                    <a href="{{route('admin.pages.index')}}">
                                        <div class="shortcuts__block-single blue">
                                            <i class="material-icons">
                                                pages
                                            </i>
                                            <p>Pages</p>
                                        </div>
                                    </a>
                                    <a href="{{route('admin.leads.index')}}">
                                        <div class="shortcuts__block-single amber">
                                            <i class="material-icons">
                                                show_chart
                                            </i>
                                            <p>Leads</p>
                                        </div>
                                    </a>
                                    <a href="{{route('admin.settings.edit', 'app-setting')}}">
                                        <div class="shortcuts__block-single red">
                                            <i class="material-icons">
                                                settings
                                            </i>
                                            <p>Settings</p>
                                        </div>
                                    </a>
                                    <a href="{{route('admin.agents.index')}}">
                                        <div class="shortcuts__block-single green">
                                            <i class="material-icons">
                                                supervisor_account
                                            </i>
                                            <p>Agents</p>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="col s4 mt-2">
                                <div class="panel card top__block">
                                    <h5>Recent Active Leads</h5>
                                    @foreach($activity_helper->getRecentByslug('logged-in') as $recent)
                                        @set('member',$recent->user->memberable)
                                        <p>{{$member->first_name}} {{$member->last_name}}</p>
                                    @endforeach
                                    <a href="{{route('admin.leads.index')}}">View All</a>
                                </div>
                                <div class="panel card top__block">
                                    <h5>New Leads</h5>
                                    @foreach($activity_helper->getRecentByslug('registered') as $recent)
                                        @set('member',$recent->user->memberable)
                                        <p>{{$member->first_name}} {{$member->last_name}}</p>
                                    @endforeach
                                    <a href="{{route('admin.agents.index')}}">View All</a>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s3">
                        <div class="panel card properties__block center-align">
                            <h5>Total Properties</h5>
                            <span class="count">{{$dashboard_helper->totalNewListings()}}</span>
                            <p>pulled today</p>
                        </div>
                        <div class="panel card totalcount__block">
                            <div class="totalcount__block--single">
                                <h5>{{$dashboard_helper->totalLeads()}}</h5>
                                <p>Total Number of Leads</p>
                            </div>
                            <div class="totalcount__block--single">
                                <h5>{{$dashboard_helper->totalEmailsSent()}}</h5>
                                <p>Total Number of Email</p>
                            </div>
                            <div class="totalcount__block--single">
                                <h5>{{$dashboard_helper->totalListingsByStatus(settings('real-estate','active'))}}</h5>
                                <p>Total Number of Homes For Sale</p>
                            </div>
                            <div class="totalcount__block--single">
                                <h5>{{$dashboard_helper->totalListingsByStatus(settings('real-estate','sold'))}}</h5>
                                <p>Total Number of Homes Sold</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
