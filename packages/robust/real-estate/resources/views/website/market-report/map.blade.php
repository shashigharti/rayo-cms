@extends(Site::templateResolver('real-estate::website.layouts.default'))

@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@set('locations',$location_helper->getLocations(['cities','counties','zips']))

@section('header')
    <header class="sub-header">
        <div class="container-fluid">
            <div class="site-menu">
                @include(Site::templateResolver('real-estate::website.frontpage.partials.menu'))
            </div>
        </div>
    </header>
@endsection
@section('body_section')
    <section class="market map-view main-content" data-page='{{$page_type}}'> 
        <div class="container-fluid">
            <div class="row">
                <div id="leaflet__map-container" data-zoom="10"
                    style="width: 100%; height: 900px" 
                    class="col s12 leaflet__map-container"
                >
                    @foreach($records as $record)
                        <p
                            class="leaflet__map-items hidden"
                            data-name="{{$record->name}}"
                            data-latitude="{{$record->latitude}}"
                            data-longitude="{{$record->longitude}}">
                        </p>             
                    @endforeach       
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.footer'))
@endsection

