@set('blocks',['construction','amenities','basement','interior','exterior','construction-status'])
<div class="col s3">
    @foreach($blocks as $block)
        @include(Site::templateResolver('core::website.advance-search.partials.'.$block))
    @endforeach
    <div class="mb-20">
        <div class="col s12 right-align">
            <a href="#" class="theme-btn">search</a>
        </div>
    </div>
</div>
