@set('blocks',['search','type','status','pictures'])
<div class="col s3">
    <div class="input-field col s12">
        @foreach($blocks as $block)
            @include(Site::templateResolver('core::website.advance-search.partials.'.$block))
        @endforeach
    </div>
</div>
