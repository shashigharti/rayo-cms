@set('properties', json_decode($singleColBanner->properties,true))
@set('location',$location_helper->getLocation($properties['locations']))
@set('image',$listing_helper->getImageByLocation($location,$properties['image'] ?? ''))
@if($properties && $location)

@endif

