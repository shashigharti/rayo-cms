@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)

    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
        <div id="{{ $title }}" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::label('title', 'Page Name', ['class' => 'required' ]) }}
                    {{ Form::text('title', null, [
                            'placeholder' => 'Page Name i.e. \'KISAN\'',
                            'required'  => 'required',
                            'data-slug' => 'slug'
                        ]) 
                    }}
                </div>
                <div class="input-field col s6">
                    {{ Form::label('slug', 'Slug', ['class' => 'required' ]) }}
                    {{ Form::text('slug', null, [
                            'placeholder' => 'Slug i.e. \'slug\''
                        ]) 
                    }}
                </div>
            </div>
            <div class="row editor">                
                <div class="input-field col s12">
                    {{ Form::label('content', 'body', ['class' => 'required' ]) }}
                    {{ Form::textarea('content', null, [
                            'placeholder' => 'Email body',
                            'required'  => 'required',
                            'id' => 'editor__body',
                            'class' => 'editor'
                        ]) 
                    }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::label('meta_title', 'Meta Title', ['class' => 'required' ]) }}
                    {{ Form::textarea('meta_title', null, [
                            'meta_title' => 'Content',
                            'required'  => 'required'
                        ]) 
                    }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::label('meta_keywords', 'Meta Keywords', ['class' => 'required' ]) }}
                    {{ Form::textarea('meta_keywords', null, [
                            'meta_keywords' => 'Content',
                            'required'  => 'required'
                        ]) 
                    }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::label('meta_description', 'Meta Description', ['class' => 'required' ]) }}
                    {{ Form::textarea('meta_description', null, [
                            'meta_description' => 'Content',
                            'required'  => 'required'
                        ]) 
                    }}
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                   {{ Form::submit($ui->getSubmitText(), ['class' => 'waves-light btn']) }}           
                </div>
            </div>
        </div>
    {{ Form::close() }}
@endsection