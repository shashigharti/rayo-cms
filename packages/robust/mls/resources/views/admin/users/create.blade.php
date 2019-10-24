@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)

    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('name', 'Mls Name', ['class' => 'control-label required' ]) }}
                {{ Form::text('name', null, [
                        'class'       => 'form-control name',
                        'placeholder' => 'Mls Name',
                        'required'    => 'required',
                        'data-slug' => 'slug'
                    ]) }}
            </div>
        </div>
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('slug', 'Slug', ['class' => 'control-label required' ])  }}
                {{ Form::text('slug', null, [
                    'class'       => 'form-control slug',
                    'placeholder' => 'Slug i.e. \'slug\''
                ]) }}
            </div>
        </div>
    </div>
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('email', 'Email', ['class' => 'control-label required' ]) }}
                {{ Form::email('email', null, [
                        'class'       => 'form-control',
                        'placeholder' => 'Mls Email',
                        'required'    => 'required',
                        'data-slug' => 'slug'
                    ]) }}
            </div>
        </div>
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('contact', 'Contact', ['class' => 'control-label' ]) }}
                {{ Form::text('contact', null, [
                    'class'       => 'form-control',
                    'placeholder' => 'Contact Number'
                ]) }}
            </div>
        </div>
    </div>
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-12">
                {{ Form::label('website', 'Website', ['class' => 'control-label required' ]) }}
                {{ Form::text('website', null, [
                        'class'       => 'form-control',
                        'placeholder' => 'Website Url',
                    ]) }}
            </div>
        </div>
    </div>
    {!! Html::decode(Form::label('logo', '<b> Logo </b>', ['class' => 'control-label' ]))  !!}
    {!! Form::media($model, ['button' => 'Add Logo', 'field-name' => 'logo']) !!}

    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('state_short', 'State (short name)', ['class' => 'control-label required' ]) }}
                {{ Form::text('state_short', null, [
                        'class'       => 'form-control',
                        'placeholder' => 'State',
                        'required'    => 'required'
                    ]) }}
            </div>
        </div>
    </div>
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-12">
                {{ Form::label('login_url', 'Login Url', ['class' => 'control-label required' ]) }}
                {{ Form::text('login_url', null, [
                        'class'       => 'form-control',
                        'placeholder' => 'Rets Login Url',
                        'required'    => 'required',
                    ]) }}
            </div>
        </div>
    </div>

    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('username', 'Rets Username', ['class' => 'control-label required' ]) }}
                {{ Form::text('username', null, [
                        'class'       => 'form-control',
                        'placeholder' => 'Rets Username',
                        'required'    => 'required'
                    ]) }}
            </div>
        </div>
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('password', 'Password', ['class' => 'control-label required' ])  }}
                {{ Form::text('password', null, [
                    'class'       => 'form-control',
                    'placeholder' => 'Rets Password'
                ]) }}
            </div>
        </div>
    </div>
    <div class="form-group form-material">
        {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
    </div>
    {{ Form::close() }}
@endsection

