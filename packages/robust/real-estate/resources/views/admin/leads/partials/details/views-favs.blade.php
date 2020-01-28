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
                   <p><strong>{{ $model->first_name }}{{ $model->last_name }}</strong> viewed {{ $model->favourites->count() }} item(s)</p>
             </div>                      
          </div>
          @foreach($model->favourites as $favourite)
                <div class="row">
                   <div class="single-search-item col s12">
                      <div class="img col s2">
                         <img src="{{asset('assets/website/images/camera.png')}}">
                      </div>
                      <div class="text col s10">
                         <div class="col s12">
                            <h5>{{ $favourite->name }}</h5>
                         </div>
                         <div class="col s6">
                            <label>Address:</label> {{ $favourite->address_street }} {{ $favourite->state }}
                         </div>
                         <div class="col s6">
                            <label>Seen:</label>5 days ago
                         </div>
                         <div class="col s6">
                            <label>Bedrooms:</label>{{ $favourite->bedrooms }}
                         </div>
                         <div class="col s6">
                            <label>Full Bathrooms:</label>{{ $favourite->baths_full }}
                         </div>
                      </div>
                   </div>
                </div>
          @endforeach
       </div>
    </div> 
</div>
</div>
