@set('city_one_sliders',$banner_helper->byType(3,true))
@set('buy_now',$banner_helper->byType(2,false))
@set('city_two_sliders',$banner_helper->byType(4,true))
<section class="advertisement">
    <div class="container-fluid">
        <div class="row">
            <div class="col s8">
                <h4 class="sub-title">Homes For Sale in Honolulu</h4>
            </div>
            <div class="col s4 right-align">
                <a href="#" class="view-all">View All</a>
            </div>
        </div>
        <div class="adv-slider2">
            @foreach($city_one_sliders as $slider)
                <div class="single-block">
                    <img src={{$slider->media->file}}>
                    <div class="slider--text">
                        <h4>$149,000</h4>
                        <p>{{$slider->media->name}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="adv--single">
    <img src={{$buy_now[0]->media->file}}>
    <div class="adv-single-text">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
        <a href="#" class="buy-now-btn">Buy Now</a>
    </div>
</section>
<section class="advertisement">
    <div class="container-fluid">
        <div class="row">
            <div class="col s8">
                <h4 class="sub-title">Homes For Sale in Hawaii</h4>
            </div>
            <div class="col s4 right-align">
                <a href="#" class="view-all">View All</a>
            </div>
        </div>
        <div class="adv-slider">
            @foreach($city_two_sliders as $slider)
                <div class="single-block">
                    <img src={{$slider->media->file}}>
                    <div class="slider--text">
                        <h4>$149,000</h4>
                        <p>{{$slider->media->name}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

