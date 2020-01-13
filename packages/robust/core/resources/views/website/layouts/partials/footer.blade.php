@inject('page_helper, 'Robust\RealEstate\Helpers\PageHelper')
@set('links',$page_helper->getLinksByType('useful-links'))
<div class="container-fluid">
    <div class="row">
        <div class="col m4 s12">
            <h3>Contact details</h3>
            {!!  settings('app-setting', 'footer_content')  !!}
        </div>
        <div class="col m4 s12">
            <h3>useful links</h3>
            @if(isset($links))
                @foreach($links as $links)
                    <a href="{{route('website.realestate.pages.details',['slug'=>$links->slug])}}">
                        <p>{{ $links->title }}</p>
                    </a>
                @endforeach
            @endif
        </div>
        <div class="col m4 s12">
            <h3>info & services</h3>
            <a href="#">
                <p>HOMES FOR SALE</p>
            </a>
            <a href="#">
                <p>SOLD HOMES</p>
            </a>
            <a href="#">
                <p>ACTIVE PROPERTIES</p>
            </a>
            <a href="#">
                <p>SEARCH LISTINGS</p>
            </a>
        </div>
    </div>
</div>
<div class="footer-bottom container-fluid">
    <div class="row">
        <div class="col s12 center-align">
            <p>{!!  settings('app-setting', 'copyright_text')  !!}</p>
        </div>
    </div>
</div>
