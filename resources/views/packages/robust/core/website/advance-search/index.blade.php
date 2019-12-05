@set('search',$setting_helper->getSettingByType('search'))
@inject('search_helper','Robust\RealEstate\Helpers\AdvanceSearchHelper')
@if(!empty($search))
    <div id='adv-search-dropdown'>
        <form method="post" action="{{route('website.realestate.search')}}">
            @csrf
            <div class="inner">
                <div class="row">
                    @include(Site::templateResolver('core::website.advance-search.first-block'),['blocks' => $search['first_block']])
                    @include(Site::templateResolver('core::website.advance-search.second-block'),['blocks' => $search['second_block']])
                    @include(Site::templateResolver('core::website.advance-search.third-block'),['blocks' => $search['third_block']])
                    @include(Site::templateResolver('core::website.advance-search.fourth-block'),['blocks' => $search['fourth_block']])
                </div>
                <div class="row">
                    <div class="col s12 mb-20 right-align">
                        <button href="#" class="theme-btn" type="submit">search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endif
