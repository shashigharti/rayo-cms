<div class="filter-fields-container">
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-3">
                {{Form::label('field','Field',['class'=>'control-label'])}}
                {{Form::select('field[]',$fields,$field,['class'=>'form-control'])}}
            </div>
        </div>
        <div class="">
            <div class="col-sm-3">
                {{Form::label('mapped_key','Mapped Key',['class'=>'control-label'])}}
                {{Form::text('mapped_key[]',$mapped_key,['class'=>'form-control'])}}
            </div>
        </div>
        <div class="">
            <div class="col-sm-3">
                {{Form::label('value','Value',['class'=>'control-label'])}}
                {{Form::text('value[]',$value,['class'=>'form-control'])}}
            </div>
        </div>
        <div class="">
            <button class="btn btn-danger remove-filter">Remove</button>
        </div>
    </div>

</div>