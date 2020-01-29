@set('emails',$properties_helper->getAllEmails($model))
<a href="#send-email" class="btn btn-small cyan modal-trigger">
    <i class="material-icons">email</i>Send Email
</a>
<div id="send-email" class="modal">
    <div class="modal-content">
        <form action="{{route('admin.leads.send.email',['id'=>$model->id])}}" method="POST">
            @csrf
            <div class="modal-header">
                <span>Send Email</span>
                <a href="#!" class="modal-action modal-close right">
                    <i class="material-icons">clear</i>
                </a>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('to[]', 'To', ['class' => 'required' ]) }}
                        {{ Form::select('to[]', $emails,'', ['class' => 'browser-default multi-select','multiple' ]) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 multi-select-container">
                        {{ Form::label('subject', 'Subject', ['class' => 'required' ]) }}
                        {{ Form::text('subject','', ['class' => 'required' ]) }}
                    </div>
                </div>
                <div class="row editor">
                    <div class="input-field col s12 ">
                        {{ Form::textarea('body', '', [
                           'class' => 'form-control editor',
                           'id' => 'body_content'
                               ])
                           }}
                        {{ Form::label('body_content', 'Message', ['class' => 'control-label' ]) }}
                        <p>*|LEAD_FIRSTNAME|* | *|LOGO|* | *|WEBSITE|* | *|VERIFICATION_LINK|*
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit('Send', ['class' => 'btn btn-primary theme-btn']) }}
            </div>
        </form>
    </div>
</div>
