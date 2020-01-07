@set('params',$query_params['status'] ?? $default_values['status'] ?? [])
<div class="mb-20">
    <p>
        <label>Property Status</label>
    </p>
    <p>
        <label>

            <input name="status[]" type="checkbox" value="Select All"
                {{ in_array('Select All', $params) ? 'checked':'' }}
            />
            <span>Select All</span>
        </label>
    </p>
    <p>
        <label>
            <input name="status[]" value="Properties for sale" type="checkbox"
                {{ in_array('Properties for sale', $params) ? 'checked':'' }}
            />
            <span>Properties for sale</span>
        </label>
    </p>
    <p>
        <label>
            <input name="status[]" value="Sold" type="checkbox"
                {{ in_array('Sold', $params) ? 'checked':'' }}
            />
            <span>Sold</span>
        </label>
    </p>
</div>
