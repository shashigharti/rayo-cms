<div class="mb-20 clearfix multi-select-container">
    <div class="col s12">
    	<label>Amenities</label>
        <select name="amenities[]" multiple data-placeholder="Select Options" class="browser-default advance-search_location multi-select" data-url="{{route('website.realestate.attributes',['name'=>'amenities'])}}">
            <option value="" disabled>Select Options</option>
        </select>
    </div>
</div>
