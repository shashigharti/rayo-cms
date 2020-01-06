<div class="row">
    <div class="input-field col s6">
        {{ Form::label('header', 'Header', ['class' => 'required' ]) }}
        {{ Form::text('header', null, [
           'placeholder' => 'Banner Content'
           ])
        }}
    </div>
    <div class="input-field col s6">
            {{ Form::label('location_type', 'Location Type', ['class' => 'control-label' ]) }}
            {{ Form::select('location_type[]', [], [],
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
            {{ Form::label('sub_areas', 'Tabs', ['class' => 'control-label' ]) }}
            {{ Form::select('sub_areas[]', 
                ['condos', 'neighbourhood', 'communities', 'acreages', 'waterfront'], 
                [],
                [
                    'class'=>'browser-default multi-select',
                    'multiple'
                ]) 
            }}
    </div>
</div>
