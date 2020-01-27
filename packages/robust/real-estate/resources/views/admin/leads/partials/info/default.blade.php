@set('properties',$properties_helper->byType($model,[$type]))
<div class="row">
    <div class="col s12">
        <h5> {{ucfirst($type)}}
            <a href="#"
               data-lead="{{$model->id}}"
               data-url="{{route('admin.leads.modal')}}"
               data-type="{{$type}}"
               data-value=""
               data-action="{{route('admin.leads.properties.store',['id'=>$model->id])}}"
               data-mode="Add"
               data-view="default"
               class="lead-modal_trigger"><i class="material-icons right">add</i></a>
        </h5>
        @foreach($properties as $property)
            <div class="col s12 fixed__single-block mb-3">
                <i class="material-icons">{{$icon}}</i>{{$property->value}}
                <div class="right-align">
                  <a href="{{route('admin.leads.properties.delete',['id' => $property->id])}}" class="delete">
                      <i class="material-icons">delete</i>
                  </a>
                  <a href="#"
                     data-lead="{{$model->id}}"
                     data-url="{{route('admin.leads.modal')}}"
                     data-type="{{$property->type}}"
                     data-action="{{route('admin.leads.properties.update',['id'=>$property->id])}}"
                     data-mode="Edit"
                     data-value="{{$property->value}}"
                     data-view="default"
                     class="lead-modal_trigger edit"><i class="material-icons right">edit</i></a>
                 </div>
            </div>
        @endforeach
    </div>
</div>
