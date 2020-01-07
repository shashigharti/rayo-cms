@set('blocks', $setting_helper->getValuesBySlug('advance-search'))
@if(!empty($blocks))
    <form id="frm-search" method="get" action="{{$advancesearch_helper->getSearchURL()}}">
        <div id='adv-search-dropdown'>
            <div class="inner">
                <a href="" class="advance-search advance-search_close"><i class="material-icons">clear</i></a>
                <div class="row">
                    @set('adSearchConfig', config('rws.advance-search'))
                    @if(isset($blocks['first_block']))
                        @include(Site::templateResolver('core::website.advance-search.first-block'),['blocks' => $blocks['first_block']])
                    @endif
                    @if(isset($blocks['second_block']))
                        @include(Site::templateResolver('core::website.advance-search.second-block'),['blocks' => $blocks['second_block']])
                    @endif
                    @if(isset($blocks['third_block']))
                        @include(Site::templateResolver('core::website.advance-search.third-block'),['blocks' => $blocks['third_block']])
                    @endif
                    @if(isset($blocks['fourth_block']))
                        @include(Site::templateResolver('core::website.advance-search.fourth-block'),['blocks' => $blocks['fourth_block']])
                    @endif
                </div>
                <div class="row">
                    <div class="col s3 mb-20 right">
                        <button href="#" class="theme-btn" type="submit">search</button>
                    </div>
                </div>
            </div>
        </div>
    <input type="hidden" name="sort_by" value="{{ $query_params['sort_by'] ?? ''}}">
    </form>
@endif
