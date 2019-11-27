@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.header'))
@endsection
@section('body_section')
    <section class="market-survey main-content map-section">
        <div class="row">
            <div id="market-survey__left-container" class="market-survey__left-container map col m8" >
                
            </div>
            <div class="market-survey__right-container col m4">
                <div class="market-survey__right-container--tabs">
                    <h1>Alaska Real State</h1>
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#listings">Listings</a></li>
                            <li class="tab col s3"><a class="active" href="#insights">Market Insights</a></li>
                        </ul>
                    </div>
                    <div id="listings" class="col s12">
                        @include(Site::templateResolver('real-estate::website.market-survey.partials.listings'))
                    </div>
                    <div id="insights" class="col s12">
                        @include(Site::templateResolver('real-estate::website.market-survey.partials.insights'))
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('market-survey__left-container'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });

            var drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.MARKER,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: ['circle']
                },
                markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
                circleOptions: {
                    fillColor: '#599de6',
                    fillOpacity: 0.6,
                    strokeWeight:0,
                    clickable: false,
                    editable: true,
                    zIndex: 1
                }
            });
            drawingManager.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVMGPU0xbiE-XtO-U61AltLGW05KKF0cY&libraries=drawing&callback=initMap"
            async defer></script>
@endsection


