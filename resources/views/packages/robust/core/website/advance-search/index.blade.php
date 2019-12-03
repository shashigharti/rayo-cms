@set('search',$setting_helper->getSettingByType('search'))
@if($search && !empty($search))
    <div id='adv-search-dropdown'>
        <div class="inner">
            <div class="row">
                @include(Site::templateResolver('core::website.advance-search.first-block'),['blocks' => $search['first_block']])
                @include(Site::templateResolver('core::website.advance-search.second-block'),['blocks' => $search['second_block']])
                @include(Site::templateResolver('core::website.advance-search.third-block'),['blocks' => $search['third_block']])
                @include(Site::templateResolver('core::website.advance-search.fourth-block'),['blocks' => $search['fourth_block']])
            </div>
        </div>
    </div>
@endif
