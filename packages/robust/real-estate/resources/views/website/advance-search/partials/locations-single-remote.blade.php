<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
        <label>{{ $display_name }}</label>
        <select name="{{$attribute."[]"}}" 
        data-selected="{{ implode( ',', $query_params[$attribute] ?? [] ) }}" 
        data-placeholder="Select Options" multiple 
        class="browser-default multi-select" 
        data-url="{{route('api.real-estate.locations.type', [$attribute])}}">
            <option value="" selected disabled>Select Options</option>
        </select>
    </div>
</div>
