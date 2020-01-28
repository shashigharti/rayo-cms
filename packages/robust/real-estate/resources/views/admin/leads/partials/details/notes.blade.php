<div class="row leads--notes">
    @include("real-estate::admin.leads.partials.details.overview-info")

    <div class="col s9">
        <div class="panel card">
            <div class="col s12">
                <div class="row mt-1">
                    <div class="col s9">
                        <h5>Notes</h5>
                    </div>
                    <div class="col s3 right-align">
                        <a href="#"
                           data-lead="{{$model->id}}"
                           data-url="{{route('admin.leads.modal')}}"
                           data-type="notes"
                           data-action="{{route('admin.notes.store')}}"
                           data-mode="Edit"
                           data-view="notes"
                           data-value="{{$model->agent->id ?? ''}}"
                           class="mt-3 btn btn-floating waves-effect waves-light theme-btn breadcrumbs-btn right lead-modal_trigger"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="row">
                    @foreach($model->notes as $note)
                        <div class="col s12 single--note mb-6">
                            <h5>{{ $note->title }} {{ $note->created_at->format('(d/m/Y)') }}</h5>
                            <p>{{ $note->note }}</p>
                            
                            <div class="right-align">
                                <label class="left">{{ $note->created_at->diffForHumans() }}</label>
                                <a href="#note-edit" class="modal-trigger mr-2">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#" class="right">
                                    <i class="material-icons delete">delete</i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>              
    </div>
</div>
