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
                        <a href="#add-notes" class="mt-3 btn btn-floating waves-effect waves-light theme-btn breadcrumbs-btn right modal-trigger" href="#!">
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                    <div id="add-notes" class="modal">
                        <div class="modal-content">
                            <form action="{{route('admin.notes.store')}}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <span>Add Notes</span>
                                    <a href="#!" class="modal-action modal-close right">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    {{ form::hidden('lead_id',$model->id) }}
                                    <div class="row">
                                        <div class="input-field col s12">
                                            {{ Form::text('title',null,['class'=>'form-control','placeholder'=>'title']) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            {{ Form::textarea('note','', ['class' => 'form-control','placeholder'=>'Note' ]) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {{ Form::submit('Save', ['class' => 'btn btn-primary theme-btn']) }}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="row">
                    <div class="col s12">
                        <p><strong>{{ $model->first_name }} {{ $model->last_name }}</strong> viewed {{ $model->notes->count() }} item(s)</p>
                    </div>                      
                </div>
                <div class="row">
                    @foreach($model->notes as $note)
                        <div class="col s12 single--note">
                            <h5>{{ $note->title }} {{ $note->created_at->format('(d/m/Y)') }}</h5>
                            <p>{{ $note->note }}</p>
                            <label>{{ $note->created_at->diffForHumans() }}</label>
                            <div class="right-align mt-4">
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
