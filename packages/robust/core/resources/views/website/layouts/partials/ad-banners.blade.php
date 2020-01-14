@set('singleColBlocks', $banner_helper->getBannersByType(['single-col-block']))
<section class="search-lists">
    <div class="container-fluid">
        <div class="row">
            @set('col',settings('real-estate','banner_per_row') ? 12/settings('real-estate','banner_per_row') : 4)
            @foreach($singleColBlocks as $singleColBlock)
                @set('properties',json_decode($singleColBlock->properties,true))
                @if(isset($properties['property_type']) && count($properties['property_type']) > 0)
                    @include(Site::templateResolver("core::website.banners.single-col-block-with-type", [
                        'properties' => $singleColBlock->properties,
                        'col' => $col
                     ]))
                @else
                    @include(Site::templateResolver("core::website.banners.single-col-block", [
                        'properties' => $singleColBlock->properties,
                        'col' => $col
                    ]))
                @endif
            @endforeach
        </div>
    </div>
</section>
@include(Site::templateResolver("core::website.banners.two-col-ad"))
@include(Site::templateResolver("core::website.banners.slider"))
