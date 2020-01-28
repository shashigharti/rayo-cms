<div class="row">
    @include("real-estate::admin.leads.partials.details.overview-info")
    <div class="col s9">
       <div class="panel card">
          <div class="col s12">
             <div class="row">
                <div class="col s9">
                   <h5>Listings Viewed/Favourites</h5>
                </div>
                <div class="col s3">
                   <select class="right">
                      <option value="" disabled selected>Select Here</option>
                      <option value="1">Recently Added</option>
                      <option value="2">Price High-Low</option>
                      <option value="3">Price Low-High</option>
                      <option value="3">Favourites</option>
                   </select>
                </div>
             </div>
          </div>
          @set('favourites',$model->favourites)
          @foreach($model->views as $views)
                @set('image',$views->listing->images()->first())
                <div class="row">
                   <div class="single-search-item col s12">
                      <div class="img col s2">
                         <img src="{{$image ? $image->url : ''}}">
                      </div>
                      <div class="text col s10">
                         <div class="col s12">
                             <p><strong>{{ $model->first_name }}{{ $model->last_name }}</strong> viewed {{ $views->count }} time(s)</p>
                             @if($favourites->where('id',$views->listing_id)->first())
                                 <i class="right material-icons">favorite</i>
                             @endif
                            <h5>{{ $views->listing->name }}</h5>
                         </div>
                         <div class="col s6">
                            <label>Address:</label> {{ $views->listing->address_street }} {{ $views->listing->state }}
                         </div>
                         <div class="col s6">
                            <label>Seen:</label>5 days ago
                         </div>
                         <div class="col s6">
                            <label>Bedrooms:</label>{{ $views->listing->bedrooms }}
                         </div>
                         <div class="col s6">
                            <label>Full Bathrooms:</label>{{ $views->listing->baths_full }}
                         </div>
                      </div>
                   </div>
                </div>
          @endforeach
       </div>
    </div>
</div>
</div>
