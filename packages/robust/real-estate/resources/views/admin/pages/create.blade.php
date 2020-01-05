@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)

    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
        <div id="{{ $title }}" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::label('name', 'Page Name', ['class' => 'required' ]) }}
                    {{ Form::text('name', null, [
                            'placeholder' => 'Page Name i.e. \'KISAN\'',
                            'required'  => 'required',
                            'data-slug' => 'slug'
                        ]) 
                    }}
                </div>
                <div class="input-field col s6">
                    {{ Form::label('slug', 'Slug', ['class' => 'required' ]) }}
                    {{ Form::text('name', null, [
                            'placeholder' => 'Slug i.e. \'slug\''
                        ]) 
                    }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::label('excerpt', 'Excerpt', ['class' => 'required' ]) }}
                    {{ Form::text('excerpt', null, [
                            'placeholder' => 'Short Description',
                            'required'  => 'required'
                        ]) 
                    }}
                </div>
            </div>
            <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('content', 'Meta Content', ['class' => 'required' ]) }}
                        {{ Form::text('content', null, [
                                'placeholder' => 'Content',
                                'required'  => 'required'
                            ]) 
                        }}
                    </div>
            </div>

                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('meta_title', 'Meta Title', ['class' => 'required' ]) }}
                        {{ Form::text('meta_title', null, [
                                'meta_title' => 'Content',
                                'required'  => 'required'
                            ]) 
                        }}
                    </div>
                     <div class="input-field col s6">
                        {{ Form::label('meta_keywords', 'Meta Keywords', ['class' => 'required' ]) }}
                        {{ Form::text('meta_keywords', null, [
                                'meta_keywords' => 'Content',
                                'required'  => 'required'
                            ]) 
                        }}
                    </div>
                </div>
            <div class="row">
                <div class="input-field col s12">
                        {{ Form::label('meta_description', 'Meta Description', ['class' => 'required' ]) }}
                        {{ Form::text('meta_description', null, [
                                'meta_description' => 'Content',
                                'required'  => 'required'
                            ]) 
                        }}
                </div>
            </div>
        </div>
    {{ Form::close() }}
@endsection