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
          <div class="col s12">
             <div class="row">
                <div class="col s12 sub--title">
                   <p><strong>Vega Norma</strong> viewed 1 item(s)</p>
             </div>                      
          </div>
          @foreach($model->favouriteListings as $favouriteListing)
                <div class="row">
                   <div class="single-search-item col s12">
                      <div class="img col s2">
                         <img src="../../../app-assets/images/cards/cameras.png">
                      </div>
                      <div class="text col s10">
                         <div class="col s12">
                            <h5>{{ $favouriteListing->name }}</h5>
                         </div>
                         <div class="col s6">
                            <label>Address:</label> {{ $favouriteListing->address_street }} {{ $favouriteListing->state }}
                         </div>
                         <div class="col s6">
                            <label>Seen:</label>5 days ago
                         </div>
                         <div class="col s6">
                            <label>Bedrooms:</label>{{ $favouriteListing->bedrooms }}
                         </div>
                         <div class="col s6">
                            <label>Full Bathrooms:</label>{{ $favouriteListing->baths_full }}
                         </div>
                      </div>
                   </div>
                </div>
          @endforeach
       </div>
    </div> 
</div>
</div>
