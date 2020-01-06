<div class="row">
    <div class="input-field col s6">
        {{ Form::label('header', 'Header', ['class' => 'required' ]) }}
        {{ Form::text('header', null, [
           'placeholder' => 'Banner Header',
           'required'  => 'required'
           ])
        }}
    </div>
    <div class="input-field col s6">
        {{ Form::label('content', 'Content', ['class' => 'required' ]) }}
        {{ Form::text('content', null, [
           'placeholder' => 'Banner Content'
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
        {{ Form::label('button_text', 'Button Textt', ['class' => 'required' ]) }}
        {{ Form::text('button_text', null, [
           'placeholder' => 'Button Text'
           ])
        }}
    </div>
</div>
