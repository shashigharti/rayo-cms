@extends('core::website.layouts.blank')
@section('body_content')
    <header>
        @yield('header')
    </header>

    @yield('body_section')

    <footer>
        @yield('footer')
	</footer>

@endsection
