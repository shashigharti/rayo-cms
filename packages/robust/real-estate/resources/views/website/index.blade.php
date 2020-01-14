@extends(Site::templateResolver('core::website.layouts.default'))
@set('locations', $location_helper->getLocations(['cities','counties','zips']))
@section('header')
    @include(Site::templateResolver('core::website.layouts.partials.header'))
@endsection
@section('body_section')
<section class="market market-survey main-content">
   <div class="container-fluid">
        <div class="row">
           <div class="col s12">
               <div class="inner--main--title center-align">
                   <h1> {{ $model->title }}</h1>
               </div>
           </div>
       </div>
        <div class="row">
           <div class="col s12">
               <div class="body--content">
                   {!!  $model->content  !!}
               </div>
           </div>
       </div>
   </div>
</section>
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.layouts.partials.footer'))
@endsection
