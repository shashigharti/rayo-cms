<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
    	<label>Subdivisions</label>
        <select name="subdivision_id[]" data-selected="{{ implode( ',', $query_params['subdivision_id'] ?? [] ) }}"  multiple data-placeholder="Select Options" class="browser-default advance-search_location multi-select" data-url="{{route('website.realestate.subdivisions')}}">
            <option value="" disabled>Select Options</option>
        </select>
    </div>
</div>
