@inject('advancesearch_helper', '\Robust\RealEstate\Helpers\AdvanceSearchHelper')
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
    <div class="input-field col s12 mt-2">
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
    <div class="input-field col s4">
        {{ Form::label('properties[property_type][]', 'Property Type', ['class' => 'control-label' ]) }}
        {{ Form::select("properties[property_type][]", [
                'property_type' => 'Property Type',
                'construction_status' => 'Construction Status'
            ],
            request()->query('attribute') ?? $properties->property_type ?? '',
            [
                'class'=>'browser-default multi-select dynamic-attr_type',
                'data-url-to-reload' => url()->current(),
                'multiple'
            ])
        }}
    </div>
    <div class="input-field col s4">
        @set('attribute', request()->query('attribute') ?? $properties->property_type[0] ?? '')
        {{ Form::label('properties[property_value]', 'Property Values', ['class' => 'control-label' ]) }}
        {{ Form::select("properties[property_value][]", [],
            '',
            [
                'class'=>'browser-default multi-select',
                'data-url'=> route('api.realestate.attributes.property_name',  [$attribute]),
                'data-selected' => implode(',',$properties->property_value ?? []),
                'multiple'
            ])
        }}
    </div>
</div>
<div class="row">
    <div class="input-field col s12 mt-3">
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
