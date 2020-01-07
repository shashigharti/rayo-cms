<div class="system-settings__email">
    {{Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()])}}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
    {{ Form::hidden('mail_driver', $slug, [ 'class' => 'form-control' ]) }}
        
        <div class="form-group form-material row">
            <div class="col s6 input-field">
                    {{ Form::label('name', 'Sender Name(From)', ['class' => 'control-label' ]) }}
                    {{ Form::text('name', isset($settings['name'])?$settings['name']:'', [
                            'class' => 'form-control'
                        ]) }}
            </div>
            <div class="col s6 input-field">
                    {{ Form::label('email', 'Default Email(From)', ['class' => 'control-label' ]) }}
                    {{ Form::text('email', isset($settings['email'])?$settings['email']:'', [
                            'class' => 'form-control'
                        ]) }}
            </div>
        </div>  
        <div class="form-group form-material row">
            <fieldset>
                <legend>Mailgun Settings</legend>
                <div class="form-group form-material row">
                    <div class="col s6 input-field">
                        {{ Form::label('mail_host', 'Host(mail_host)', ['class' => 'control-label' ]) }}
                        {{ Form::text('mail_host', isset($settings['mail_host'])?$settings['mail_host']:'', [
                                'class' => 'form-control'
                            ]) }}
                    </div>
                    <div class="col s6 input-field">
                        {{ Form::label('mail_port', 'Port(mail_port)', ['class' => 'control-label' ]) }}
                        {{ Form::text('mail_port', isset($settings['mail_port'])?$settings['mail_port']:'', [
                                'class' => 'form-control'
                            ]) }}
                    </div>
                </div>
                <div class="form-group form-material row">
                    <div class="col s6 input-field">
                        {{ Form::label('mail_username', 'Username(mail_username)', ['class' => 'control-label' ]) }}
                        {{ Form::text('mail_username', isset($settings['mail_username'])?$settings['mail_username']:'', [
                                'class' => 'form-control'
                            ]) }}
                    </div>
                    <div class="col s6 input-field">
                        {{ Form::label('mail_password', 'Password(mail_password)', ['class' => 'control-label' ]) }}
                        {{ Form::password('mail_password', array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group form-material row">
                    <div class="col s6 input-field">
                        {{ Form::label('mail_domain', 'Domain(mail_domain)', ['class' => 'control-label' ]) }}
                        {{ Form::text('mail_domain', isset($settings['mail_domain'])?$settings['mail_domain']:'', [
                                'class' => 'form-control'
                            ]) }}
                    </div>
                    <div class="col s6 input-field">
                        {{ Form::label('mail_secret', 'Mail Secret(mail_secret)', ['class' => 'control-label' ]) }}
                        {{ Form::text('mail_secret', isset($settings['mail_secret'])?$settings['mail_secret']:'', [
                                'class' => 'form-control'
                            ]) }}
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="form-group form-material row test-email">
            <fieldset>
                <legend>Test Email</legend>
                <div class="form-group form-material row">
                    <div class="col s6 input-field">
                        {{ Form::label('test_email', 'Send Test Email', ['class' => 'control-label' ]) }}
                        {{ Form::text('test_email', '', [
                                'class' => 'form-control',
                                'placeholder' => 'info@robustitconcepts.com'
                            ]) }}
                    </div>
                     <a href="#" class="primary-btn"><i class="material-icons dynamic-elem__btn test-email__send">send</i></a>
                </div>
            </fieldset>
        </div>
        <div class="form-group form-material mt-3">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    {{Form::close()}}
</div>
