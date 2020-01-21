@set('user',$model->user()->first())
@set('properties',$model->properties()->get()->pluck('value','type')->toArray())
<div class="col s3 card panel">
    <div class="fixed--bar lead-overview_info">
        <h3 class="title">{{ $model->first_name }} {{ $model->last_name }} <a href="#edit" class="modal-trigger"><i class="material-icons">edit</i></a></h3>
        <div id="edit" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Edit Lead Name</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
                </div>
                <div class="modal-body">
                    <form>
                        <div>
                            <div class="input-field">
                                {{ Form::text('first_name',$model->first_name) }}
                                <label class="">First Name</label>
                            </div>
                            <div class="input-field">
                                {{ Form::text('last_name',$model->last_name) }}
                                <label>Last Name</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class=" btn theme-btn">Save</a>
                </div>
            </div>
        </div>
        <div class="bar-btn">
            <a href="#" class="btn btn-small cyan">
                <i class="material-icons">email</i>Send Email
            </a>
            <a href="#" class="btn btn-small cyan">
                <i class="material-icons">search</i>Add Search
            </a>
        </div>
        <div class="row">
            <div class="tags col s12">
                <div class="chip amber">
                    Anchorage
                    <i class="close material-icons">close</i>
                </div>
                <div class="chip purple">
                    Active
                    <i class="close material-icons">close</i>
                </div>
            </div>
            <div class="col s12">
                <select>
                    <option value="" disabled selected>assign group</option>
                    <option value="1">Palmer</option>
                    <option value="2">Sellar</option>
                    <option value="3">Wasilla</option>
                </select>
            </div>
        </div>
        <div class="form-element">
            @include('real-estate::admin.leads.partials.info.default',['type' => 'email'])
            @include('real-estate::admin.leads.partials.info.default',['type' => 'phone'])
            @include('real-estate::admin.leads.partials.info.default',['type' => 'address'])
            @include('real-estate::admin.leads.partials.info.price')
        </div>
    </div>
</div>
