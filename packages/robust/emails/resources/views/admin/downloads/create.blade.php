@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)
    @set('parent_id', $query_params['parent_id'])

    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model), 'id' => "outcomes_form", 'enctype' => 'multipart/form-data' ]) }}
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-12">
                {!! Form::label('name', 'Name', ['class' => 'required control-label' ])  !!}
                {{ Form::text('name', null, [
                        'class'       => 'form-control name',
                        'placeholder' => 'Download Name i.e. \'KISAN\'',
                        'required'    => 'required',
                    ]) }}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="">
            <div class="col-sm-12">
                {!! Html::decode(Form::label('file', '<b>File</b>', ['class' => 'required scontrol-label' ]))  !!}
                {{ Form::file('file', null, [
                        'class'       => 'form-control name',
                        'placeholder' => 'Download Name i.e. \'KISAN\'',
                        'required'    => 'required',
                    ]) }}
            </div>
        </div>
    </div>
    <div class="form-group form-material row">
        <div class="col-sm-12">
            {!! Form::label('description', 'Description', ['class' => 'required control-label' ])  !!}

            {{ Form::textarea('description', null, [
                   'class'       => 'form-control editor',
                   'placeholder' => 'Outcome assumption'
               ]) }}
        </div>
    </div>
    {{ Form::hidden('referer', route('admin.page.downloads.get-page-downloads', $parent_id)) }}
    {{ Form::hidden('page_id', $parent_id) }}
    <div class="form-group form-material">
        {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
    </div>
    {{ Form::close() }}

@endsection

