@set('properties',$result->property->pluck('value','type'))
@set('city',$location_helper->getLocation($result->city_id))
@set('zip',$location_helper->getLocation($result->zip_id))
@set('subdivision',$location_helper->getLocation($result->subdivision_id))
@set('image',$result->images ? $result->images->first() : null)
@set('lead',isLead())
<section class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col m7 s12">
                <div class="list--inner--title">
                    <h4>{{$city ? $city->name : ''}} {{strtoupper($result->status)}} REAL ESTATE</h4>
                    <p>{{$subdivision ? $subdivision->name : ''}} Subdivision</p>
                </div>
                <div class="head-list-info">
                    <ul>
                        @if(isset($result->bedrooms) && !in_array($result->bedrooms,['none','None','0']))
                            <li>
                                <span class="txt-num">{{$result->bedrooms}}</span><br>
                                <span class="txt-property">Bedrooms</span>
                            </li>
                        @endif
                        @if(isset($result->baths_full) && !in_array($result->baths_full,['none','None','0']))
                            <li>
                                <span class="txt-num">{{$result->baths_full}}</span><br>
                                <span class="txt-property">Bathrooms</span>
                            </li>
                        @endif
                        @if(isset($properties['total_square_feet']))
                            <li>
                                <span class="txt-num">{{$properties['total_square_feet']}}</span><br>
                                <span class="txt-property">Square Feet</span>
                            </li>
                        @endif
                        @if(isset($properties['year_built']))
                            <li>
                                <span class="txt-num">{{$properties['year_built']}}</span><br>
                                <span class="txt-property">Year Built</span>
                            </li>
                        @endif
                        @if(isset($properties['stories']))
                            <li>
                                <span class="txt-num">{{$properties['stories']}}</span><br>
                                <span class="txt-property">Stories</span>
                            </li>
                        @endif
                    </ul>
                </div>

                @include('core::website.listings.partials.tabs')
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
            <div class="col m5 s12">
                <div class="top more-inner">
                    @if($lead)
                        @set('bookmarked',$lead->bookmarks ? $lead->bookmarks()->where('title',$result->name)->first() : null)
                        <a href="{{$bookmarked ? route('website.realestate.leads.bookmarks.delete',['id'=>$bookmarked->id]) : route('website.realestate.leads.bookmarks',['title'=>$result->name])}}"
                           class="single--listing--button_back left btn btn-list-back mr-4" role="button">
                            <i class="material-icons">bookmark</i>
                            <span>
                               {{$bookmarked ? 'Remove Bookmark' : 'Bookmark this page'}}
                            </span>
                        </a>
                    @endif
                    <a href="{{url()->previous()}}" class="single--listing--button_back left btn btn-list-back" role="button">
                        <i class="material-icons">keyboard_backspace</i>
                        </span>Return To All Listings </a>
                    <div class="right txt-price"> $ <span class="single-listing-price"> {{$result->system_price}}</span> </div>
                </div>
                <div class="more-inner">
                    <div class="detail-block">
                        <p class="title-detail"> Remarks </p>
                        <div class="clearfix txt-descript">
                            <div class="content-descript">
                                <p>{{$properties['public_remarks'] ?? ''}}</p>
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
                                @if(isset($properties['property_type']))
                                    <tr class="txt-descript-bold">
                                        <td> Property Sub-type </td>
                                        <td >{{$properties['property_type']}} </td>
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
                                        <td >{{$result->baths_full}} </td>
                                    </tr>
                                @endif
                                @if(isset($properties['total_square_feet']))
                                    <tr class="txt-descript-bold">
                                        <td> Square Footage </td>
                                        <td >{{$properties['total_square_feet']}} </td>
                                    </tr>
                                @endif
                                @if(isset($result->year_built) && !in_array($result->year_built,['none','None','0']))
                                    <tr class="txt-descript-bold">
                                        <td> Year Built  </td>
                                        <td >{{$result->year_built}} </td>
                                    </tr>
                                @endif
                                @if(isset($properties['lot_size']))
                                    <tr class="txt-descript-bold">
                                        <td> Lot Size  </td>
                                        <td >{{$properties['lot_size']}} </td>
                                    </tr>
                                @endif
                                @if(isset($properties['stories']))
                                    <tr class="txt-descript-bold">
                                        <td> Stories  </td>
                                        <td >{{$properties['stories']}} </td>
                                    </tr>
                                @endif
                                @if(isset($properties['garage_spaces']))
                                    <tr class="txt-descript-bold">
                                        <td> Garage  </td>
                                        <td >{{$properties['garage_spaces']}} </td>
                                    </tr>
                                @endif
                                @if(isset($properties['parking']))
                                    <tr class="txt-descript-bold">
                                        <td> Parking  </td>
                                        <td >{{$properties['parking']}} </td>
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
                                @set('href',$lead ? route('website.realestate.leads.favourites',['id' => $result->id]) : '#registermodal')
                                @if($lead)
                                    @set('favourite',$lead->favourites ? $lead->favourites->where('id',$result->id)->first() : null)
                                    <div class="col m6 s12 right-align padding-left-0 padding-right-0">
                                        <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger">
                                            <i class="material-icons">star</i></span> {{$favourite ? 'Favourite' : 'Save to Favorites'}}
                                        </a>
                                    </div>
                                @endif
                                @set('href',$lead ? '#emailModal' : '#registermodal')
                                <div class="col m6 s12 padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger">
                                        <i class="material-icons">email</i></span> Email a friend
                                    </a>
                                </div>
                                @set('href',$lead ? route('website.realestate.leads.requests',['id' => $result->id]) : '#registermodal')
                                <div class="col m6 s12 right-align padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="schedule--viewing btn btn-success left-button not_authenticated modal-trigger"> Schedule a Viewing </a>
                                </div>
                                @set('href',$lead ? '#noteModal' : '#registermodal')
                                <div class="col m6 s12 padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger"> Rate Property/My Notes </a>
                                </div>
                                @set('href',$lead ? '#infoModal' : '#registermodal')
                                <div class="col m6 s12 right-align padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger"> Get more Property Info </a>
                                </div>

                                @set('href',$lead ? '#' : '#registermodal')
                                @set('printer_class',Auth::check() ? 'printer-trigger' : 'modal-trigger')
                                <div class="col m6 s12 padding-left-0 padding-right-0">
                                    <a href='{{route('website.realestate.print',['slug' => $result->slug])}}' target="_blank" class="btn btn-success left-button not_authenticated"> Print this listing </a>
                                </div>
                                <div class="col m6 s12 right-align padding-left-0 padding-right-0">
                                    <a href='#' class="btn btn-success left-button not_authenticated {{$printer_class}}"> Email if Property Sells </a>
                                </div>
                                <div class="col m6 s12 padding-left-0 padding-right-0">
                                    <a href='#' class="btn btn-success left-button not_authenticated modal-trigger"> Email Price Changes </a>
                                </div>
                                @set('href',$lead ? route('website.realestate.homes-for-sale',['location_type'=>'zips','location'=>$zip->name]) : '#registermodal')
                                <div class="col m6 s12 right-align padding-left-0 padding-right-0">
                                    <a href='{{$href}}' class="btn btn-success left-button not_authenticated modal-trigger">Show Similar Priced Props in this zip </a>
                                </div>
                                @set('href',$lead ? route('website.realestate.homes-for-sale',['location_type'=>'subdivisions','location'=>$subdivision->name]) : '#registermodal')
                                <div class="col m6 s12 padding-left-0 padding-right-0">
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
                    @if(isset($details))
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
                                                    @if(isset($properties[$name]))
                                                        <tr>
                                                            <td>{{$field['display']}}</td>
                                                            <td>{{$properties[$name]}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                        <div class="col s4">
                            <div class="more-inner">
                                <div class="detail-block">
                                    <p class="title-detail">School Info</p>
                                    <div class="clearfix txt-descript">
                                        <table class="table table-striped">
                                            <tbody>
                                            @if(isset($result->elementary_school_id))
                                                @set('school_name',$location_helper->getLocation($result->elementary_school_id))
                                                <tr>
                                                    <td>Elementary</td>
                                                    <td>{{$school_name->name}}</td>
                                                </tr>
                                            @endif
                                            @if(isset($result->middle_school_id))
                                                @set('school_name',$location_helper->getLocation($result->middle_school_id))
                                                <tr>
                                                    <td>Middle</td>
                                                    <td>{{$school_name->name}}</td>
                                                </tr>
                                            @endif
                                            @if(isset($result->high_school_id))
                                                @set('school_name',$location_helper->getLocation($result->high_school_id))
                                                <tr>
                                                    <td>High</td>
                                                    <td>{{$school_name->name}}</td>
                                                </tr>
                                            @endif
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
</section>
<section class="similar_properties">
   <div class="container-fluid single_similar-properties">
       <div class="col s12" >
           <h3 class="title-more-detail">Similar Properties</h3>
       </div>
       <div class="listing--houses">
           <div class="row">
               @forelse($similars as $result)
                   @set('properties',$result->property->pluck('value','type'))
                   @set('image',$result->images ? $result->images->first() : null)
                   <a href="{{route('website.realestate.single',['slug' => $result->slug])}}">
                       <div class="col m3 s12">
                           <div class="single--list--block">
                               <img
                                   src={{$image ? $image->url :  ''}} alt="{{$result->address_street}} {{$location_helper->getLocation($result->city_id)->name}}">
                               <div class="list--overlay">
        									<span class="tag active">
        										@if(isset($result->status) && !in_array($result->status,['none','None','0']))
                                                    {{$result->status}}
                                                @endif
        									</span>
                                   <span class="fav">
        										<i class="fa fa-heart"></i>
        									</span>
                                   <div class="bottom--detail">
                                       <h3 class="price">
                                           @if(isset($result->system_price) && !in_array($result->system_price,['none','None']))
                                               ${{$result->system_price}}
                                           @endif
                                       </h3>
                                       <p class="info">
                                           @if(isset($result->address_street) && !in_array($result->address_street,['none','None','0']))
                                               {{$result->address_street}}
                                           @endif
                                           @if(isset($result->city_id))
                                               {{$location_helper->getLocation($result->city_id)->name}}
                                           @endif
                                           @if(isset($result->state) && !in_array($result->state,['none','None','0']))
                                               {{ ' | '.$result->state}}
                                           @endif
                                           @if(isset($result->county_id))
                                               {{ ' | '. $location_helper->getLocation($result->county_id)->name}}
                                           @endif
                                       </p>
                                       <span>
                                                    @if(isset($properties['year_built']))
                                               {{ 'Built in '.$properties['year_built']}}
                                           @endif
                                                </span>

                                       <span>
                                                @if(isset($properties['total_square_feet']))
                                               {{' | '. $properties['total_square_feet'] .' sq.ft'}}
                                           @endif
                                            </span>
                                       <div class="details">
                                                <span>
                                                    @if(isset($result->bedrooms) && !in_array($result->bedrooms,['none','None','0']))
                                                        <img src="/assets/website/images/bed.png" alt="Bed">
                                                        {{ $result->bedrooms}}
                                                    @endif
                                                </span>
                                           <span class="center-align">
                                                    @if(isset($result->baths_full) && !in_array($result->baths_full,['none','None','0']))
                                                   <img src="/assets/website/images/bathtub.png"
                                                        alt="Bathtub">{{ $result->baths_full}}
                                               @endif
                                                </span>
                                           <span class="right-align">
                                                    @if(isset($result->picture_count) && !in_array($result->picture_count,['none','None','0']))
                                                   <img src="/assets/website/images/camera.png" alt="Picture">
                                                   {{ $result->picture_count}}
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
   </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col s12" >
                <h3 class="title-more-detail">Listing on Map</h3>
            </div>
         </div>
        <div class="single--map_container">
            <div id="listingMap" data-zoom="10">

            </div>
        </div>
    </div>
</section>

@if(Auth::check())
    @include('core::website.listings.partials.modals.email')
    @include('core::website.listings.partials.modals.info')
    @include('core::website.listings.partials.modals.note')
@endif
