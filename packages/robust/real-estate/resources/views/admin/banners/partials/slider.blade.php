<div class="row">
    <div class="input-field col s6">
        {{ Form::label('header', 'Header', ['class' => 'required' ]) }}
        {{ Form::text('header', null, [
           'placeholder' => 'Banner Content'
           ])
        }}
    </div>
    <div class="input-field col s6">
            {{ Form::label('area_types', 'Location Type', ['class' => 'control-label' ]) }}
            {{ Form::select('area_types[]', [], [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ]) 
            }}
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
            {{ Form::label('locations', 'Locations', ['class' => 'control-label' ]) }}
            {{ Form::select('locations[]', [], [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ]) 
            }}
    </div>
   <div class="input-field col s6">
        {{ Form::label('property_count', 'Property Count', ['class' => 'required' ]) }}
        {{ Form::text('property_count', null, [
           'placeholder' => 'Banner Content'
           ])
        }}
    </div>
</div>
