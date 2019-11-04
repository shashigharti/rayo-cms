@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    {{ Form::open(['route'=>['admin.mlsuser.query.store','id'=>$user_id],'method'=>'post']) }}
    <button class="btm btn-default add-query_filter" data-url="{{route('admin.mlsuser.query.field')}}">Add Filter</button>
    <div class="form-group form-material row filter-container">
        @if(!empty($filters))
            @foreach($filters as $filter)
                @include('mls::admin.users.partials.filters',[
                'fields'=>$fields,'field'=>$filter['field'],'mapped_key'=>$filter['mapped_key'],'value'=>$filter['value']])
            @endforeach
        @else
            @include('mls::admin.users.partials.filters',[
                'fields'=>$fields,'field'=>'','mapped_key'=>'','value'=>''])
        @endif
    </div>
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('query_limit', 'Limit', ['class' => 'control-label required' ]) }}
                {{ Form::text('query_limit' ,$limit, [
                        'class'       => 'form-control',

                    ]) }}
            </div>
        </div>
    </div>
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('number_of_days', 'Number of days', ['class' => 'control-label' ]) }}
                {{ Form::text('number_of_days' ,$number_of_days, [
                        'class'       => 'form-control',
                    ]) }}
            </div>
        </div>
    </div>
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('picture', 'Picture Only', ['class' => 'control-label' ]) }}
                {{ Form::select('picture' ,['1'=>'Yes','0'=>'No'],$picture ,[
                        'class'       => 'form-control',
                    ]) }}
            </div>
        </div>
    </div>

    <div class="form-group form-material">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary theme-btn']) }}
    </div>
    {{ Form::close() }}
@endsection

