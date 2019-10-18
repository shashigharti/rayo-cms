<div class="form-group form-material row">
    <div class="">
        <div class="col-sm-6">
            {{ Form::label('status', 'Status', ['class' => 'control-label required' ]) }}
            {{ Form::select('status', ['0' => 'Inactive','1' => 'Active'],$status, [
                    'class'       => 'form-control',
                    'required'    => 'required'
                ]) }}
        </div>
    </div>
</div>

<div class="form-group form-material">


        <div class="row">
            <div class="">
                    @forelse($fields as $field => $value)
                        <div class="col-sm-3">
                            {{Form::checkbox('other[]',$field,in_array($field,$additional) ? true : false)}}
                            {{Form::label('other',$field,['class' => 'control-label'])}}
                        </div>
                    @empty
                    @endforelse
            </div>
        </div>

</div>

