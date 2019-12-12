<div class="mb-20">
    <p>
        <label>Type of property</label>
    </p>
    <p>
        <label>
            <input name="type[]" type="checkbox" value="Select All"
            {{ (isset($query_params['type']) && in_array('Select All', $query_params['type'])) ? 'checked':'' }}
            />
            <span>Select All</span>
        </label>
    </p>
    <p>
        <label>
            <input name="type[]" value="Single Family Attached" type="checkbox" 
            {{ (isset($query_params['type']) && in_array('Single Family Attached', $query_params['type'])) ? 'checked':'' }}
            />
            <span>Single Family Attached</span>
        </label>
    </p>
    <p>
        <label>
            <input name="type[]" value="Single Family Detached" type="checkbox" 
            {{ (isset($query_params['type']) && in_array('Single Family Detached', $query_params['type'])) ? 'checked':'' }}
            />
            <span>Single Family Detached</span>
        </label>
    </p>
    <p>
        <label>
            <input name="type[]" value="Multifamily" type="checkbox" 
            {{ (isset($query_params['type']) && in_array('Multifamily', $query_params['type'])) ? 'checked':'' }}
            />
            <span>Multifamily</span>
        </label>
    </p>
    <p>
        <label>
            <input name="type[]" value="Lots/Land" type="checkbox" 
            {{ (isset($query_params['type']) && in_array('Lots/Land', $query_params['type'])) ? 'checked':'' }}
            />
            <span>Lots/Land</span>
        </label>
    </p>
</div>
