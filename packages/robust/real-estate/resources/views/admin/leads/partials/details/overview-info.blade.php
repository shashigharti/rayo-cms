@set('user',$model->user()->first())
@set('properties',$properties_helper->getProperties($model))
@set('groups',$lead_helper->getActiveGroups())
@set('selectedGroups',$model->groups()->get())
<div class="col s3 card panel">
    <div class="fixed--bar lead-overview_info">
        <h3 class="title">{{ $model->first_name }} {{ $model->last_name }} <a href="#edit" class="modal-trigger"><i class="material-icons">edit</i></a></h3>
        <div id="edit" class="modal">
            <div class="modal-content">
                <form action="{{route('admin.leads.update',['id' => $model->id])}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <span>Edit Lead Name</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="input-field">
                                {{ Form::text('first_name',$model->first_name) }}
                                {{ Form::label('first_name','First Name') }}
                            </div>
                            <div class="input-field">
                                {{ Form::text('last_name',$model->last_name) }}
                                {{ Form::label('last_name','Last Name') }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input href="#" class=" btn theme-btn" type="submit"></input>
                    </div>
                </form>
            </div>
        </div>
        <div class="bar-btn">
            @include('real-estate::admin.leads.partials.info.email')
            @include('real-estate::admin.leads.partials.info.search')
        </div>
        <div class="row">
            <div class="tags col s12 lead--chips_container">
                @foreach($selectedGroups as $chip)
                    <div class="chip blue">
                        {{$chip->name}}
                        <i class="close material-icons lead--chips_delete" data-id="{{$chip->id}}">close</i>
                    </div>
                @endforeach
            </div>
            <div class="col s12">
                <select class="lead--group_assign"
                        data-delete-url="{{route('admin.leads.delete.groups',['id' => $model->id])}}"
                        data-url="{{route('admin.leads.update.groups',['id'=>$model->id])}}">
                    <option value="" disabled selected>assign group</option>
                    @foreach($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-element">
            @include('real-estate::admin.leads.partials.info.default',['type' => 'email','input_type' => 'email','icon'=>'email'])
            @include('real-estate::admin.leads.partials.info.default',['type' => 'phone','input_type' => 'text','icon'=>'phone'])
            @include('real-estate::admin.leads.partials.info.default',['type' => 'address','input_type' => 'text','icon'=>'map'])
            @include('real-estate::admin.leads.partials.info.default',['type' => 'mobile','input_type' => 'text','icon'=>'phone'])
            @include('real-estate::admin.leads.partials.info.price')
        </div>
    </div>
</div>
