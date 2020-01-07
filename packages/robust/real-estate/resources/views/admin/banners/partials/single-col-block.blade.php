<div class="row">
    <div class="input-field col s6">
        {{ Form::label('header', 'Header', ['class' => 'required' ]) }}
        {{ Form::text('properties[header]', null, [
           'placeholder' => 'Banner Content'
           ])
        }}
    </div>
    <div class="input-field col s6">
            {{ Form::label('location_type', 'Location Type', ['class' => 'control-label' ]) }}
            {{ Form::select('properties[location_type][]', [], [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
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
    <div class="input-field col s6">
        {{ Form::label('tabs', 'Tabs', ['class' => 'control-label' ]) }}
        {{ Form::select('properies[tabs][]', 
            ['condos', 'neighbourhood', 'communities', 'acreages', 'waterfront'], 
            [],
            [
                'class'=>'browser-default multi-select',
                'multiple'
            ]) 
        }}
    </div>
</div>
