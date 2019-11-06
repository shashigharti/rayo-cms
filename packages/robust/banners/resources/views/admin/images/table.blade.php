@extends('core::admin.layouts.sub-layouts.table')

@section('after_table')
    {{ Form::model($child, ['route' => $child_ui->getRoute($child), 'method' => $child_ui->getMethod($child) ]) }}

    {{--<div class="form-group form-material row">--}}
    {{--<div class="col-sm-12">--}}
    {{--{{ Form::label('name', 'Choose Image', ['class' => 'control-label required' ])  }}--}}

    {{--<div class="input-group">--}}
    {{--<span class="input-group-btn">--}}
    {{--<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">--}}
    {{--<i class="fa fa-picture-o"></i> Choose--}}
    {{--</a>--}}
    {{--</span>--}}
    {{--{{ Form::text('image', null, ['id' => 'thumbnail', 'class' => 'form-control']) }}--}}
    {{--</div>--}}
    {{--<img id="holder" style="margin-top:15px;max-height:100px;">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<a class="btn theme-btn button-media_manager" data-type="image"--}}
    {{--data-url="{{ route('admin.media.modal.type', 'image') }}" href="javascript:void(0)" data-field="media_id">Select--}}
    {{--Image</a>--}}
    {{--<div class="selected-images">--}}

    {{--</div>--}}

    {!! Form::media($child, ['button' => 'Add Image']) !!}
    <div class="form-group form-material row">
        <div class="col-sm-6">
            {!! (Form::label('datepicker', 'Date Range', ['class' => 'control-label required' ]))  !!}
            <div class="input-group input-daterange datepicker">
                <input type="text" class="form-control" name="start_date" value="{{$child->start_date}}">
                <div class="input-group-addon">to</div>
                <input type="text" class="form-control" name="end_date" value="{{$child->end_date}}">
            </div>

        </div>
    </div>

    <div class="form-group form-material row">
        <div class="col-sm-12">
            {!! Form::label('link', 'Link', ['class' => 'control-label' ]) !!}
            {{ Form::text('link', null, [
            'class'       => 'form-control',

            ]) }}
        </div>
    </div>

    <div class="form-group form-material row">
        <div class="col-sm-12">
            {!! Form::label('target', 'Window', ['class' => 'control-label' ])  !!}
            {{ Form::select('target', ['internal' => 'Internal', 'external' => 'External'], null, [
            'class'       => 'form-control',

            ]) }}
        </div>
    </div>

    <div class="form-group form-material row">
        <div class="col-sm-12">
            {!! Form::label('description', 'Description', ['class' => 'control-label' ])  !!}
            {{ Form::textarea('description', null, [
            'class'       => 'form-control name',
            'rows' => 4
            ]) }}
        </div>
    </div>
    {{Form::hidden('banner_id', ($child->exists) ? $child->banner_id : $model->id) }}
    <div class="form-group form-material">
        {{ Form::submit($child_ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
    </div>
    {{Form::close()}}

@stop