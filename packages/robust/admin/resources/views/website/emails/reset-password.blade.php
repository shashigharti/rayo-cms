@extends('core::common.layouts.email')

@section('content')
    <h2>Thank you..</h2>
    <h3>Your password reset link : <a href="{{$link}}">Reset</a></h3>
@endsection
