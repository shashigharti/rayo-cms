<div class="modal-content">
    <div class="modal-header">
        <span>{{ $lead->first_name }} {{ $lead->last_name }}</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
    </div>
    <div class="modal-body">
        {{ Form::open(['route'=>['admin.leads.follow-up.store',$lead->id],'method'=>'post']) }}
        {{ Form::hidden('lead_id',$lead->id) }}
            <div class="row viewed-lead">
                <div class="col s12">
                    {{ Form::text('date',null,['placeholder'=>'Select Date']) }}
                </div>
                <div class="col s12 mt-3">
                    {{ Form::Select('type',['Select Followup Type','Follow Up','To Do','Call Reminder'],null,['class'=>'form-control']) }}
                </div>
                <div class="col s12 mt-3">
                    {{ Form::Select('agent_id',['Select Agent','Test']) }}
                </div>
                <div class="col s12">
                    {{ Form::textarea('note',null,['placeholder'=>'notes']) }}
                </div>
                <div class="col s12 right-align mt-5">
                    {{ Form::submit($ui->getSubmitText(), ['class' => 'waves-light theme-btn btn']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>