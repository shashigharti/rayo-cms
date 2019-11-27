@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.header'))
@endsection
@section('body_section')
    <section class="market-survey main-content map-section">
        <div class="row">
           <div class="col s7">
                <div id="market-survey__left-container" class="market-survey__left-container map" >
                    
                </div>
            </div>
            <div class="col s5">
                <div class="market-survey__right-container">
                <div class="market-survey__right-container--tabs">
                    <div class="market-survey__right-container--header">
                        <h1>Alaska Real State</h1>
                        <ul class="tabs">
                            <li class="tab"><a class="active" href="#market-survey__listings">Listings</a></li>
                            <li class="tab"><a  href="#market-survey__insights">Market Insights</a></li>
                        </ul>
                    </div>

                    <div id="market-survey__listings" class="market-survey__listings">
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
    <!-- <script>
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
    </script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVMGPU0xbiE-XtO-U61AltLGW05KKF0cY&libraries=drawing&callback=initMap"
            async defer></script>
@endsection



