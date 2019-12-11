<div class="col s3">
    @foreach($blocks as $block)
        @include(Site::templateResolver('real-estate::website.advance-search.partials.'.$block))
    @endforeach
</div>
