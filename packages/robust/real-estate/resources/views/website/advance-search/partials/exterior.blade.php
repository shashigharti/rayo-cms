<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
    	<label>Exterior</label>
        <select name="exterior[]" data-selected="{{ implode( ',', $query_params['exterior'] ?? [] ) }}" multiple data-placeholder="Select Options" class="browser-default advance-search_location multi-select" data-url="{{route('website.realestate.attributes',['name'=>'exterior'])}}">
            <option value="" disabled>Select Options</option>
        </select>
    </div>
</div>
