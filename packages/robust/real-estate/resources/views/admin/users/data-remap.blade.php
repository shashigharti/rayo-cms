@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    <div id="loading-image" class="hidden">
        Loading
        <i class="fa fa-spinner fa-spin"></i>
    </div>
    {{ Form::open(['route'=>['admin.mlsuser.data-remap.store','id'=>$user_id],'method'=>'post']) }}
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('resource', 'Resources', ['class' => 'control-label required' ]) }}
                {{ Form::select('resource',$resources ,null, [
                        'class'       => 'form-control data-map_resource',
                        'required'    => 'required',
                        'data-user'=>$user_id
                    ]) }}
            </div>
        </div>
        <div class="class-container" data-url="{{route('admin.mlsuser.data-map.classes')}}">

        </div>
    </div>
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('key', 'Key', ['class' => 'control-label' ]) }}
                {{ Form::select('key',$fillable ,null, [
                        'class'       => 'form-control data_remap_key',
                        'required'    => 'required',
                    ]) }}
            </div>
        </div>
    </div>
    <button class="data-remap_add btn btn-primary" data-url="{{route('admin.mlsuser.data-remap.add-field')}}">Add</button>
    <div class="field-container" data-url="{{route('admin.mlsuser.data-remap.field')}}">

    </div>
    <div class="form-group form-material">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary theme-btn']) }}
    </div>
    {{ Form::close() }}
@endsection

