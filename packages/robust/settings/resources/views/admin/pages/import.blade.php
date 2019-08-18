@inject('menu_helper', 'Robust\Core\Helpers\MenuHelper')
@extends('core::admin.layouts.default')
@section('content')
    @set('ui', new $ui)
    @inject('category_helper', 'Robust\Pages\Helpers\CategoryHelper')
    <div class="page">
        <div class="page-content">
            <div class="container form-container">
                <div class="panel-box panel-default">
                    <div class="form__wrapper">
                        @include("core::admin.partials.messages.info")

                        {{ Form::open(['url' => route('admin.pages.import'), 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        <div class="form-group row">
                            <div class="">
                                <div class="col-sm-12">
                                    {!! Form::label('file', 'File', ['class' => 'required control-label' ])  !!}
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-material">
                            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

