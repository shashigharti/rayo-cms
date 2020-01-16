@extends('core::admin.layouts.sub-layouts.create')

@section('form')
    @set('ui', new $ui)
    {{ Form::model($model, ['route' => $ui->getRoute($model), 'method' => $ui->getMethod($model) ]) }}
    <div id="{{ $title }}" class="col s12">
        <div class="row">
            @if(isset($type))
                @include("real-estate::admin.leads.partials.details.{$type}")
            @else
                @include("real-estate::admin.leads.partials.details.overview")
            @endif
            <div class="col s12">
                {{ Form::submit($ui->getSubmitText(), ['class' => 'waves-light btn']) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
