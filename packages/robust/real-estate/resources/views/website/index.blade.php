@extends(Site::templateResolver('core::website.layouts.default'))
@set('locations', $location_helper->getLocations(['cities','counties','zips']))
@section('header')
@endsection
@section('body_section')
   <div>
       <h4> {{ $model->title }}</h4>
   {!!  $model->content  !!}
   </div>
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.layouts.partials.footer'))
@endsection
