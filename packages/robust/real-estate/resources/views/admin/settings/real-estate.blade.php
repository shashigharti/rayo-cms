<div class="system-settings__real-estate">
    {{Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()])}}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
        <fieldset>
            <legend>Site Data Mapping</legend>
            <div class="form-group form-material row">
                <div class="col s3">
                    {{ Form::label('active', 'Active', ['class' => 'control-label' ]) }}
                    {{ Form::text('active', isset($settings['active'])?$settings['active']:'', [
                            'class' => 'form-control'
                        ]) }}
                </div>
                <div class="col s3">
                    {{ Form::label('sold', 'Sold', ['class' => 'control-label' ]) }}
                    {{ Form::text('sold', isset($settings['sold'])?$settings['sold']:'', [
                            'class' => 'form-control'
                        ]) }}
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>URL Mapping</legend>
            <div class="form-group form-material row">
                <div class="col s3">
                    {{ Form::label('url_active', 'URL for homes for sale', ['class' => 'control-label' ]) }}
                    {{ Form::text('url_active', isset($settings['url_active'])?$settings['url_active']:'', [
                            'class' => 'form-control'
                        ]) }}
                </div>
                <div class="col s3">
                    {{ Form::label('url_sold', 'URL for sold', ['class' => 'control-label' ]) }}
                    {{ Form::text('url_sold', isset($settings['url_sold'])?$settings['url_sold']:'', [
                            'class' => 'form-control'
                        ]) }}
                </div>
            </div>
        </fieldset>
        <div class="form-group form-material">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    {{Form::close()}}
</div>