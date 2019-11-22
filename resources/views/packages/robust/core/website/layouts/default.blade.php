@extends('core::website.layouts.blank')
@section('body_content')
    <header>
        @yield('header')
    </header>
    
    @yield('body_section') 
    <footer>
    	@include(Site::templateResolver('core::website.frontpage.partials.footer'))
	</footer>
      
@endsection
