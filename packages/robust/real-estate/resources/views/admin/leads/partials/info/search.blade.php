<a href="#search" class="btn btn-small cyan modal-trigger">
    <i class="material-icons">search</i>Add Search
</a>
<div id="search" class="modal modal-fixed-footer modal--search">
    <div class="modal-content">
        <div class="modal-header">
            <span>Add Search</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
        </div>
        <div class="modal-body">
            @set('blocks', settings('advance-search'))
            @set('search_settings',settings('real-estate'))
            @set('default_values',$blocks['default_values'] ?? [])
            @if(!empty($blocks))
                <form id="frm-search" method="get" action="">
                    <div id='adv-search-dropdown'>
                        <div class="inner">
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input type="text">
                                        <label >Search Name:</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <select>
                                            <option value="" disabled selected>Notifications</option>
                                            <option value="1">Daily</option>
                                            <option value="2">Monthly</option>
                                            <option value="3">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                <div class="col s3 mb-20 right right-align mr-2">
                                    <button href="#" class="btn theme-btn" type="submit">search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="sort_by" value="{{ $query_params['sort_by'] ?? ''}}">
                </form>
            @endif
        </div>
    </div>
</div>
