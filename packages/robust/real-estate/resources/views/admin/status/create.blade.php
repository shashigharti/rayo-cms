@extends('core::admin.layouts.sub-layouts.create')
@section('form')
    @set('ui', new $ui)
    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
    <div id="{{ $title }}" class="col s12">
        <div class="row">
            <div class="input-field col s6">
                {{ Form::label('value', 'Name', ['class' => 'required control-label' ]) }}
                {{ Form::text('value', null, [
                        'placeholder' => 'Active',
                        'required'  => 'required'
                    ])
                }}
            </div>
        </div>
        <div class="row mt-1">
            <div class="col s12">
                {{ Form::submit($ui->getSubmitText(), ['class' => 'waves-light theme-btn btn']) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
