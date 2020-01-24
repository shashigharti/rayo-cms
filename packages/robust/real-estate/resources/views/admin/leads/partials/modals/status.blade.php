@set('statuses',$lead_helper->getStatus())
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
                    <select class="select-dropdown" name="status_id" >
                        @foreach($statuses as $status)
                            <option value="{{$status->id}}" {{$status->id == $value ? 'selected' : ''}}>{{$status->value}}</option>
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
