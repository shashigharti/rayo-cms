@inject('page_helper', 'Robust\RealEstate\Helpers\PageHelper')
@set('links',$page_helper->getLinksByType('useful-links'))
@set('services',$page_helper->getLinksByType('info-services'))
<div class="container-fluid">
    <div class="row">
        <div class="col m4 s12">
            <h3>Contact details</h3>
            {!!  settings('app-setting', 'footer_content')  !!}
        </div>
        <div class="col m4 s12">
            <h3>useful links</h3>
            @if(isset($links))
                @foreach($links as $link)
                    <a href="{{route('website.realestate.pages.details',['slug'=>$link->slug])}}">
                        <p>{{ $link->title }}</p>
                    </a>
                @endforeach
            @endif
        </div>
        <div class="col m4 s12">
            <h3>info & services</h3>
            @if(isset($services))
                @foreach($services as $service)
                    <a href="{{route('website.realestate.pages.details',['slug'=>$service->slug])}}">
                        <p>{{ $service->title }}</p>
                    </a>
                @endforeach
            @endif
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
