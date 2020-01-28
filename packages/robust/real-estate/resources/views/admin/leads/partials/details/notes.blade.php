<div class="row leads--notes">
    @include("real-estate::admin.leads.partials.details.overview-info")

    <div class="col s9">
        <div class="panel card">
            <div class="col s12">
                <div class="row mt-1">
                    @include("core::admin.partials.messages.info")
                    <div class="col s9">
                        <h5>Notes</h5>
                    </div>
                    <div class="col s3 right-align">
                        <a href="#"
                           data-lead="{{$model->id}}"
                           data-url="{{route('admin.leads.modal')}}"
                           data-type="notes"
                           data-action="{{route('admin.notes.store')}}"
                           data-mode="Add"
                           data-view="notes"
                           data-value=""
                           class="mt-3 btn btn-floating waves-effect waves-light theme-btn breadcrumbs-btn right lead-modal_trigger"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="row">
                    @foreach($model->notes as $note)
                        <div class="col s12 single--note mb-6">
                            <h5>{{ $note->title }}</h5>
                            <p>{{ $note->note }}</p>
                            
                            <div class="right-align">
                                <label class="left">{{ $note->created_at->diffForHumans() }}</label>
                                <a href="#"
                                   data-lead="{{$model->id}}"
                                   data-url="{{route('admin.leads.modal')}}"
                                   data-type="Edit Notes"
                                   data-action="{{route('admin.leads.notes.update',['id'=>$note->id])}}"
                                   data-mode="Edit"
                                   data-view="notes"
                                   data-value="{{$note->id}}"
                                   class="lead-modal_trigger mr-2"><i class="material-icons">edit</i></a>
                                <a  href="{{url('admin/leads/notes/delete',['id'=>$note->id])}}">
                                    <i class="material-icons delete"> delete </i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>              
    </div>
</div>
