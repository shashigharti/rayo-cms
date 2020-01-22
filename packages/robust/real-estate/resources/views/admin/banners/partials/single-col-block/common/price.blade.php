<div class="row">
    <div id="{{ $tab }}" class="col s12">
        <div class="form-group form-material row">
            <div class="col s6">
                {{ Form::label("properties[tabs][$tab][display_name]", 'Display Name', ['class' => 'control-label' ]) }}
                {{ Form::text("properties[tabs][$tab][display_name]", $tabs[$tab]['display_name'] ?? $tabs_config[$tab]['display_name']) }}
            </div>
            {{ Form::hidden("properties[tabs][$tab][type]", $tabs[$tab]['type'] ?? $tabs_config[$tab]['type']) }}
        </div>
        <div class="form-group form-material row">
            <div class="col s6">
                {{ Form::label("properties[tabs][$tab][page_title]", 'Page Title', ['class' => 'control-label' ]) }}
                {{ Form::text("properties[tabs][$tab][page_title]", $tabs[$tab]['page_title'] ?? '') }}
            </div>
        </div>
        <fieldset class="mt-1">
            <legend>Conditions</legend>
            @if(isset($tabs_config[$tab]['input_type']) && ($tabs_config[$tab]['input_type'] === 'search_text'))
                @foreach($tabs_config[$tab]['conditions'] as $ckey => $condition)
                    <div class="col s12">
                        {{ Form::label("properties[tabs][$tab][conditions][$ckey][values]", "Add search text for " . $condition['property_type'], ['class'=>'control-label']) }}
                        {{ Form::select("properties[tabs][$tab][conditions][$ckey][values]", [], null, [
                                'class'=>'browser-default multi-select',
                                'data-selected' => $tabs[$tab]['conditions'][$ckey]['values'] ?? $tabs_config[$tab]['conditions'][$ckey]['values'] ?? '',
                                'multiple'
                            ])
                        }}
                    </div>
                @endforeach
            @else
                @foreach($tabs_config[$tab]['conditions'] as $ckey => $condition)
                    <div class="col s12">
                        {{ Form::label("properties[tabs][$tab][conditions][$ckey][values]", $condition['property_type'], ['class'=>'control-label']) }}
                        {{ Form::select("properties[tabs][$tab][conditions][$ckey][values]", [], null, [
                                'class'=>'browser-default multi-select',
                                'data-url' => route('api.listings.attributes.property_name', $condition['property_type']),
                                'data-selected' => $tabs[$tab]['conditions'][$ckey]['values'] ?? $tabs_config[$tab]['conditions'][$ckey]['values'] ?? '',
                                'multiple'
                            ])
                        }}
                    </div>
                @endforeach
            @endif
        </fieldset>
        <fieldset class="mt-1">
            <legend>Price Settings</legend>
            @if(isset($properties->tabs->{$tab}))
                @set('prices', json_decode(json_encode($properties->tabs->{$tab}->prices),true))
            @else
                @set('prices', config('real-estate.frw.default_pricing_ranges'))
            @endif
            @foreach($prices as $pkey => $price)
                <div class="row dynamic-elem">
                    <div class="input-field col s4 inline__input-field">
                        {{ Form::label("properties[tabs][$tab][prices][$pkey][min]", 'Min') }}
                        {{ Form::text("properties[tabs][$tab][prices][$pkey][min]", $tabs[$tab]['prices'][$pkey]['min'] ?? $prices[$pkey]['min'] ?? '') }}
                    </div>
                    <div class="input-field col s4 inline__input-field">
                        {{ Form::label("properties[tabs][$tab][prices][$pkey][max]", 'Max') }}
                        {{ Form::text("properties[tabs][$tab][prices][$pkey][max]", $tabs[$tab]['prices'][$pkey]['max'] ?? $prices[$pkey]['max'] ?? '') }}
                    </div>
                    <div class="input-field col s3 inline__input-field">
                        {{ Form::label("properties[tabs][$tab][prices][$pkey][count]", 'Count') }}
                        {{ Form::text("properties[tabs][$tab][prices][$pkey][count]", $tabs[$tab]['prices'][$pkey]['count'] ?? $prices[$pkey]['count'] ?? '') }}
                    </div>
                    @if( $prices[$pkey]['max'] == "" )
                        <a href="#">
                            <i class="material-icons dynamic-elem__btn dynamic-elem__add"> add </i>
                        </a>
                    @else
                        <a href="#">
                            <i class="material-icons dynamic-elem__btn dynamic-elem__delete"> delete </i>
                        </a>
                    @endif
                </div>
            @endforeach
        </fieldset>
    </div>
</div>
