@inject('menu_helper', 'Robust\Core\Helpers\MenuHelper')

@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)
    <div class="nav-tabs-vertical">
        <ul class="nav nav-tabs lang-nav">
            <li class="active"><a data-toggle="tab" href="#english">English</a></li>
            <li><a data-toggle="tab" href="#nepali">Nepali</a></li>
        </ul>
        {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
        <div class="tab-content">
            <div id="english" class="tab-pane fane in active">
                <div class="form-group form-material row">
                    <div class="col-sm-6">
                        {!! Html::decode(Form::label('name', 'Category Name', ['class' => 'control-label required' ]))  !!}
                        {{ Form::text('name', null, [
                                'class'       => 'form-control name',
                                'placeholder' => 'Project Name i.e. \'KISAN\'',
                                'required'    => 'required',
                                'data-slug' => 'slug'
                            ]) }}
                    </div>

                    <div class="col-sm-6">
                        {!! Html::decode(Form::label('slug', 'Slug', ['class' => 'required control-label' ]))  !!}
                        {{ Form::text('slug', null, [
                            'class'       => 'form-control slug',
                            'placeholder' => 'slug i.e. \'slug\''
                        ]) }}
                    </div>

                </div>

                <div class="form-group form-material row">
                    <div class="col-sm-12">
                        {!! Html::decode(Form::label('description', 'Description', ['class' => 'required control-label' ]))  !!}
                        {{ Form::textarea('description', null, [
                               'class'       => 'form-control editor',
                               'placeholder' => 'Project Description'
                           ]) }}
                    </div>
                </div>
            </div>

            <div id="nepali" class="tab-pane fade">
                <div class="form-group form-material row">
                    <div class="">
                        <div class="col-sm-12">
                            {!! Html::decode(Form::label('name_ne', 'Category Name (Nepali)', ['class' => 'control-label' ]))  !!}
                            {{ Form::text('name_ne', null, [
                                    'class'       => 'form-control',
                                    'placeholder' => 'Project Name i.e. \'KISAN\'',

                                ]) }}
                        </div>
                    </div>
                </div>

                <div class="form-group form-material row">
                    <div class="col-sm-12">
                        {!! Html::decode(Form::label('description_ne', 'Description (Nepali)', ['class' => 'control-label' ]))  !!}

                        {{ Form::textarea('description_ne', null, [
                               'class'       => 'form-control editor',
                               'placeholder' => 'Project Description'
                           ]) }}
                    </div>
                </div>
            </div>
            <div class="form-group form-material">
                {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection

