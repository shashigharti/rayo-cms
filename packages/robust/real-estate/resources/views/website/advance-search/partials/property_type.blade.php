<div class="mb-20">
    <p>
        <label>Type of property</label>
    </p>
    <p>
        <label>
            <input name="property_type[]" type="checkbox" value="Select All"
            {{ (isset($query_params['property_type']) && in_array('Select All', $query_params['property_type'])) ? 'checked':'' }}
            />
            <span>Select All</span>
        </label>
    </p>
    <p>
        <label>
            <input name="property_type[]" value="Single Family Residence" type="checkbox" 
            {{ (isset($query_params['property_type']) && in_array('Single Family Residence', $query_params['property_type'])) ? 'checked':'' }}
            />
            <span>Single Family Residence</span>
        </label>
    </p>
    <p>
        <label>
            <input name="property_type[]" value="Condominium" type="checkbox" 
            {{ (isset($query_params['property_type']) && in_array('Condominium', $query_params['property_type'])) ? 'checked':'' }}
            />
            <span>Condominium</span>
        </label>
    </p>
    <p>
        <label>
            <input name="property_type[]" value="Villa" type="checkbox" 
            {{ (isset($query_params['property_type']) && in_array('Villa', $query_params['property_type'])) ? 'checked':'' }}
            />
            <span>Villa</span>
        </label>
    </p>
    <p>
        <label>
            <input name="property_type[]" value="Lots/Land" type="checkbox" 
            {{ (isset($query_params['property_type']) && in_array('Townhome', $query_params['property_type'])) ? 'checked':'' }}
            />
            <span>Lots/Land</span>
        </label>
    </p>
</div>
