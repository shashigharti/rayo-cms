<div class="system-settings__email">
    {{Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()])}}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
        <div class="form-group form-material row">
            <div class="col s6 input-field">
                {{ Form::label('pagination', 'Per page pagination', ['class' => 'control-label' ]) }}
                {{ Form::number('pagination', isset($settings['pagination'])?$settings['pagination']:'', [
                        'class' => 'form-control',
                        'min' => 0
                    ]) 
                }}
            </div>
        </div>

        <div class="form-group form-material row">
            <div class="col s12 input-field">
                {{ Form::label('footer-content', 'Footer Content', ['class' => 'control-label' ]) }}
                {{ Form::textarea('footer-content', isset($settings['footer-content'])?$settings['footer-content']:'', [
                        'class' => 'form-control editor',
                    ]) 
                }}
            </div>
        </div>
        <fieldset> 
            <legend>Site Maintenance </legend>
            <div class="form-group form-material row">
                <div class="col s5 input-field">
                    {!! Html::decode(Form::label('maintenance_mode', 'Maintenance Mode', ['class' => 'control-label required' ]))  !!}
                    {{ Form::checkbox('maintenance_mode', isset($settings['maintenance_mode'])?$settings['maintenance_mode']:'') }}
                </div>
                <div class="col s7 input-field">
                    {{ Form::select('maintenance_type', [
                            'message_only' => 'Maintenance Mode With Message', 
                            'completely_down' => 'Completely Down'
                        ], 
                        isset($settings['maintenance_type'])?$settings['maintenance_type']:'', 
                        [
                            'class' => 'form-control'
                        ]) 
                    }}
                </div>
            </div>
            <div class="form-group form-material row">
                <div class="col s12 input-field">
                    {{ Form::label('maintenance_message', 'Maintenance Message', ['class' => 'control-label' ]) }}
                    {{ Form::textarea('maintenance_message', isset($settings['maintenance_message'])?$settings['maintenance_message']:'',  [
                    'class' => 'form-control',
                    'rows' => 4]) }}
                </div>
            </div>
        </fieldset>
        <div class="form-group form-material">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    {{Form::close()}}
</div>