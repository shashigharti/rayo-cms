<div class="row">
    @include("real-estate::admin.leads.partials.details.overview-info")
    <div class="col s9">
        <div class="panel card">
            <div class="col s12">
                <h5>Emails Sent</h5>
            </div>
            <div class="col s12 communication--block">
                <ul class="collapsible" data-collapsible="accordion">
                    @foreach($model->communications as $communication)
                        <li>
                            <div class="collapsible-header"><i class="material-icons">add</i>{{$communication->subject}}<span></span></div>
                            <div class="collapsible-body">
                                {!! $communication->email !!}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
