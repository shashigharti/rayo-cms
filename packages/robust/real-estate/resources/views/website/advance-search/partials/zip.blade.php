<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
        <label>Zip</label>
        <select name="zip_id[]"  
        data-selected="{{ implode( ',', $query_params['zip_id'] ?? [] ) }}" 
        multiple 
        data-placeholder="Select Options" 
        class="browser-default advance-search_location multi-select" 
        data-url="{{route('api.real-estate.locations.type', ['zips'])}}">
            <option value="" disabled>Select Options</option>
            @if(isset($locations['zips']))
                @foreach($locations['zips'] as $zips)
                    <option value="{{$zips->id}}">{{$zips->name}}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
