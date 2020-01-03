<div class="mb-20">
    <p>
        <label>Property Status</label>
    </p>
    <p>
        <label>
            <input name="status[]" type="checkbox" value="Select All"
            {{ (isset($query_params['status']) && in_array('Select All', $query_params['status'])) ? 'checked':'' }}
            />
            <span>Select All</span>
        </label>
    </p>
    <p>
        <label>
            <input name="status[]" value="Properties for sale" type="checkbox" 
            {{ (isset($query_params['status']) && in_array('Properties for sale', $query_params['status'])) ? 'checked':'' }}
            />
            <span>Properties for sale</span>
        </label>
    </p>
    <p>
        <label>
            <input name="status[]" value="Sold" type="checkbox" 
            {{ (isset($query_params['status']) && in_array('Sold', $query_params['status'])) ? 'checked':'' }}
            />
            <span>Sold</span>
        </label>
    </p>
</div>
