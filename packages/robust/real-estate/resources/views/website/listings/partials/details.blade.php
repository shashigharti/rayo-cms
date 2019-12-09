@set('properties',$result->property->pluck('value','type'))
<section class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col s7">
                <div class="list--inner--title">
                    <h4>{{strtoupper($result->city)}} {{strtoupper($result->status)}} REAL ESTATE</h4>
                    <p>{{$result->subdivision}} Subdivision</p>
                </div>
                <div class="head-list-info">
                    <ul>
                        @if(isset($result->bedrooms) && !in_array($result->bedrooms,['none','None','0']))
                            <li>
                                <span class="txt-num">{{$result->bedrooms}}</span><br>
                                <span class="txt-property">Bedrooms</span>
                            </li>
                        @endif
                        @if(isset($result->bathrooms) && !in_array($result->bathrooms,['none','None','0']))
                            <li>
                                <span class="txt-num">{{$result->bathrooms}}</span><br>
                                <span class="txt-property">Bathrooms</span>
                            </li>
                        @endif
                        @if(isset($result->total_finished_area) && !in_array($result->total_finished_area,['none','None','0']))
                            <li>
                                <span class="txt-num">{{$result->total_finished_area}}</span><br>
                                <span class="txt-property">Square Feet</span>
                            </li>
                        @endif
                        @if(isset($result->acres) && !in_array($result->acres,['none','None','0']))
                            <li>
                                <span class="txt-num">{{$result->acres}}</span><br>
                                <span class="txt-property">Acres</span>
                            </li>
                        @endif
                        @if(isset($result->year_built) && !in_array($result->year_built,['none','None','0']))
                            <li>
                                <span class="txt-num">{{$result->year_built}}</span><br>
                                <span class="txt-property">Year Built</span>
                            </li>
                        @endif
                        @if(isset($result->stories) && !in_array($result->stories,['none','None','0']))
                            <li>
                                <span class="txt-num">{{$result->stories}}</span><br>
                                <span class="txt-property">Stories</span>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="inner-list-tab">
                    <div class="row">
                        <div class="col s12">
                            <ul class="inner-list-tabs">
                                <li class="tab active"><a  href="#overview">Overview</a></li>
                                <li class="tab"><a  href="#distance">Distance/Drive Time</a></li>
                                <li class="tab"><a href="#calculator">Mortage Calculator</a></li>
                            </ul>
                        </div>
                        <div id="overview" class="col s12 overview-slider ">
                            <div class="slider-for owl-carousel owl-theme">
                                @forelse($result->images as $image)
                                   <div class="item">
                                       <img src="{{$image->listing_url}}" alt="{{$image->listing_id}}">
                                   </div>
                                @empty
                                @endforelse
                            </div>
{{--                            <div class="slider-nav">--}}
{{--                                @forelse($result->images as $image)--}}
{{--                                    <div><img src="{{$image->listing_url}}" alt="{{$image->listing_id}}"></div>--}}
{{--                                @empty--}}
{{--                                @endforelse--}}
{{--                                <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>--}}
{{--                                <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button>--}}
{{--                            </div>--}}
                        </div>
                        <div id="distance" class="col s12">
                            <p> <b class="font-size16">Calculate distance and drive time from your location to:</b> <br> <b class="font-size16">5817 Pinetree   ,  Panama City Beach   FL  </b> </p>
                            <div class="get-distance-container">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"  placeholder="destination address ... ">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-default get-distance" type="button">Get distance</button>
                                    </div>
                                </div>
                                <div class="map--block">
                                    <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.org">embedgooglemap.org</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
                                </div>
                            </div>
                        </div>
                        <div id="calculator" class="col s12">
                            <div id="m-calculator">
                                <form id="homenote" role="form" class="well">
                                    <div class="form-group">
                                        <label for="purchasePrice">Purchase Price ($)</label>
                                        <input type="text" class="form-control" id="purchasePrice" value=" 249,000 ">
                                    </div>
                                    <div class="form-group">
                                        <label for="downPayment">Down Payment</label>
                                        <input type="text" class="form-control" id="dpamount" value="20%">
                                    </div>
                                    <label class="radio-inline">
                                        <input type="radio" name="dptype" id="downpercentage" value="percentage" checked="">Percent (%)
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="dptype" id="downlump" value="downlump">Dollars ($)</label>

                                    <div class="form-group">
                                        <label for="rate">Rate (%)</label>
                                        <input type="text" class="form-control" id="rate" value="5.0">
                                    </div>
                                    <div class="form-group">
                                        <label for="rate">Term</label>
                                        <input type="text" class="form-control" id="term" value="30">
                                    </div>
                                    <label class="radio-inline">
                                        <input type="radio" name="termtype" id="years" value="years" checked="">Years
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="termtype" id="months" value="months">Months
                                    </label>
                                    <button type="submit" class="btn btn-primary btn-block" id="calchomenote">Calculate</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jssocials ">
                    <p>
                        <b>Share this house:</b>
                    </p>
                    <div id="share">
                        <div class="jssocials-shares">
                            <div class="jssocials-share jssocials-share-twitter">
                                <a target="_blank" href="#" class="jssocials-share-link">
                                    <i class="fa fa-twitter jssocials-share-logo"></i>
                                    <span class="jssocials-share-label">Tweet</span>
                                </a>
                            </div>
                            <div class="jssocials-share jssocials-share-facebook">
                                <a target="_blank" href="#" class="jssocials-share-link">
                                    <i class="fa fa-facebook jssocials-share-logo"></i>
                                    <span class="jssocials-share-label">Like</span>
                                </a>
                            </div>
                            <div class="jssocials-share jssocials-share-linkedin">
                                <a target="_blank" href="#" class="jssocials-share-link">
                                    <i class="fa fa-linkedin jssocials-share-logo"></i>
                                    <span class="jssocials-share-label">Share</span>
                                </a>
                            </div>
                            <div class="jssocials-share jssocials-share-pinterest">
                                <a target="_blank" href="#" class="jssocials-share-link">
                                    <i class="fa fa-pinterest jssocials-share-logo"></i>
                                    <span class="jssocials-share-label">Pin it</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s5">
                <div class="top more-inner">
                    <a href="#" class="single--listing--button_back left btn btn-list-back" role="button">
                        <i class="material-icons">keyboard_backspace</i>
                        </span>Return To All Listings </a>
                    <div class="right txt-price"> $ <span class="single-listing-price"> {{$result->system_price}}</span> </div>
                </div>
                <div class="more-inner">
                    <div class="detail-block">
                        <p class="title-detail"> Description </p>
                        <div class="clearfix txt-descript">
                            <div class="content-descript">
                                <p> Perfect location only 3 blocks from the beach and 2 blocks from the boat ramp. Welcome to The Great Escape! This 2 bedroom 2 bath w/ bunk room has everything you need for the perfect vacation rental or the home away from home. Open concept floor plan as you walk through the front door.<a href="#">show more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="detail-block">
                        <p class="title-detail"> Property Details </p>
                        <div class="clearfix txt-descript">
                            <table class="table table-striped">
                                <tbody>
                                @if(isset($result->system_price) && !in_array($result->system_price,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Asking Price </td>
                                        <td >$ {{$result->system_price}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->class) && !in_array($result->class,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Property Type </td>
                                        <td >{{$result->class}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->bedrooms) && !in_array($result->bedrooms,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Bedrooms </td>
                                        <td >{{$result->bedrooms}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->baths_full) && !in_array($result->baths_full,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Full Baths </td>
                                        <td >{{$result->bedrooms}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->total_finished_area) && !in_array($result->total_finished_area,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Square Footage </td>
                                        <td >{{$result->total_finished_area}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->year_built) && !in_array($result->year_built,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Year Built  </td>
                                        <td >{{$result->year_built}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->lot_size) && !in_array($result->lot_size,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Lot Size  </td>
                                        <td >{{$result->lot_size}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->style) && !in_array($result->style,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Style  </td>
                                        <td >{{$result->style}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->stories) && !in_array($result->stories,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Stories  </td>
                                        <td >{{$result->stories}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->garage_desc) && !in_array($result->garage_desc,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Garage  </td>
                                        <td >{{$result->garage_desc}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->parking) && !in_array($result->parking,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Parking  </td>
                                        <td >{{$result->parking}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->acres) && !in_array($result->acres,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Acres  </td>
                                        <td >{{$result->acres}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->uid) && !in_array($result->uid,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> MLS Number  </td>
                                        <td >#{{$result->uid}} </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix btn-social-detail">
                            <div class="row print-hide">
                                @set('href',Auth::check() ? route('website.realestate.leads.favourites',['id' => $result->id]) : '#registermodal')
                                <div class="col s6 right-align padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger">
                                        <i class="material-icons">star</i></span> Save to Favorites
                                    </a>
                                </div>
                                @set('href',Auth::check() ? '#emailModal' : '#registermodal')
                                <div class="col s6 padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger">
                                        <i class="material-icons">email</i></span> Email a friend
                                    </a>
                                </div>
                                @set('href',Auth::check() ? route('website.realestate.leads.requests',['id' => $result->id]) : '#registermodal')
                                <div class="col s6 right-align padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="schedule--viewing btn btn-success left-button not_authenticated modal-trigger"> Schedule a Viewing </a>
                                </div>
                                @set('href',Auth::check() ? '#noteModal' : '#registermodal')
                                <div class="col s6 padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger"> Rate Property/My Notes </a>
                                </div>
                                @set('href',Auth::check() ? '#infoModal' : '#registermodal')
                                <div class="col s6 right-align padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger"> Get more Property Info </a>
                                </div>
                                <div class="col s6 padding-left-0 padding-right-0">
                                    <a href='#' class="btn btn-success left-button not_authenticated modal-trigger"> Print this listing </a>
                                </div>
                                <div class="col s6 right-align padding-left-0 padding-right-0">
                                    <a href='#' class="btn btn-success left-button not_authenticated modal-trigger"> Email if Property Sells </a>
                                </div>
                                <div class="col s6 padding-left-0 padding-right-0">
                                    <a href='#' class="btn btn-success left-button not_authenticated modal-trigger"> Email Price Changes </a>
                                </div>
                                @set('href',Auth::check() ? route('website.realestate.listings.similar',['type' => 'zip_id','value' => $result->zip_id,'id'=>$result->id]) : '#registermodal')
                                <div class="col s6 right-align padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger">Show Similar Priced Props in this zip </a>
                                </div>
                                @set('href',Auth::check() ? route('website.realestate.listings.similar',['type' => 'subdivision_id','value' => $result->subdivision_id,'id'=>$result->id]) : '#registermodal')
                                <div class="col s6 padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger">Show other props in subdivision</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="more-property-detail">
                <div class="col s12" >
                    <h3 class="title-more-detail">More Property Details </h3>
                </div>
                <div class="more-property-detail-content">
                    @foreach($details as $title => $detail)
                        <div class="col s4">
                            <div class="more-inner">
                                <div class="detail-block">
                                <p class="title-detail">{{$title}} </p>
                                <div class="clearfix txt-descript">
                                    <table class="table table-striped">
                                        <tbody>
                                            @foreach($detail as $field)
                                                @set('name',$field['name'])
                                                @if(in_array($title,['School Information']))
                                                    @if(isset($properties[$name]) && !in_array($properties[$name],['none','0','Undefined','None']))
                                                        <tr>
                                                            <td>{{$field['display']}}</td>
                                                            <td>{{$properties[$name]}}</td>
                                                        </tr>
                                                    @endif
                                                @else
                                                    @if(isset($properties[$name]) && !in_array($properties[$name],['none','0','Undefined','None']))
                                                        <tr>
                                                            <td>{{$field['display']}}</td>
                                                            <td>{{$properties[$name]}}</td>
                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@if(Auth::check())
<div id="emailModal" class="modal">
    <form method="post" id="email-form" action="" data-url="{{route('website.realestate.email.friend',['id' => $result->id])}}">
        @csrf
        <div class="row modal-header">
            <button type="button" class="modal-close"> <span>×</span> </button>
            <h4 class="modal-title">Show {{$result->listing_name}} To A Friend</h4>
        </div>
        <div class="modal-content">
            <div class="form-group row">
                <label>Send To Email:</label>
                <input type="email" name="email_to" class="form-control" value="" placeholder="" required="">
            </div>
            <div class="form-group row">
                <label>Subject:</label>
                <p>Check out this interesting property</p>
            </div>
            <div class="form-group row">
                <label>Message:</label>
                <p>I found a property at {{$result->listing_name}} . Asking Price {{$result->system_price}}$</p>
                @if($result->images() && $result->images()->first())
                    @set('first_image',$result->images()-first())
                    <img src="{{$first_image->listing_url}}" alt="">
                @endif
            </div>
            <div class="form-group row">
                <textarea  name="message" class="form-control" placeholder="Type your message here" required=""></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> <div class="loader-01"></div> Submit </button>
        </div>
    </form>
</div>

<div id="noteModal" class="modal">
    <form method="post" action="" data-url="{{route('website.realestate.leads.notes')}}">
        @csrf
        <div class="row modal-header">
            <button type="button" class="modal-close"> <span>×</span> </button>
            <h4 class="modal-title">Add Note to Listing</h4>
        </div>
        <div class="modal-content">
            <div class="form-group row">
                <textarea type="text" name="note"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit </button>
        </div>
    </form>
</div>
<div id="infoModal" class="modal">
    <form method="post" id="info-form" action="" data-url="{{route('website.realestate.email.agent',['id'=>$result->id])}}">
        @csrf
        <div class="row modal-header">
            <button type="button" class="modal-close"> <span>×</span> </button>
            <h4 class="modal-title">Show {{$result->listing_name}} To A Agent</h4>
        </div>
        <input type="text" hidden value="{{$result->id}}" name="listing_id">
        <div class="modal-content">
            <div class="form-group row">
                <label>Subject:</label>
                <p>Send me more info about this listing</p>
            </div>
            <div class="form-group row">
                <label>Message:</label>
                <p>Please send me more info about {{$result->listing_name}} . Asking Price {{$result->system_price}}$</p>
                @if($result->images() && $result->images()->first())
                    @set('first_image',$result->images()-first())
                    <img src="{{$first_image->listing_url}}" alt="">
                @endif
            </div>
            <div class="form-group row">
                <textarea  name="message" class="form-control" placeholder="Comments or Questions" required=""></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> <div class="loader-01"></div> Submit </button>
        </div>
    </form>
</div>
@endif
