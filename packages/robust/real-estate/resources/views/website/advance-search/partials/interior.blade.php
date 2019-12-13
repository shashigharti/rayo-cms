<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
    	<label>Interior</label>
        <select name="interior[]" data-selected="{{ implode( ',', $query_params['interior'] ?? [] ) }}" multiple data-placeholder="Select Options" class="browser-default advance-search_location multi-select" data-url="{{route('website.realestate.attributes',['name'=>'interior'])}}">
            <option value="" disabled>Select Options</option>
        </select>
    </div>
</div>
