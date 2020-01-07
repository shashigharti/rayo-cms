@extends('core::admin.layouts.default') @section('content') @set('ui', new $ui)
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
                            <h5 class="center-align">No. of Active Users</h5>
                            <div class="statistics__block-single card center-align">
                                <h6 class="title">Today</h6>
                                <p class="price">Active Users</p>
                                <p class="count">435</p>
                                <a href="#">Send Follow Up</a>
                                <button class="btn theme-btn">More Details</button>
                            </div>
                            <div class="statistics__block-single card center-align">
                                <h6 class="title">Weekly</h6>
                                <p class="price">Active Users</p>
                                <p class="count">435</p>
                                <a href="#">Send Follow Up</a>
                                <button class="btn theme-btn">More Details</button>
                            </div>
                            <div class="statistics__block-single card center-align">
                                <h6 class="title">Monthly</h6>
                                <p class="price">Active Users</p>
                                <p class="count">435</p>
                                <a href="#">Send Follow Up</a>
                                <button class="btn theme-btn">More Details</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s8">
                                <div class="panel card shortcuts__block center-align">
                                    <h5 class="title">Quick Links</h5>
                                    <div class="shortcuts__block-single blue">
                                        <i class="material-icons">
                                                pages
                                            </i>
                                        <p>Pages</p>
                                    </div>
                                    <div class="shortcuts__block-single amber">
                                        <i class="material-icons">
                                                show_chart
                                            </i>
                                        <p>Pages</p>
                                    </div>
                                    <div class="shortcuts__block-single red">
                                        <i class="material-icons">
                                                settings
                                            </i>
                                        <p>Settings</p>
                                    </div>
                                    <div class="shortcuts__block-single green">
                                        <i class="material-icons">
                                                supervisor_account
                                            </i>
                                        <p>Agents</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s4">
                                <div class="panel card top__block">
                                    <h5>Top Active Users</h5>
                                    <p>John Mathew</p>
                                    <p>John Mathew</p>
                                    <p>John Mathew</p>
                                    <p>John Mathew</p>
                                    <p>John Mathew</p>
                                    <a href="#">View All</a>
                                </div>
                                <div class="panel card top__block">
                                    <h5>Top Active Agents</h5>
                                    <p>John Mathew</p>
                                    <p>John Mathew</p>
                                    <p>John Mathew</p>
                                    <p>John Mathew</p>
                                    <p>John Mathew</p>
                                    <a href="#">View All</a>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s3">
                        <div class="panel card properties__block center-align">
                            <h5>Total Properties</h5>
                            <span class="count">987</span>
                            <p>pulled today</p>
                        </div>
                        <div class="panel card totalcount__block">
                            <div class="totalcount__block--single">
                                <h5>81</h5>
                                <p>Total Number of Users</p>
                            </div>
                            <div class="totalcount__block--single">
                                <h5>200</h5>
                                <p>Total Number of Email</p>
                            </div>
                            <div class="totalcount__block--single">
                                <h5>650</h5>
                                <p>Total Number of Homes For Sale</p>
                            </div>
                            <div class="totalcount__block--single">
                                <h5>900</h5>
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
