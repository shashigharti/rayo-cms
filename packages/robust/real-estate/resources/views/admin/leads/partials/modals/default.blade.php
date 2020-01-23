<div id="{{$id}}" class="modal">
    <div class="modal-content">
        <form action="{{$action}}" method="POST">
            @csrf
            <div class="modal-header">
                <span>Add {{ucfirst($type)}}</span>
                <a href="#!" class="modal-action modal-close right"><i class="material-icons">clear</i></a>
            </div>
            <div class="modal-body">
                <div class="input-field">
                    <input type="text" name="{{$type}}" value="{{$value}}">
                    <label>{{ucfirst($type)}}</label>
                </div>
            </div>
            <div class="modal-footer">
                <input href="#" type="submit" class=" btn theme-btn"></input>
            </div>
        </form>
    </div>
</div>
