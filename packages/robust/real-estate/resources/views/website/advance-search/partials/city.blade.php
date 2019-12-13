<div class="mb-20 clearfix multi-select-container">    
    <div class="col s12">
    	<label>City</label>
        <select name="cities[]" data-selected="{{ implode( ',', $query_params['cities'] ?? [] ) }}" data-placeholder="Select Options" multiple class="browser-default multi-select" data-url="{{route('website.realestate.cities')}}">
            <option value="" disabled>Select Options</option>
        </select>        
    </div>
</div>
