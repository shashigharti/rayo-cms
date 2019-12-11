@set('blocks',$setting_helper->getValuesBySlug('search-block'))
@set('search_settings',$setting_helper->getValuesBySlug('search'))
@if(!empty($blocks))
    <div id='adv-search-dropdown'>
        <form method="get">
            <div class="inner">
                <a href="" class="advance-search advance-search_close"><i class="material-icons">clear</i></a>
                <div class="row">
                    @include(Site::templateResolver('real-estate::website.advance-search.first-block'),['blocks' => $blocks['first_block']])
                    @include(Site::templateResolver('real-estate::website.advance-search.second-block'),['blocks' => $blocks['second_block']])
                    @include(Site::templateResolver('real-estate::website.advance-search.third-block'),['blocks' => $blocks['third_block']])
                    @include(Site::templateResolver('real-estate::website.advance-search.fourth-block'),['blocks' => $blocks['fourth_block']])
                </div>
                <div class="row">
                    <div class="col s3 mb-20 right">
                        <button href="#" class="theme-btn" type="submit">search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endif
