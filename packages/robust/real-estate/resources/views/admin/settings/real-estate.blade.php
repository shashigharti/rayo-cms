<div class="system-settings__real-estate">
    {{ Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()]) }}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
    <fieldset class="mt-2">
        <legend>Client Settings</legend>
        <div class="form-group form-material row">
            <div class="col s6 input-field">
                {{ Form::label('client[name]', 'Client Name', ['class' => 'control-label' ]) }}
                {{ Form::text('client[name]', isset($settings['client']['name'])? $settings['client']['name']:'', [
                        'class' => 'form-control'
                    ])
                }}
            </div>
            <div class="col s6 input-field">
                {{ Form::label('client[slug]', 'Slug', ['class' => 'control-label' ]) }}
                {{ Form::text('client[slug]', isset($settings['client']['slug'])? $settings['client']['slug']:'', [
                       'class' => 'form-control'
                   ])
                }}
            </div>
        </div>
        <div class="form-group form-material row">
            <div class="col s6 input-field">
                {{ Form::label('client[state]', 'State', ['class' => 'control-label' ]) }}
                {{ Form::text('client[state]', $settings['client']['state'] ?? '',
                    [
                    'class'=>'form-control'
                    ])
                }}
            </div>
        </div>
    </fieldset>
    <fieldset class="mt-2">
        <legend>Front Page</legend>
        <div class="form-group form-material row">
            <div class="col s6">
                {{ Form::label('menus[]', 'Menus', ['class' => 'control-label' ]) }}
                {{ Form::select('menus[]', config('real-estate.frw.locations'),
                    $settings['menus'] ?? [],
                    [
                    'class'=>'browser-default multi-select',
                    'multiple'
                    ])
                }}
            </div>
            <div class="col s6">
                {{ Form::label('rt_pages[]', 'Display Research Tools In', ['class' => 'control-label' ]) }}
                {{ Form::select('rt_pages[]', config('real-estate.frw.locations'),
                    $settings['rt_pages'] ?? [],
                    [
                    'class'=>'browser-default multi-select',
                    'multiple'
                    ])
                }}
            </div>
        </div>
        <div class="form-group form-material row">
            <div class="col s3 input-field split--block">
                {{ Form::label('year_built', 'Year Built') }}
                <span>
                    Min: {{ Form::text('year_built_min', $settings['year_built_min'] ?? '') }}
                </span>
                <span>
                    Max: {{ Form::text('year_built_max', $settings['year_built_max'] ?? '') }}
                </span>
            </div>
            <div class="col s3 input-field split--block">
                {{ Form::label('sq_feet', 'Square Feet') }}
               <span>
                   Min: {{ Form::text('sq_feet_min', $settings['sq_feet_min'] ?? '') }}
               </span>
               <span>
                   Max: {{ Form::text('sq_feet_max', $settings['sq_feet_max'] ?? '') }}
               </span>
            </div>
            <div class="col s3 input-field split--block">
                {{ Form::label('beds', 'Beds') }}
                <span>
                    Min: {{ Form::text('beds_min', $settings['beds_min'] ?? '') }}
                </span>
                <span>
                    Max: {{ Form::text('beds_max', $settings['beds_max'] ?? '') }}
                </span>
            </div>
            <div class="col s3 input-field split--block">
                {{ Form::label('zip_code', 'Zip') }}
                <span>
                    Max(Char): {{ Form::text('zip_code_character_count', $settings['zip_code_character_count'] ?? '') }}
                </span>
                <span>
                    Or Value(<=): {{ Form::text('zip_code_max', $settings['zip_code_max'] ?? '') }}
                </span>
            </div>
            <div class="col s2 input-field">
                {{ Form::label('banner_per_row', 'Banner Per Row') }}
                {{ Form::text('banner_per_row', $settings['banner_per_row'] ?? '') }}
            </div>

        </div>
    </fieldset>
    <fieldset class="mt-2">
        <legend>Market Reports</legend>
        <div class="form-group form-material row">
            <div class="col s6">
                {{ Form::label('market_report[report_options][]', 'Report Options', ['class' => 'control-label' ]) }}
                {{ Form::select('market_report[report_options][]', config('real-estate.frw.locations'),
                    $settings['market_report']['report_options'] ?? [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ])
                }}
            </div>
        </div>
    </fieldset>
    <fieldset class="mt-2">
        <legend>Site Data Mapping</legend>
        <div class="form-group form-material row">
            <div class="col s3 input-field">
                {{ Form::label('active', 'Active', ['class' => 'control-label' ]) }}
                {{ Form::text('active', isset($settings['active'])? $settings['active']:'Active', [
                        'class' => 'form-control'
                    ])
                }}
            </div>
            <div class="col s3">
                {{ Form::label('sold', 'Sold', ['class' => 'control-label' ]) }}
                {{ Form::text('sold', isset($settings['sold'])? $settings['sold']:'Closed', [
                        'class' => 'form-control'
                    ])
                }}
            </div>
            <div class="col s3">
                {{ Form::label("data_age]", 'Data Age (in days)') }}
                {{ Form::text("data_age]", $settings['data_age'] ?? '365', [
                        'class' => 'form-control',
                        'placeholder' => 'numeric Value E.g \'365\''
                    ])
                }}
            </div>
        </div>
    </fieldset>
    <fieldset class="mt-2">
        <legend>URL Mapping</legend>
        <div class="form-group form-material row">
            <div class="col s3 input-field">
                {{ Form::label('url_active', 'URL for homes for sale', ['class' => 'control-label' ]) }}
                {{ Form::text('url_active', isset($settings['url_active'])?$settings['url_active']:'homes-for-sale', [
                        'class' => 'form-control'
                    ]) }}
            </div>
            <div class="col s3 input-field">
                {{ Form::label('url_sold', 'URL for sold', ['class' => 'control-label' ]) }}
                {{ Form::text('url_sold', isset($settings['url_sold'])?$settings['url_sold']:'sold', [
                        'class' => 'form-control'
                    ])
                }}
            </div>
        </div>
    </fieldset>
    <fieldset class="mt-2">
        <legend>Data Pull Settings for Server</legend>
        <div class="form-group form-material row">
            <div class="col s6 input-field">
                {{ Form::label("data[min]", 'Listings Greater Than (Price)', ['class' => 'control-label' ]) }}
                {{ Form::text("data[min]", isset($settings['data']['min']) ? $settings['data']['min']:'10000', [
                        'class' => 'form-control',
                        'placeholder' => 'numeric Value E.g \'10000\''
                    ])
                }}
            </div>
        </div>
    </fieldset>
    {{ Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()]) }}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
    <fieldset class="mt-2">
        <legend>Data Server (RETS)</legend>
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
    {{ Form::close() }}
</div>
