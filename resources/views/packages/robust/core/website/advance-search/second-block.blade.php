@set('blocks',['city','county','zip','price','beds','bathrooms','subdivision'])
<div class="col s3">
    @foreach($blocks as $block)
        @include(Site::templateResolver('core::website.advance-search.partials.'.$block))
    @endforeach
</div>
