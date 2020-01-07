<div class="system-settings__real-estate">
    {{Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()])}}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
        <fieldset>
            <legend>Data Server (RETS) </legend>
            <div class="form-group form-material row">
                <div class="col s6">
                    {{ Form::label('user_id', 'User ID', ['class' => 'control-label' ]) }}
                    {{ Form::text('user_id', isset($settings['user_id'])?$settings['user_id']:'', [
                            'class' => 'form-control'
                        ]) 
                    }}
                </div>
                <div class="col s6">
                    {{ Form::label('password', 'Password', ['class' => 'control-label' ]) }}
                    {{ Form::text('password', isset($settings['password'])?$settings['password']:'', [
                            'class' => 'form-control'
                        ]) 
                    }}
                </div>
            </div>
        </fieldset>        
        <div class="form-group form-material">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    {{Form::close()}}
</div>