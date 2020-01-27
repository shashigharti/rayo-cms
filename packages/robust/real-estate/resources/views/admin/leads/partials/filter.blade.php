@set('statuses',$lead_helper->getStatus())
<div class="row filter--bar">
    <div class="col s12">
        <div class="col left">
            <ul class="">
                <li class="">
                    <a class="" href="{{route('admin.leads.index',request()->except(['status']))}}">All</a>
                </li>
                @foreach($statuses as $status)
                    <li class="">
                        <a class="" href="{{request()->fullUrlWithQuery(['status'=>$status->id])}}">{{$status->value}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="input-field theme--select col s2">
            {{ Form::select('agent_id',['All Agent List'] + $agent_helper->getAgentsForDropdown()->toArray(), request()->get('agent'), [
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
                <a  href="{{route('admin.leads.index')}}"><i class="fa fa-refresh fa-lg"></i>Refresh</a>
            </button>
            <div class="right-align pagination--top">
                <ul class="pagination theme--pagination right">
                    <li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                </ul>
                <span class="badge badge-secondary">Total Leads: {{$records->count()}} </span>
            </div>
        </div>
    </div>
</div>
