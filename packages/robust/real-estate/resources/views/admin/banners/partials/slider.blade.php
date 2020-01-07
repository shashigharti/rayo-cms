<div class="row">
    <div class="input-field col s12">
        {{ Form::label('header', 'Header', ['class' => 'required' ]) }}
        {{ Form::text('property[header]', $properties->header ?? '', [
           'placeholder' => 'Banner Content'
           ])
        }}
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        {{ Form::label('location_types', 'Location Types', ['class' => 'control-label' ]) }}
        {{ Form::select('property[location_types][]', [], [],
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
</div>
<div class="row">    
   <div class="input-field col s6">
        {{ Form::label('property_count', 'Property Count', ['class' => 'required' ]) }}
        {{ Form::text('property[property_count]', $properties->header ?? '', [
           'placeholder' => 'Banner Content'
           ])
        }}
    </div>
</div>
