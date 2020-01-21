@set('properties',$model->properties()->where('type',$type)->get())
<div class="row">
    <div class="col s12">
        <h5> {{ucfirst($type)}}
            <a href="#add-{{$type}}" class="modal-trigger">
                <i class="material-icons right">add</i>
            </a>
            <div id="add-{{$type}}" class="modal">
                <div class="modal-content">
                    <form action="{{route('admin.leads.properties.store',['id'=>$model->id])}}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <span>Add {{ucfirst($type)}}</span>
                            <a href="#!" class="modal-action modal-close right"><i class="material-icons">clear</i></a>
                        </div>
                        <div class="modal-body">
                            <div class="input-field">
                                <input type="email" name="{{$type}}">
                                <label>{{ucfirst($type)}}</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input href="#" type="submit" class=" btn theme-btn"></input>
                        </div>
                    </form>
                </div>
            </div>
        </h5>
        @foreach($properties as $property)
            <div>
                <i class="grey material-icons">close</i>{{$property->value}}
                <a href="{{route('admin.leads.properties.delete',['id' => $property->id])}}" class="right">
                    <i class="material-icons">delete</i>
                </a>
                <a href="#{{$type}}-edit-{{$property->id}}" class="right modal-trigger">
                    <i class="material-icons">edit</i>
                </a>
                <div id="{{$type}}-edit-{{$property->id}}" class="modal">
                    <div class="modal-content">
                        <form action="{{route('admin.leads.properties.update',['id'=>$property->id])}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <span>Edit {{ucfirst($type)}}</span>
                                <a href="#!" class="modal-action modal-close right ">
                                    <i class="material-icons">clear</i>
                                </a>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="input-field">
                                        <input type="{{$input_type}}" value="{{$property->value}}" name="{{$property->type}}">
                                        <label>{{ucfirst($type)}}</label>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input href="#" class=" btn theme-btn" type="submit"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
