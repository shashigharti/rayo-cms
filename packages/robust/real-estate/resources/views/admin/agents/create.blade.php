@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)

    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
        <div id="{{ $title }}" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::label('first_name', 'First Name', ['class' => 'required control-label' ]) }}
                    {{ Form::text('first_name', null, [
                            'required'  => 'required'
                        ])
                    }}
                </div>
                <div class="input-field col s6">
                    {{ Form::label('last_name', 'Last Name', ['class' => 'required control-label' ]) }}
                    {{ Form::text('last_name', null, [
                            'required'  => 'required'
                        ])
                    }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::label('email', 'Email', ['class' => 'required control-label' ]) }}
                    {{ Form::email('email', null, [
                            'required'  => 'required'
                        ])
                    }}
                </div>
                <div class="input-field col s6">
                    {{ Form::label('password', 'Password', ['class' => 'required control-label' ]) }}
                    {{ Form::password('password', null, [
                            'required'  => 'required'
                        ])
                    }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::label('contact', 'Contact', ['class' => 'required control-label' ]) }}
                    {{ Form::number('contact', null, [
                            'placeholder' => '+977-9876'
                        ])
                    }}
                </div>
                <div class="input-field col s6">
                    {{ Form::label('address', 'Address', ['class' => 'required control-label' ]) }}
                    {{ Form::text('address', null, [
                            'placeholder' => 'Nepal'
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
