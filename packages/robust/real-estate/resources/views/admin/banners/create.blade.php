@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)
    @set('properties', json_decode($model->properties))
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
            <div class="form-group form-material row">
                <div class="col s12 file-uploader" data-base-path="{{url('api/file-uploader/image/')}}"
                     data-dest=".file-uploader_files"
                     data-upload-path="{{route('api.file-uploader.image.upload')}}"
                >
                    @csrf
                    {{ Form::label('properties[image]', 'Banner Image') }}
                    @set('files', (isset($properties['image']) && $properties['image'] != '') ?  explode(',', $properties['image']): [])
                    <div class="col s12 file-uploader__preview">
                        @foreach($files as $file)
                            <div data-id="{{ $file }}" class="file-uploader__file">
                                <img height="80" src="{{ getMedia($file) ?? '' }}"/>
                                <a  data-delete-path="{{url('file-uploader/image/' . $file)}}"
                                    href="javascript:void(0)"
                                    class="file-uploader__delete-btn"
                                >
                                    <i class="material-icons"> delete </i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="col s12">(Image Size: 200 x 200)</div>
                    <div class="col s12">
                        {{ Form::file('files[]', [
                                'class' =>'col s6 file-uploader__input',
                                'multiple' => 'multiple'
                            ])
                        }}
                        <button type="button"
                                class="btn theme-btn file-uploader__upload-btn"
                        >
                            Upload Logo
                        </button>
                    </div>
                    {{ Form::hidden('properties[image]', $properties['image'] ?? null, [
                            'class' => 'file-uploader_files'
                        ])
                    }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::select('template', [
                            'Choose template' => 'Choose template',
                            'two-col-ad' => 'Two Column Ad',
                            'main-banner' => 'Main Banner',
                            'full-screen-ad' => 'Full Screen Ad',
                            'single-col-block' => 'Single Column Block',
                            'slider' => 'Slider',
                            'banner-slider' => 'Banner Slider'
                        ],
                        request()->query('template') ?? $model->template ?? 'Choose template',
                        [
                            'required'  => 'required',
                            'class' => 'select-reload-on-change',
                            'data-url-to-reload' => url()->current()
                        ])
                    }}
                    {{ Form::label('template', 'Template', ['class' => 'required' ]) }}
                </div>
            </div>
            <div class="container sub--block">
                @set('template', request()->query('template') ?? $model->template)
                @if($template)
                     @include("real-estate::admin.banners.partials.{$template}", ['properties' => $properties])
                @endif
            </div>
            <div class="row">
                <div class="col s12">
                   {{ Form::submit($ui->getSubmitText(), ['class' => 'waves-light btn theme-btn']) }}
                </div>
            </div>
        </div>
    {{ Form::close() }}
@endsection
