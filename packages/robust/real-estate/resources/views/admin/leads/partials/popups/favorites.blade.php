<div class="column-action__favorite">
    <a href="#" title="Favorite Properties" class='popup-trigger' href='#'>
        <i aria-hidden="true" class="fa fa-heart-o"></i>
        <small>
            <sub>{{$lead->favourites->count()}}</sub>
        </small>
    </a>
    <ul class='popup-content hide'>
        <div class="info-dialog view-box">
            <div class="box-title">
                {{ $lead->first_name }} {{ $lead->last_name }} - Favorites
                <i class="fa fa-times pull-right clickable"></i>
            </div>
            <div class="box-content">
                @foreach($lead->favourites as $listing)
                    @set('image',$listing->images()->first())
                    <div class="row viewed-lead">
                        <a href="" target="_blank">
                            <div class="col s4">
                                <img src="{{$image ? $image->url : ''}}" alt="{{$listing->name}}" class="img-responsive">
                            </div>
                            <div class="col s8">
                                <div class="vw-lead-name">
                                    {{ $listing->name }}
                                </div>
                                <div class="vw-lead-price">
                                    Price:${{ $listing->system_price }}
                                    <br>
                                    Baths Full: {{ $listing->baths_full }}
                                    <br>
                                    Beds : {{ $listing->bedrooms }}
                                </div>
                                <div class="vw-lead-address">
                                    Address: {{ $listing->address_street }} {{ $listing->state }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="row vw-view-more">
                    <div class="col s12">
                        <a href="{{ route('admin.leads.details.edit', ['id' => $lead->id,'type'=>'views-favs'])}}">View more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</div>
