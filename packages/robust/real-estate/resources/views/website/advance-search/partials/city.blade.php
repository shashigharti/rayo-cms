<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
    	<label>City</label>
        <select name="city_id[]" 
        data-selected="{{ implode( ',', $query_params['city_id'] ?? [] ) }}" 
        data-placeholder="Select Options" multiple 
        class="browser-default multi-select" 
        data-url="{{route('website.realestate.cities')}}">
            <option value="" disabled>Select Options</option>
        </select>
    </div>
</div>
