@set('agents',$lead_helper->getAgents())
@set('followup',null)
@if($value)
    @set('followup',$lead_helper->getFollowup($value))
@endif
<div id="{{$id}}" class="modal">
    <div class="modal-content">
        <form action="{{$action}}" method="POST">
            @csrf
            <div class="modal-header">
                <span>{{ucfirst($type)}}</span>
                <a href="#!" class="modal-action modal-close right ">
                    <i class="material-icons">clear</i>
                </a>
            </div>
            <div class="modal-body">
                <div class="row viewed-lead">
                    <div class="col s12">
                        {{ Form::date('date',$followup ? $followup->date : '',['placeholder'=>'Select Date']) }}
                    </div>
                    <div class="col s12 mt-3">
                        {{ Form::Select('type',['Select Followup Type','Follow Up','To Do','Call Reminder'],$followup ? $followup->type : '',['class'=>'form-control']) }}
                    </div>
                    <div class="col s12 mt-3">
                        @set('selected',$followup ? $followup->agent_id : '')
                        <select class="select-dropdown" name="agent_id" >
                            @foreach($agents as $agent)
                                <option value="{{$agent->id}}" {{$agent->id == $selected ? 'selected' : ''}}>{{$agent->first_name}} {{$agent->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s12">
                        {{ Form::textarea('note',$followup ? $followup->note : '',['placeholder'=>'notes']) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input href="#" type="submit" class=" btn theme-btn"></input>
            </div>
        </form>
    </div>
</div>
