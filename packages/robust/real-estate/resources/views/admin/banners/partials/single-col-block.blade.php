<div class="row">
    <div class="input-field col s12">
        {{ Form::label('header', 'Header', ['class' => 'required' ]) }}
        {{ Form::text('properties[header]', $properties->header ?? '', [
           'placeholder' => 'Banner Content'
           ])
        }}
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        {{ Form::label('properties[locations]', 'Locations', ['class' => 'control-label' ]) }}
        {{ Form::select("properties[locations][]", [],
            $properties->locations ?? [],
            [
                'data-url' => route('api.locations'),
                'data-selected' => implode(",", $properties->locations ?? []),
                'class'=>'browser-default multi-select ad-search-field',
                'multiple'
            ])
        }}
    </div>
</div>

<div class="row">
    <div class="input-field col s6">
        {{ Form::label('properties[property_type]', 'Property Type', ['class' => 'control-label' ]) }}
        {{ Form::select("properties[property_type][]", [
                'property_type' => 'Property Type',
                'construction_status' => 'Construction Status'
            ],
            $properties['property_type'] ??  'property_type',
            [
                'class'=>'browser-default multi-select',
                'single'
            ])
        }}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {{ Form::label('properties[property_value]', 'Property Values', ['class' => 'control-label' ]) }}
        {{ Form::select("properties[property_value][]", [],
            $properties->locations ?? [],
            [
                'data-url' => route('api.realestate.attributes.property_name',['property_name' => $properties['property_type'] ?? 'property_type']),
                'data-selected' => implode(",", $properties->locations ?? []),
                'class'=>'browser-default multi-select ad-search-field',
                'multiple'
            ])
        }}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {{ Form::label('tabs', 'Tabs', ['class' => 'control-label' ]) }}
        {{ Form::select('properties[tabs][]',
            [
                'condos' =>'condos',
                'neighbourhood' => 'neighbourhood',
                'communities' => 'communities',
                'acreages' => 'acreages',
                'waterfront' => 'waterfront'
            ],
            $properties->tabs ?? [],
            [
                'class'=>'browser-default multi-select',
                'multiple'
            ])
        }}
    </div>
</div>
