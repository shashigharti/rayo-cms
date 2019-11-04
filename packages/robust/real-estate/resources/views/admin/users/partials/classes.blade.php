<div class="col-sm-6">
    {{ Form::label('class', 'Classes', ['class' => 'control-label required' ])  }}
    {{ Form::select('class', $classes,null, [
            'class'       => 'form-control data-map_class'
        ]) }}
</div>