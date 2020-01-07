<div class="system-settings__ga-analytics">
    {{Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()])}}
        {{ Form::hidden('slug', $slug, [
                    'class' => 'form-control'
                ]) 
        }}
        <div class="form-group form-material row">
            <div class="col s12 input-field">
                {{ Form::label('script-before-head-closing', 'Script before head closing tag', ['class' => 'control-label' ]) }}
                {{ Form::textarea('script-before-head-closing', isset($settings['script-before-head-closing'])?$settings['script-before-head-closing']:'', [
                        'class' => 'form-control',
                        'rows' => 3
                    ]) 
                }}
                {{ Form::label('code', 'Head Script', ['class' => 'control-label' ]) }}
            </div>
        </div>
        <div class="form-group form-material row">
            <div class="col s12 input-field">
                {{ Form::label('script-after-body-opening', 'Script after body opening tag', ['class' => 'control-label' ]) }}
                {{ Form::textarea('script-after-body-opening', isset($settings['script-after-body-opening'])?$settings['script-after-body-opening']:'', [
                        'class' => 'form-control',
                        'rows' => 3
                    ]) 
                }}
                {{ Form::label('body-script', 'Body Script', ['class' => 'control-label' ]) }}
            </div>
        </div>
         <div class="form-group form-material row">
            <div class="col s12 input-field">
                {{ Form::label('script-before-body-closing', 'Script after body closing tag', ['class' => 'control-label' ]) }}
                {{ Form::textarea('script-before-body-closing', isset($settings['script-before-body-closing'])?$settings['script-before-body-closing']:'', [
                        'class' => 'form-control',
                        'rows' => 3
                    ]) 
                }}
            </div>
        </div>
        <div class="form-group form-material">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    {{Form::close()}}
</div>
