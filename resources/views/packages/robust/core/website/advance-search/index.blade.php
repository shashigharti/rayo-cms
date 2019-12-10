@set('blocks',$setting_helper->getSettingByType('search-block'))
@set('search_settings',$setting_helper->getSettingByType('search'))
@if(!empty($blocks))
    <div id='adv-search-dropdown'>
        <form method="post" action="{{route('website.realestate.search')}}">
            @csrf
            <div class="inner">
                <a href="" class="advance-search advance-search_close"><i class="material-icons">clear</i></a>
                <div class="row">
                    @include(Site::templateResolver('core::website.advance-search.first-block'),['blocks' => $blocks['first_block']])
                    @include(Site::templateResolver('core::website.advance-search.second-block'),['blocks' => $blocks['second_block']])
                    @include(Site::templateResolver('core::website.advance-search.third-block'),['blocks' => $blocks['third_block']])
                    @include(Site::templateResolver('core::website.advance-search.fourth-block'),['blocks' => $blocks['fourth_block']])
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
