@set('blocks',['acres','square','year','stories','garage','lot','style'])
<div class="col s3">
    @foreach($blocks as $block)
        @include(Site::templateResolver('core::website.advance-search.partials.'.$block))
    @endforeach
</div>
