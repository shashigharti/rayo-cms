<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
    	<label>Country</label>
        <select name="county_id[]" data-selected="{{ implode( ',', $query_params['county_id'] ?? [] ) }}" multiple data-placeholder="Select Options" class="browser-default advance-search_location multi-select" data-url="{{route('website.realestate.counties')}}">
            <option value="" disabled>Select Options</option>
        </select>
    </div>
</div>
