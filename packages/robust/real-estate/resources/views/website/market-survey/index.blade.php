@extends(Site::templateResolver('real-estate::website.layouts.default'))
@inject('banner_helper','Robust\RealEstate\Helpers\BannerHelper')
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
    <section class="market market-survey main-content">
        <div class="row">
           <div class="col s7">
               <div class="market-survey__left-container">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a class="leaflet__map-container active" href="#leaflet__map-container">Map View</a></li>
                            <li class="tab col s3"><a class="leaflet__compare-container" href="#leaflet__compare-container">Compare</a></li>
                        </ul>
                    </div>
                    <div id="leaflet__map-container" data-zoom="10"
                        style="width: 100%; height: 900px"
                        class="leaflet__map-container" 
                    >                  
                            
                    </div>
                    <div id="leaflet__compare-container" class="col s12">
                        No properties selected to compare
                    </div> 
                </div>               
            </div>
            <div class="col s5">
                <div class="market-survey__right-container">
                    <div class="market-survey__right-container--tabs">
                        <div class="market-survey__right-container--header">
                            <h1>Alaska Real State</h1>
                            <ul class="tabs">
                                <li class="tab"><a class="market-survey__listings active" href="#market-survey__listings">Listings</a></li>
                                <li class="tab"><a class="market-survey__insights" href="#market-survey__insights">Market Insights</a></li>
                            </ul>
                        </div>
                        <div id="market-survey__listings" class="market-survey__listings" data-url="{{route('api.market.survey.listings')}}">
                            @include(Site::templateResolver('real-estate::website.market-survey.partials.listings'))
                        </div>
                        <div id="market-survey__insights" class="market-survey__insights">
                            @include(Site::templateResolver('real-estate::website.market-survey.partials.insights'))
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



