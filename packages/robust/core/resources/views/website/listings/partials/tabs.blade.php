<div class="inner-list-tab">
    <div class="row">
        <div class="col s12">
            <ul class="inner-list-tabs">
                <li class="tab active"><a  href="#overview">Overview</a></li>

                <li class="tab"><a href="#calculator">Mortage Calculator</a></li>
                <li class="tab"><a href="#distance">Distance/Drive Time</a></li>
            </ul>
        </div>
        <div id="overview" class="col s8 overview-slider ">
            <div class="outer">
                <div id="big" class="owl-carousel owl-theme">
                   @foreach($result->images as $image)
                       <div class="item">
                           <img src="{{$image->url}}" alt="">
                       </div>
                   @endforeach
                </div>
                <div id="thumbs" class="owl-carousel owl-theme">
                    @foreach($result->images as $image)
                        <div class="item">
                            <img src="{{$image->url}}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="distance" class="distance--block">
            <p> <b class="font-size16 ">Calculate distance and drive time from your location to:</b>
                <br> From :  <b class="font-size16 listing_location">-</b>
                <br> To : <b class="font-size16 destination_location">-</b>
            </p>
            <p class="hide">
                Distance to location :
                <span class="calculated_distance">-</span>
                <br>
                Drive time to location :
                <span class="calculated_duration">-</span>
            </p>
            <div class="get-distance-container">
                <div class="input-group mb-3">
                    <input type="text" id="autocomplete_address" class="form-control"  placeholder="destination address ... ">
                    <div class="input-group-prepend">
                        <button class="btn btn-default get-distance" type="button" data-url="{{route('website.realestate.leads.distance.store',['listing_id'=> $result->id])}}">Get distance</button>
                    </div>
                </div>
                <div class="single--map_container">
                    <p
                        class="listing-map_data hidden"
                        data-image="{{$image ? $image->url :  ''}}"
                        data-name="{{$result->name}}"
                        data-slug="{{$result->slug}}"
                        data-price="{{$result->system_price}}"
                        data-lat="{{$result->latitude}}"
                        data-lng="{{$result->longitude}}">
                    </p>
                    <div id="distanceMap" data-zoom="10" style="width: 100%;height: 350px">

                    </div>
                </div>
            </div>
        </div>
        <div id="calculator" class="col m12 s12">
            <div id="m-calculator">
                <form id="homenote" role="form" class="well">
                    <div class="form-group">
                        <label for="purchasePrice">Purchase Price ($)</label>
                        <input type="text" class="form-control" id="purchasePrice" value="{{$result->system_price}}">
                    </div>
                    <div class="form-group">
                        <label for="downPayment">Down Payment</label>
                        <input type="text" class="form-control" id="downPayment" value="20">
                    </div>
                    <label class="radio-inline">
                        <input type="radio" name="dptype"  value="percentage" checked="">Percent (%)
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="dptype"  value="dollars">Dollars ($)</label>

                    <div class="form-group">
                        <label for="rate">Rate (%)</label>
                        <input type="text" class="form-control" id="rate" value="5.0">
                    </div>
                    <div class="form-group">
                        <label for="rate">Term</label>
                        <input type="text" class="form-control" id="term" value="30">
                    </div>
                    <label class="radio-inline">
                        <input type="radio" name="period"  checked="" value="monthly">Months
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="period"  value="yearly">Years
                    </label>
                    <div id="results" class="alert alert-success hide"></div>
                    <button type="submit" class="btn btn-primary btn-block" id="calchomenote">Calculate</button>
                </form>
            </div>
        </div>
    </div>
</div>
