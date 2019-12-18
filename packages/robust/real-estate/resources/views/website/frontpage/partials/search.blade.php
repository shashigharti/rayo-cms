<div class="banner-caption">
   <h1>Find Your Dream House With Us</h1>
   <div class="search-section">
      <form id="frm-search" method="get" action="{{$advancesearch_helper->getSearchURL()}}">
         <div class="row">
            <div class="col s3">
               <p>Location</p>
               <input type="text" name="search" placeholder="Type a city,zip,address or MLS#">
            </div>
            <div class="col s6">
               <div class="row">
                  <div class="col s4 range-bar">
                     <p>PRICE</p>
                     <input class="price-range-slider jrange-slider" data-min="0" data-max="1000000" name="price"  data-scale-min="0"  data-scale-max="1m+" type="hidden" value="0,1000000" />
                  </div>
                  <div class="col s4 range-bar">
                     <p>BEDROOMS</p>
                     <input class="bedroom-range-slider jrange-slider" data-min="0" data-max="5" data-scale-min="0"  data-scale-max="5+" name="bedrooms" type="hidden" value="1,5" />
                  </div>
                  <div class="col s4 range-bar">
                     <p>BATHROOMS</p>
                     <input class="bathroom-range-slider jrange-slider" data-min="0" data-max="5" data-scale-min="0"  data-scale-max="5+" name="bathrooms" type="hidden" value="1,5" />
                  </div>
               </div>
            </div>
            <div class="col s3 center-align">
               <div class="left">
                  <p>FEATURES</p>
                  <a href="#" class="theme-btn advance-search">Advanced search</a>
               </div>
               <div class="right">
                  <p>19723 HOMES FOR SALE</p>
                  <button type="submit" value="search" class="theme-btn">Search</button>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>