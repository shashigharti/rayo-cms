@set('property_types', settings('advance-search', 'property_types'))
@set('params', $query_params['property_type'] ?? $default_values['property_type'] ?? [])
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

    @foreach($property_types as $property)
        <p>
            <label>
                <input name="property_type[]" value="{{ $property }}" type="checkbox"
                        {{ (in_array($property, $params)) ? 'checked':'' }}
                />
                <span>{{ $property }}</span>
            </label>
        </p>
    @endforeach
</div>

