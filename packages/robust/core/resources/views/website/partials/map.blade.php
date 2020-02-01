<div id="leaflet__map-container" data-zoom="10"
     style="width: 100%; height: 900px"
     class="col s12 leaflet__map-container"
>
    @foreach($records as $record)
        @set('address', geocode($record->name . "FL"))
        <p
            class="leaflet__map-items hidden"
            data-name="{{$record->name}}"
            data-latitude="{{$address['geometry']['location']['lat']}}"
            data-longitude="{{$address['geometry']['location']['lng']}}">
        </p>
    @endforeach
</div>
