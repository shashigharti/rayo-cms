<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
    	<label>Style</label>
        <select name="style[]"  data-selected="{{ implode( ',', $query_params['style'] ?? [] ) }}" 
        multiple data-placeholder="Select Options" 
        class="browser-default advance-search_location multi-select" 
        data-url="{{route('website.realestate.attributes',['name'=>'styles'])}}"
        >
            <option value="" selected disabled>Select Options</option>
        </select>
    </div>
</div>
