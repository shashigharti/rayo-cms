<div class="system-settings__real-estate">
    {{Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()])}}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
        <fieldset>
            <legend>Data Server (RETS) </legend>
            <div class="form-group form-material row">
                <div class="col s6 input-field">
                    {{ Form::label('client_name', 'Client Name', ['class' => 'control-label' ]) }}
                    {{ Form::text('client_name', isset($settings['client_name'])?$settings['client_name']:'', [
                            'class' => 'form-control'
                        ])
                    }}
                </div>
                <div class="col s6 input-field">
                    {{ Form::label('client_slug', 'Slug', ['class' => 'control-label' ]) }}
                    {{ Form::text('client_slug', isset($settings['client_slug'])?$settings['client_slug']:'', [
                            'class' => 'form-control'
                        ])
                    }}
                </div>
            </div>
            <div class="form-group form-material row">
                <div class="col s12 input-field">
                    {{ Form::label('url', 'Url', ['class' => 'control-label' ]) }}
                    {{ Form::text('url', isset($settings['url'])?$settings['url']:'', [
                            'class' => 'form-control'
                        ])
                    }}
                </div>
            </div>
            <div class="form-group form-material row">
                <div class="col s6 input-field">
                    {{ Form::label('username', 'UserName', ['class' => 'control-label' ]) }}
                    {{ Form::text('username', isset($settings['username'])?$settings['username']:'', [
                            'class' => 'form-control'
                        ])
                    }}
                </div>
                <div class="col s6 input-field">
                    {{ Form::label('password', 'Password', ['class' => 'control-label' ]) }}
                    {{ Form::text('password', isset($settings['password'])?$settings['password']:'', [
                            'class' => 'form-control'
                        ])
                    }}
                </div>
            </div>
        </fieldset>
        <div class="form-group form-material row mt-3">
            <div class="col s12">
                {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
            </div>
        </div>
    {{Form::close()}}
</div>
