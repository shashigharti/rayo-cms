@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    {{ Form::open(['route'=>['admin.mlsuser.field-details.upload','id'=>$user_id],'method'=>'post','enctype' => 'multipart/form-data']) }}
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
    <div class="field-container" data-url="{{route('admin.mlsuser.field-details.table')}}">

    </div>
    {{ Form::close() }}
@endsection

