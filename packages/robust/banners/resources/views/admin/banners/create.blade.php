@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @inject('menu_helper', 'Robust\Core\Helpers\MenuHelper')
    @set('ui', new $ui)

    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {!! Form::label('name', 'Banner Name', ['class' => 'control-label required' ]) !!}
                {{ Form::text('name', null, [
                        'class'       => 'form-control name',
                        'placeholder' => 'Banner Name i.e. \'Home Banner\'',
                        'required'    => 'required',
                        'data-slug' => 'slug'
                    ]) }}
            </div>
        </div>
        <div class="">
            <div class="col-sm-6">
                {!! Html::decode(Form::label('slug', 'Slug', ['class' => 'control-label required' ]))  !!}

                {{ Form::text('slug', null, [
                    'class'       => 'form-control slug',
                    'placeholder' => 'Slug i.e. \'slug\''
                ]) }}
            </div>
        </div>
    </div>

    <div class="form-group form-material">
        {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
    </div>
    {{ Form::close() }}
@endsection

