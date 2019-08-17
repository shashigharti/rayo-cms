@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)
    @inject('category_helper', 'Robust\Pages\Helpers\CategoryHelper')

    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
    <div class="nav-tabs-vertical">
        <ul class="nav nav-tabs lang-nav">
            <li class="active"><a data-toggle="tab" href="#english">English</a></li>
            <li><a data-toggle="tab" href="#nepali">Nepali</a></li>
        </ul>
        <div class="tab-content">
            <div id="english" class="tab-pane fane in active">
                <div class="form-group form-material row">
                    <div class="">
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Page Name', ['class' => 'required control-label' ]) !!}
                            {{ Form::text('name', null, [
                                    'class'       => 'form-control name',
                                    'placeholder' => 'Page Name i.e. \'KISAN\'',
                                    'required'    => 'required',
                                    'data-slug' => 'slug'
                                ]) }}
                        </div>
                    </div>
                    <div class="">
                        <div class="col-sm-6">
                            {!! Form::label('slug', 'Slug', ['class' => 'required control-label' ])  !!}
                            {{ Form::text('slug', null, [
                                'class'       => 'form-control slug',
                                'placeholder' => 'slug i.e. \'slug\''
                            ]) }}
                        </div>
                    </div>
                </div>

                <div class="form-group form-material row">
                    <div class="">
                        <div class="col-sm-12">
                            {!! Form::label('category_id', 'Category', ['class' => 'control-label required' ])  !!}
                            {{ Form::select('category_id', $category_helper->getCategoriesForDropdown(), null, ['class' => 'form-control']) }}

                        </div>
                    </div>
                </div>

                <div class="form-group form-material row">
                    <div class="">
                        <div class="col-sm-12">
                            {!! Form::label('excerpt', 'Excerpt', ['class' => 'required control-label' ])  !!}
                            {{ Form::text('excerpt', null, [
                                    'class'       => 'form-control',
                                    'placeholder' => 'Short Description',
                                    'required'    => 'required',
                                ]) }}
                        </div>
                    </div>
                </div>


                {!! Html::decode(Form::label('name', '<b> Thumbnail </b>', ['class' => 'control-label' ]))  !!}
                {!! Form::media($model, ['button' => 'Add Image', 'field-name' => 'thumbnail']) !!}

                <div class="form-group form-material row">
                    <div class="col-sm-12">
                        {!! Form::label('content', 'Content', ['class' => 'control-label required' ])  !!}
                        {{ Form::textarea('content', null, [
                               'class'       => 'form-control editor',
                               'placeholder' => 'Project Description'
                           ]) }}
                    </div>
                </div>

                <div class="form-group form-material row">
                    <div class="col-sm-12">
                        {!! Form::label('meta_title', 'Meta Title', ['class' => 'control-label required' ])  !!}
                        {{ Form::text('meta_title', null, [
                           'class'       => 'form-control',
                           'placeholder' => 'Meta Title'
                        ]) }}
                    </div>
                </div>
                <div class="form-group form-material row">
                    <div class="">
                        <div class="col-sm-6">
                            {!! Form::label('meta_description', 'Meta Description', ['class' => 'control-label required' ])  !!}
                            {{ Form::text('meta_description', null, [
                                   'class'       => 'form-control',
                                   'placeholder' => 'Meta Description'
                               ]) }}
                        </div>
                    </div>
                    <div class="">
                        <div class="col-sm-6">
                            {!! Form::label('meta_keywords', 'Meta Keywords', ['class' => 'control-label required' ])  !!}
                            {{ Form::text('meta_keywords', null, [
                            'class'       => 'form-control',
                            'placeholder' => 'Meta Keywords'
                        ]) }}
                        </div>
                    </div>
                </div>

            </div>

            <div id="nepali" class="tab-pane fade">
                <div class="form-group form-material row">
                    <div class="">
                        <div class="col-sm-12">
                            {!! Form::label('name_ne', 'Page Name (Nepali)', ['class' => 'control-label' ])  !!}
                            {{ Form::text('name_ne', null, [
                                    'class'       => 'form-control',
                                    'placeholder' => 'Page Name i.e. \'KISAN\'',
                                ]) }}
                        </div>
                    </div>
                </div>

                <div class="form-group form-material row">
                    <div class="">
                        <div class="col-sm-12">
                            {!! Form::label('excerpt_ne', 'Excerpt (Nepali)', ['class' => 'control-label' ])  !!}
                            {{ Form::text('excerpt_ne', null, [
                                    'class'       => 'form-control',
                                    'placeholder' => 'Short Description (Nepali)',
                                ]) }}
                        </div>
                    </div>
                </div>

                <div class="form-group form-material row">
                    <div class="col-sm-12">
                        {!! Form::label('content_ne', 'Content (Nepali)', ['class' => 'control-label' ])  !!}

                        {{ Form::textarea('content_ne', null, [
                               'class'       => 'form-control editor',
                               'placeholder' => 'Project Description (Nepali)'
                           ]) }}
                    </div>
                </div>

            </div>
            <div class="form-group form-material">
                {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}

@endsection

