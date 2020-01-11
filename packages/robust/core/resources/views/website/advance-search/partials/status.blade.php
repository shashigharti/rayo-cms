@set('property_statuses', settings('advance-search', 'property_statuses'))
@set('params', $query_params['status'] ?? $default_values['status'] ?? [])
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
    @foreach($property_statuses as $status)
        <p>
            <label>
                <input name="status[]" value="{{$status}}" type="checkbox"
                        {{ in_array('Properties for sale', $params) ? 'checked':'' }}
                />
                <span>{{$status}}</span>
            </label>
        </p>
    @endforeach
</div>

