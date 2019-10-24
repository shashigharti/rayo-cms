<div class="form-group form-material row">
    <div class="">
        <div class="col-sm-6">
            {{ Form::label('field', 'Field', ['class' => 'control-label' ]) }}
            {{ Form::text('field[]',$key, [
                    'class'       => 'form-control',
                    'required'    => 'required',
                ]) }}
        </div>
    </div>
    <div class="">
        <div class="col-sm-6">
            {{ Form::label('value', 'Value', ['class' => 'control-label' ]) }}
            {{ Form::text('value[]' ,$value, [
                    'class'       => 'form-control',
                    'required'    => 'required',
                ]) }}
        </div>
    </div>
</div>