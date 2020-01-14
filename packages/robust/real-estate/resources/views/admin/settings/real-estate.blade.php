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
            <div class="col s2">
                {{ Form::label('banner_per_row', 'Banner Per Row', ['class' => 'control-label' ]) }}
                {{ Form::text('banner_per_row', $settings['banner_per_row'] ?? '') }}
            </div>
            <div class="col s2">
                {{ Form::label('year_built', 'Year Built', ['class' => 'control-label' ]) }}
                Min: {{ Form::text('year_built_min', $settings['year_built_min'] ?? '') }}
                Max: {{ Form::text('year_built_max', $settings['year_built_max'] ?? '') }}
            </div>
            <div class="col s2">
                {{ Form::label('sq_feet', 'Square Feet', ['class' => 'control-label' ]) }}
                Min: {{ Form::text('sq_feet_min', $settings['sq_feet_min'] ?? '') }}
                Max: {{ Form::text('sq_feet_max', $settings['sq_feet_max'] ?? '') }}
            </div>
            <div class="col s2">
                {{ Form::label('sq_feet', 'Beds', ['class' => 'control-label' ]) }}
                Min: {{ Form::text('beds_min', $settings['beds_min'] ?? '') }}
                Max: {{ Form::text('beds_max', $settings['beds_max'] ?? '') }}
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
    <fieldset>
        <legend>Site Data Mapping</legend>
        <div class="form-group form-material row">
            <div class="col s3 input-field">
                {{ Form::label('active', 'Active', ['class' => 'control-label' ]) }}
                {{ Form::text('active', isset($settings['active'])? $settings['active']:'Active', [
                        'class' => 'form-control'
                    ]) }}
            </div>
            <div class="col s3">
                {{ Form::label('sold', 'Sold', ['class' => 'control-label' ]) }}
                {{ Form::text('sold', isset($settings['sold'])? $settings['sold']:'Closed', [
                        'class' => 'form-control'
                    ]) }}
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
                    ]) }}
            </div>
        </div>
    </fieldset>
    <fieldset class="mt-2">
        <legend>Price Settings</legend>
        @set('prices', isset($settings['data']) ? $settings['data']['prices'] : [] )
        @if(count($prices) > 0)
            @foreach($prices as $key => $price)
                <div class="form-group form-material row dynamic-elem">
                    <div class="col s3 input-field">
                        {{ Form::label("data[prices][]", 'Price >=', ['class' => 'control-label' ]) }}
                        {{ Form::text("data[prices][]", $price, [
                                'class' => 'form-control'
                            ])
                        }}
                    </div>
                    <div class="col s3 input-field">
                        {{ Form::label("data[increments][]", 'Increment', ['class' => 'control-label' ]) }}
                        {{ Form::text("data[increments][]", $settings['data']['increments'][$key], [
                                'class' => 'form-control'
                            ])
                        }}
                    </div>
                    <a href="#"><i class="material-icons dynamic-elem__btn dynamic-elem__add"> add </i></a>
                    <a href="#"><i class="material-icons dynamic-elem__btn dynamic-elem__delete hide"> delete </i></a>
                </div>
            @endforeach
        @else
            <div class="form-group form-material row dynamic-elem">
                <div class="col s3 input-field">
                    {{ Form::label("data[prices][]", 'Price >=', ['class' => 'control-label' ]) }}
                    {{ Form::text("data[prices][]", '', [
                            'class' => 'form-control'
                        ])
                    }}
                </div>
                <div class="col s3 input-field">
                    {{ Form::label("data[increments][]", 'Increment', ['class' => 'control-label' ]) }}
                    {{ Form::text("data[increments][]", '', [
                            'class' => 'form-control'
                        ])
                    }}
                </div>
                <a href="#">
                    <i class="material-icons btn cyan input-field-btn btn-add mt-3 dynamic-elem__btn dynamic-elem__add">
                        add
                    </i>
                </a>
                <a href="#">
                    <i class="material-icons btn amber input-field-btn btn-add mt-3  hide dynamic-elem__btn dynamic-elem__delete ">
                        delete
                    </i>
                </a>
            </div>
        @endif

    </fieldset>
    <fieldset class="mt-2">
        <legend>Data Pull Settings for Server</legend>
        <div class="form-group form-material row">
            <div class="col s6 input-field">
                {{ Form::label("data[cities]", 'Cities(only)', ['class' => 'control-label' ]) }}
                {{ Form::text("data[cities]", isset($settings['data']['cities']) ? $settings['data']['cities']:'', [
                        'class' => 'form-control',
                        'placeholder' => 'Comma separated values E.g \'boca rotan, west palm beach\''
                    ])
                }}
            </div>
            <div class="col s6 input-field">
                {{ Form::label("data[zips]", 'Zips(only)', ['class' => 'control-label' ]) }}
                {{ Form::text("data[zips]", isset($settings['data']['zips']) ? $settings['data']['zips']:'', [
                        'class' => 'form-control',
                        'placeholder' => 'Comma separated values E.g \'33418, 33419\''
                    ])
                }}
            </div>
            <div class="col s6 input-field">
                {{ Form::label("data[counties]", 'Counties(only)', ['class' => 'control-label' ]) }}
                {{ Form::text("data[counties]", isset($settings['data']['counties']) ? $settings['data']['counties']:'', [
                        'class' => 'form-control',
                        'placeholder' => 'Comma separated values E.g \'boca rotan, west palm beach\''
                    ])
                }}
            </div>
            <div class="col s6 input-field">
                {{ Form::label("data[min]", 'Listings Greater Than (Price)', ['class' => 'control-label' ]) }}
                {{ Form::text("data[min]", isset($settings['data']['min']) ? $settings['data']['min']:'10000', [
                        'class' => 'form-control',
                        'placeholder' => 'numeric Value E.g \'10000\''
                    ])
                }}
            </div>
        </div>
        <div class="form-group form-material row">
            <div class="col s6 input-field form--links">
                <a href="#"> <i class="material-icons"> settings </i> Get Sample Data </a>
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
    {{Form::close()}}
</div>
