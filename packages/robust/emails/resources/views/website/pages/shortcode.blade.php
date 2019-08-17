@inject('localization, 'Robust\Localization\Helpers\LocalizationHelper')
@if($page)
    <div class="col-md-4">
        @if($page->downloads()->count() > 0)
            <img src="{{ $page->downloads()->first()['file'] }}"
                 class="img-responsive  img-thumbnail">
        @endif
        <p>{!! $localization->getLocaleValue($page, 'name') !!}</p>
        <p><b>{!! $localization->getLocaleValue($page, 'content') !!}</b></p>
    </div>
@endif