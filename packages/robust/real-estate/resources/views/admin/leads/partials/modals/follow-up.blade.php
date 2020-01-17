<div class="info-dialog view-box">
    <div class="box-title">
        Buyer
        <i class="fa fa-times pull-right clickable"></i>
    </div>
    <div class="box-content">
        <div class="row viewed-lead">
            Buyer
            <p>{{ Form::text('date',null,['placeholder'=>'Select Date']) }}</p>
            <p>{{ Form::Select('type',['Select Followuup Type','Follow Up','To Do','Call Reminder'],null,['class'=>'form-control']) }}</p>
            <p>{{ Form::Select('agent',['Select Agent','Test']) }}</p>
            <p>{{ Form::textarea('notes',null,['placeholder'=>'notes']) }}</p>
            <div class="col s12">
                {{ Form::submit($ui->getSubmitText(), ['class' => 'waves-light btn']) }}
            </div>
        </div>
    </div>
</div>