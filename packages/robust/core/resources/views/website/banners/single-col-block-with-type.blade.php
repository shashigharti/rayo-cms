@set('properties', json_decode($singleColBanner->properties,true))
@set('location',$location_helper->getLocation($properties['locations']))
@set('image',$listing_helper->getImageByLocation($location,$properties['image'] ?? ''))
@if($properties && $location)
    <div class="col m{{$col}} s12">
        <div class="single-block">
            <img src="{{$image}}" alt="{{$properties['header']}}">
            <div class="figcaption center-align">
                <h2>{{$properties['header']}}</h2>
            </div>
        </div>
    </div>
@endif

