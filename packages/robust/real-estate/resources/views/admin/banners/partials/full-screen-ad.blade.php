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
        {{ Form::label('button_text', 'Button Text', ['class' => 'required' ]) }}
        {{ Form::text('button_text', null, [
           'placeholder' => 'Button Text',
           'required'  => 'required'
           ])
        }}
    </div>
    <div class="input-field col s6">
        {{ Form::label('button_url', 'Button URL', ['class' => 'required' ]) }}
        {{ Form::text('button_url', null, [
           'placeholder' => 'Button URL'
           ])
        }}
    </div>
</div>
