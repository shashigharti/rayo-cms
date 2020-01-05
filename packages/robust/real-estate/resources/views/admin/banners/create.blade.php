@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)
    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
        <div id="{{ $title }}" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::label('title', 'Banner Title', ['class' => 'required' ]) }}
                    {{ Form::text('title', null, [
                            'placeholder' => 'Banner Title i.e. \'KISAN\'',
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
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::label('template', 'Template', ['class' => 'required' ]) }}
                    {{ Form::select('template', [
                            'two-col-ad' => 'Two Column Ad',
                            'main-banner' => 'Main Banner',
                            'full-screen-ad' => 'Full Screen Ad',
                            'single-col-block' => 'Single Column Block',
                            'slider' => 'Slider'
                        ],
                        1,
                        [
                            'required'  => 'required',
                            'class' => 'select-reload-on-change'
                        ])
                    }}
                </div>
            </div>
            @include("real-estate::admin.banners.partials.two-col-ad")
            <div class="row">
                <div class="col s12">
                   {{ Form::submit($ui->getSubmitText(), ['class' => 'waves-light btn']) }}
                </div>
            </div>
        </div>
    {{ Form::close() }}
@endsection
