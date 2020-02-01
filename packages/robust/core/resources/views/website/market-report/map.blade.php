@extends(Site::templateResolver('core::website.layouts.default'))

@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@set('locations',$location_helper->getLocations(['cities','counties','zips']))
@set('settings', config('rws.market-report'))

@section('header')
    @include(Site::templateResolver('core::website.layouts.partials.header'))
@endsection
@section('body_section')
    <section class="market map-view main-content" data-page='{{$page_type}}'>
        <div class="container-fluid">
            @include(Site::templateResolver('core::website.market-report.partials.info'))
            <h5>
            @foreach($records as $record)
                {{ $record->name . "," }}
            @endforeach
            </h5>
            <div class="row">
                @include('core::website.partials.map')
            </div>
        </div>
    </section>
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.layouts.partials.footer'))
@endsection

