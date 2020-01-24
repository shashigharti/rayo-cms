@set('statuses',$lead_helper->getStatus())
<div class="row filter--bar">
    <div class="col s12">
        <div class="col left">
            <ul class="">
                @foreach($statuses as $status)
                    <li class="">
                        <a class="" href="{{$lead_helper->getActiveUrl()}}">{{$status->value}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="input-field theme--select col s2">
            {{ Form::select('agent_id',['All Agent List'] + $agent_helper->getAgentsForDropdown()->toArray(), null, [
                'class' => 'form-control lead-filter__agent',
                'data-url' => route('admin.leads.index')
            ]) }}
        </div>
        <div class="col s12 btn--bar">
            <button class="btn btn-sm"><i aria-hidden="true" class="fa fa-check-square"></i>
            </button>
            <button class="btn  btn-sm lead-action-btn">
                <i aria-hidden="true" class="fa fa-plus-circle"></i> Add
            </button>
            <button id="filter_leads_btn" class="btn btn-sm">
                <i class="fa fa-refresh fa-lg"></i>Refresh
            </button>
            <div class="right-align pagination--top">
                <ul class="pagination theme--pagination right">
                    <li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                </ul>
                <span class="badge badge-secondary">Total Leads: 3 </span>
            </div>
        </div>
    </div>
</div>
