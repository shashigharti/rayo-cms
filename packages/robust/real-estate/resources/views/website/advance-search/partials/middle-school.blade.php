<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
    	<label>Middle School</label>
        <select name="middle_school_id[]" 
        data-selected="{{ implode( ',', $query_params['middle_school_id'] ?? [] ) }}" multiple 
        data-placeholder="Select Options" 
        class="browser-default advance-search_location multi-select" 
        data-url="{{route('api.real-estate.locations.type', ['middle-schools'])}}"
        >
            <option value="" disabled>Select Options</option>
        </select>
    </div>
</div>