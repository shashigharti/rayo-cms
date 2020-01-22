<div class="column-action__properties-viewed">
    <a title="Click for Properties Viewed" class='popup-trigger' href='#'>
        <i aria-hidden="true" class="fa fa-eye"></i>
        <small>
            <sub>{{$lead->listingViewed()->count()}}</sub>
        </small>
    </a>
    <ul class='popup-content hide'>
        <div class="info-dialog view-box">
            <div class="box-title">
                {{ $lead->first_name }} {{ $lead->last_name }}
               <i class="fa fa-times pull-right clickable"></i>
            </div>
            <div class="box-content">
                @foreach($lead->listingViewed as $lead_view)
                    <div class="row viewed-lead">
                        <a href="//scottingraham.com/real-estate/692712/6903-lagoon-panama-city-beach-32408" target="_blank">
                            <div class="col s4">
                                <img src="http://cdn.photos.sparkplatform.com/bc/20200111182524426985000000-o.jpg" alt="6903 Lagoon, Panama City Beach 32408" class="img-responsive">
                            </div>
                            <div class="col s8">
                                <div class="vw-lead-name">
                                    {{ $lead_view->listing->name }}
                                </div>
                                <div class="vw-lead-price">
                                   Price:${{ $lead_view->listing->system_price }}
                                   <br>
                                   Baths Full: {{ $lead_view->listing->baths_full }}
                                   <br>
                                   Beds : {{ $lead_view->listing->bedrooms }}
                                </div>
                                <div class="vw-lead-address">
                                   Address: {{ $lead_view->listing->address_street }} {{ $lead_view->listing->state }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="row vw-view-more">
                   <a href="#" class="">
                        <div class="col s12">
                            View more
                        </div>
                   </a>
                </div>
            </div>
        </div>
    </ul>
</div>
