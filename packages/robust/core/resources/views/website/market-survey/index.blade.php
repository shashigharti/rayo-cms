@extends(Site::templateResolver('core::website.layouts.default'))

@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')

@section('header')
    @include(Site::templateResolver('core::website.layouts.partials.header'))
@endsection

@section('body_section')
    <section class="market market-survey main-content">
        <div class="row">
            <div class="col s12 market-survey__heading">
                <h1>{{ ucwords(str_replace('-', ' ', $location['slug'])) }}</h1>
            </div>
            <div class="col s6">
                <div class="market-survey__left-container">
                    <div class="col s12 market-survey__right-container--tabs">
                        <ul class="tabs">
                            <li class="tab col s3">
                                <a class="leaflet__map-container active"
                                   href="#leaflet__map-container">
                                    Map View
                                </a>
                            </li>
                            <li class="tab col s3">
                                <a class="leaflet__compare-container"
                                   href="#leaflet__compare-container">
                                    Compare
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="leaflet__map-container" data-zoom="10"
                         style="width: 100%; height: 900px"
                         class="leaflet__map-container"
                         data-geocode="{{ implode(',', $location['geocode']) }}"
                    >
                    </div>
                    <div id="leaflet__compare-container" class="leaflet__compare-container col s12">
                        No properties selected to compare
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="market-survey__right-container">
                    <div class="market-survey__right-container--tabs">
                        <div class="market-survey__right-container--header">
                            <ul class="tabs">
                                <li class="tab">
                                    <a class="market-survey__listings active"
                                       href="#market-survey__listings">
                                        Listings
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="market-survey__listings"
                             class="market-survey__listings"
                             data-property-url="{{ url('real-estate/slug') }}"
                             data-url="{{ route('api.market.survey.listings', [
                                            'location_type' => $location['type'],
                                            'location' => $location['slug']
                                            ])
                                        }}"
                        >
                            @include(Site::templateResolver('core::website.market-survey.partials.listings'))
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.layouts.partials.footer'))
@endsection



