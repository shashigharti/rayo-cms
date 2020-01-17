<div class="info-dialog view-box">
    <div class="box-title">
        Buyer
        <i class="fa fa-times pull-right clickable"></i>
    </div>
    <div class="box-content">
        <div class="row viewed-lead">
            <div class="col s12">
                {{ Form::text('date',null,['placeholder'=>'Select Date']) }}
            </div>
            <div class="col s12 mt-3">
                {{ Form::Select('type',['Select Followuup Type','Follow Up','To Do','Call Reminder'],null,['class'=>'form-control']) }}
            </div>
            <div class="col s12 mt-3">
                {{ Form::Select('agent',['Select Agent','Test']) }}
            </div>
            <div class="col s12">
                {{ Form::textarea('notes',null,['placeholder'=>'notes']) }}
            </div>
            <div class="col s12 right-align mt-5">
                {{ Form::submit($ui->getSubmitText(), ['class' => 'waves-light theme-btn btn']) }}
            </div>
        </div>
    </div>
</div>
