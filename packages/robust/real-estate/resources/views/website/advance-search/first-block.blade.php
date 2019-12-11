<div class="col s3">
    <div class="col s12">
        @foreach($blocks as $block)
            @include(Site::templateResolver('real-estate::website.advance-search.partials.'.$block))
        @endforeach
    </div>
</div>
