@set('properties', json_decode($singleColBanner->properties,true))
@set('location',$location_helper->getLocation($properties['locations']))
@set('image',$listing_helper->getImageByLocation($location,$properties['image'] ?? ''))
@if($properties && $location)
    <div class="col m4 s12">
        <div class="single-block">
            <img src="{{$image}}" alt="{{$properties['header']}}">
            <div class="figcaption center-align">
                <h2><a href="{{route('website.realestate.homes-for-sale.property_type',[
                    'status' => 'Active',
                    'property_type' => implode(',',$properties['property_type']),
                    'property_value' => implode(',',$properties['property_value']),
                    'locations' => implode(',',$properties['locations'])
                ])}}">{{$properties['header']}}</a></h2>
            </div>
        </div>
    </div>
@endif

