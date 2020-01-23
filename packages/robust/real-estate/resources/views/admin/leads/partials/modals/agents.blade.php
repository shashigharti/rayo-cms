@set('agents',$lead_helper->getAgents())
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
                <div class="input-field">
                    <select class="select-dropdown" name="agent_id" >
                        @foreach($agents as $agent)
                            <option value="{{$agent->id}}" {{$agent->id == $value ? 'selected' : ''}}>{{$agent->first_name}} {{$agent->last_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <input href="#" type="submit" class=" btn theme-btn"></input>
            </div>
        </form>
    </div>
</div>
