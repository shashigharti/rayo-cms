<section class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col s12">
                <div class="inner--main--title center-align">
                    <h1>OAHU HI SOLD REAL ESTATE</h1>
                </div>
                <div class="top--breadcrumb center-align">
                    <span><a href="#">493 Homes For Sale</a></span>
                    <span>/</span>
                    <span><a href="#">14030 Sold Homes</a></span>
                    <span>/</span>
                    <span><a href="#" class="active">486 Subdivisions</a></span>
                </div>

                @include(Site::templateResolver('real-estate::website.listings.partials.search'))
            </div>
        </div>
        <div class="search--main--content">
            <div class="search--left--section">
                <div class="listing--houses">
                    <div class="row">
                        @forelse($results as $result)
                            <a href="{{route('website.realestate.single',['id' => $result->id,'name' => $result->listing_slug])}}">
                                <div class="col s3">
                                    <div class="single--list--block">
                                        @set('first_image',$result->images()->first())
                                        <img src={{$first_image ? $first_image->listing_url :  ''}}>
                                        <div class="list--overlay">
        									<span class="tag active">
        										@if(isset($result->status) && !in_array($result->status,['none','None','0']))
                                                    {{$result->status}}  {{$result->system_price}}
                                                @endif
        									</span>
                                            <span class="fav">
        										<i class="fa fa-heart"></i>
        									</span>
                                            <div class="bottom--detail">
                                                <h3 class="price">
                                                    @if(isset($result->system_price) && !in_array($result->system_price,['none','None']))
                                                        {{$result->status}}
                                                    @endif
                                                </h3>
                                                <p class="info">
                                                    @if(isset($result->address_street) && !in_array($result->address_street,['none','None','0']))
                                                        {{$result->address_street}}
                                                    @endif
                                                    @if(isset($result->city) && !in_array($result->city,['none','None','0']))
                                                        {{$result->city}}
                                                    @endif
                                                    @if(isset($result->state) && !in_array($result->state,['none','None','0']))
                                                        {{ ' | '.$result->state}}
                                                    @endif
                                                    @if(isset($result->county) && !in_array($result->county,['none','None','0']))
                                                        {{ ' | '.$result->county}}
                                                    @endif
                                                </p>
                                                <span>
                                                @if(isset($result->year_built) && !in_array($result->year_built,['none','None','0']))
                                                        {{ 'Built in '.$result->year_built}}
                                                    @endif
                                            </span>

                                                <span>
                                                @if(isset($result->total_finished_area) && !in_array($result->total_finished_area,['none','None','0']))
                                                        {{' | '. $result->total_finished_area .' sq.ft'}}
                                                    @endif
                                            </span>
                                                <div class="details">
                                                <span>
                                                    @if(isset($result->bedrooms) && !in_array($result->bedrooms,['none','None','0']))
                                                        <img src="/assets/website/images/bed.png" alt="Bed">{{ $result->bedrooms}}
                                                    @endif
                                                </span>
                                                    <span class="center-align">
                                                    @if(isset($result->baths_full) && !in_array($result->baths_full,['none','None','0']))
                                                            <img src="/assets/website/images/bathtub.png" alt="Bathtub">{{ $result->baths_full}}
                                                        @endif
                                                </span>
                                                    <span class="right-align">
                                                    @if(isset($result->picture_count) && !in_array($result->picture_count,['none','None','0']))
                                                            <img src="/assets/website/images/camera.png" alt="Picture">{{ $result->picture_count}}
                                                        @endif
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="listing--report">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="page--sub--title">OHAU MARKET REPORTS</h4>
                        </div>
                        <div class="col s12">
                            <div class="single--report--block">
                                <span class="main-info">293</span>
                                <p>Propertes for sale (Today's date)</p>
                            </div>
                            <div class="single--report--block">
                                <span class="main-info">293</span>
                                <p>Propertes for sale (Today's date)</p>
                            </div>
                            <div class="single--report--block">
                                <span class="main-info">293</span>
                                <p>Propertes for sale (Today's date)</p>
                            </div>
                            <div class="single--report--block">
                                <span class="main-info">293</span>
                                <p>Propertes for sale (Today's date)</p>
                            </div>
                            <div class="single--report--block">
                                <span class="main-info">293</span>
                                <p>Propertes for sale (Today's date)</p>
                            </div>
                            <div class="single--report--block">
                                <span class="main-info">293</span>
                                <p>Propertes for sale (Today's date)</p>
                            </div>
                            <div class="single--report--block">
                                <span class="main-info">293</span>
                                <p>Propertes for sale (Today's date)</p>
                            </div>
                            <div class="single--report--block">
                                <span class="main-info">293</span>
                                <p>Propertes for sale (Today's date)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment--section">
                    <div class="row">
                        <div class="col s12">
                            <p>With subdivision Info being few and far between on the Internet, our members are encouraged to share useful information.</br>

                                If you live in Bellaire Heights Ph 5 or have information that will help others make home buying or selling decisions here, please share it with us!</p>
                            <textarea class="text-left">Write your comment here..
        							</textarea>
                            <div>
                                <input type="checkbox">
                                <span>Allow other members to contact me with questions</span>
                            </div>
                            <a href="#" class="btn theme-btn">Add Comment</a>
                        </div>
                    </div>
                </div>
                <div class="area--list--block">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="page--sub--title">OHAU MARKET REPORTS</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                        <div class="col s3">
                            <a href="#">All Anchorage Real Estate Prices</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 bottom-text">
                            <p>Search homes for sale in the Greater Anchorage Area. Real Estate Listings include large photos, virtual tours, Google Maps and more.This website includes all the MLS Property Listings in Anchorage, Eagle River, Chugiak/Peters Creek, Girdwood, Palmer, Wasilla.</p>
                            <p>
                                If you currently own real estate and are looking to research the Anchorage Area Real Estate Market, this site contains information about Anchorage Sold Property Listings giving you the
                                actual prices that homes and real estate sold for.
                            </p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="search--right--section change" id="thebar">
                    <a href="javascript:void(0)" class="right-icon bar-open">
                        <i class="arrow material-icons">keyboard_arrow_right</i>
                    </a>
                    <div class="right--single--block">
                        <div class="map">
                            <div class="gmap_canvas"><iframe width="330" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.crocothemes.net"></a>
                            </div>
                        </div>
                        <div class="intro--section">
                            <h3>Ohau hi sold real state</h3>
                            <p>Search homes for sale in the Greater Anchorage Area. Real Estate LIstings include large photos, virtual tours.</p>
                        </div>
                        <div class="data--section intro--section">
                            <h3>Sales activity in 2017 "15-Eucalyptus Hill" Subdivision</h3>
                            <table>
                                <tr>
                                    <td colspan="3"><label>Properties for sale(Today's date)</label></td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><label>Properties for sale(Today's date)</label></td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><label>Properties for sale(Today's date)</label></td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><label>Properties for sale(Today's date)</label></td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><label>Properties for sale(Today's date)</label></td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><label>Properties for sale(Today's date)</label></td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><label>Properties for sale(Today's date)</label></td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><label>Properties for sale(Today's date)</label></td>
                                    <td>14</td>
                                </tr>
                            </table>
                        </div>
                        <div class="comment--section">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>With subdivision Info being few and far between on the Internet, our members are encouraged to share useful information.</br>

                                    If you live in Bellaire Heights Ph 5 or have information that will help others make home buying or selling decisions here, please share it with us!</p>
                                    <textarea class="text-left">Write your comment here..
                                    </textarea>
                                    <div>
                                        <input type="checkbox">
                                        <span>Allow other members to contact me with questions</span>
                                    </div>
                                    <a href="#" class="btn theme-btn">Add Comment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
