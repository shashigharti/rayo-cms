<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
    	<label>Construction</label>
        <select name="construction[]" data-selected="{{ implode( ',', $query_params['construction'] ?? [] ) }}"  multiple data-placeholder="Select Options" class="browser-default advance-search_location multi-select" data-url="{{route('website.realestate.attributes',['name'=>'construction'])}}">
            <option value="" disabled>Select Options</option>
        </select>
    </div>
</div>
