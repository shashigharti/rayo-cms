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
                       <a class="mt-3 btn btn-floating waves-effect waves-light theme-btn breadcrumbs-btn right" href="#!"><i class="material-icons">add</i></a>
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
                    <div class="col s12 single--note">
                        <h5>{{ $model->notes->title }} (09/09/19)</h5>
                        <p>{{ $model->notes->note }}</p>
                        <label>{{ $model->notes->created_at->diffForHumans() }}</label>
                        <div class="right-align mt-4">
                            <a href="#note-edit" class="modal-trigger mr-2">
                                <i class="material-icons">edit</i>                     
                            </a>
                            <a href="#" class="right">
                                <i class="material-icons delete">delete</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>              
    </div>
</div>
