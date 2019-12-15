<div class="col s3">
    @foreach($blocks as $block)
        @if(isset($adSearchConfig[$block]))
            @include(Site::templateResolver('real-estate::website.advance-search.partials.'.$adSearchConfig[$block]['blade']),
            [
                'attribute' => $block,
                'display_name' => $adSearchConfig[$block]['display_name']
            ])
        @else 
            @include(Site::templateResolver('real-estate::website.advance-search.partials.'.$block))
        @endif
    @endforeach
</div>

