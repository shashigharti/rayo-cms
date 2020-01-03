@inject('advance_helper', 'Robust\RealEstate\Helpers\AdvanceSearchHelper')
@set('property_types', $advance_helper->getAttributesListByPropertyName('property_type'))

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
                <input name="property_type[]" value="{{$property['name']}}" type="checkbox" 
                {{ (isset($query_params['property_type']) && in_array($property['name'], $query_params['property_type'])) ? 'checked':'' }}
                />
                <span>{{$property['name']}}</span>
            </label>
        </p>
    @endforeach
</div>
