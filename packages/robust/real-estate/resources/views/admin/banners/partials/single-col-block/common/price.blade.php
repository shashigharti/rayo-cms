<div class="row">
    <div id="{{ $key }}" class="col s12">
        <fieldset class="mt-1">
            <legend>Conditions</legend>
            @foreach($tabs_config[$tab]['conditions'] as $ckey => $condition)
                @if(isset($properties->tabs))
                    @set('tabs', json_decode(json_encode($properties->tabs), true))
                @else
                    @set('tabs', $tabs_config[$tab])
                @endif
                <div class="col s12">
                    {{ Form::label("properties[tabs][$key][conditions][$ckey][values]", $condition['property_type'], ['class'=>'control-label']) }}
                    {{ Form::select("properties[tabs][$key][conditions][$ckey][values]", [], null, [
                            'class'=>'browser-default multi-select',
                            'data-url' => route('api.listings.attributes.property_name', $condition['property_type']),
                            'data-selected' => $tabs[$key]['conditions'][$ckey]['values'] ?? $tabs_config[$tab]['conditions'][$ckey]['values'] ?? '',
                            'multiple'
                        ])
                    }}
                </div>
            @endforeach
        </fieldset>
        <fieldset class="mt-1">
            <legend>Price Settings</legend>
            @if(isset($properties->tabs))
                @set('prices', $tabs[$key]['prices'])
            @else
                @set('prices', config('real-estate.frw.default_pricing_ranges'))
            @endif
            @foreach($prices as $pkey => $price)
                <div class="row dynamic-elem">
                    <div class="input-field col s4">
                        {{ Form::label("properties[tabs][$key][prices][$pkey][min]", 'Min') }}
                        {{ Form::text("properties[tabs][$key][prices][$pkey][min]", $tabs[$key]['prices'][$pkey]['min'] ?? $prices[$pkey]['min'] ?? '') }}
                    </div>
                    <div class="input-field col s4">
                        {{ Form::label("properties[tabs][$key][prices][$pkey][max]", 'Max') }}
                        {{ Form::text("properties[tabs][$key][prices][$pkey][max]", $tabs[$key]['prices'][$pkey]['max'] ?? $prices[$pkey]['max'] ?? '') }}
                    </div>
                    <div class="input-field col s2">
                        {{ Form::label("properties[tabs][$key][prices][$pkey][count]", 'Count') }}
                        {{ Form::text("properties[tabs][$key][prices][$pkey][count]", $tabs[$key]['prices'][$pkey]['count'] ?? $prices[$pkey]['count'] ?? '') }}
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
