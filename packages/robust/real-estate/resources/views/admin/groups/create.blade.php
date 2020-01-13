@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)
    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
        <div id="{{ $title }}" class="col s12">
            <h4>Edit Group</h4>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::label('name', 'Group Name', ['class' => 'required control-label' ]) }}
                    {{ Form::text('name', null, [
                            'placeholder' => '6 Months',
                            'required'  => 'required'
                        ])
                    }}
                </div>
                <div class="input-field col s6">
                    {{ Form::label('color', 'Select Color', ['class' => 'required' ]) }}
                    <input type="text" name="color" value="#00AABB" class="colorpicker form-control" />
                </div>
            </div>
            {{ Form::hidden('status',0) }}
            <div class="row">
                <div class="col s12">
                   {{ Form::submit($ui->getSubmitText(), ['class' => 'waves-light btn']) }}           
                </div>
            </div>
        </div>
    {{ Form::close() }}
@endsection