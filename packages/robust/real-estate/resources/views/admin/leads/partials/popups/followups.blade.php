<div class="column-action__followups">
    <a href="#" title="Click to add followups" class='popup-trigger' href='#'>
       Add
    </a>
    <ul class='popup-content hide'>
        <div class="info-dialog view-box">
            <div class="box-title">
                {{ $lead->first_name }} {{ $lead->last_name }} - FollowUps
                <i class="fa fa-times pull-right clickable"></i>
            </div>
            <div class="box-content">
                <form class="FollowUpFom" data-id="{{$lead->id}}">
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
                            {{ Form::submit($ui->getSubmitText(), ['class' => 'waves-light theme-btn btn btn-follow-up']) }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </ul>
</div>
