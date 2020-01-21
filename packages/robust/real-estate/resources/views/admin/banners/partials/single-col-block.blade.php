@inject('advancesearch_helper', '\Robust\RealEstate\Helpers\AdvanceSearchHelper')
<div class="row">
    <div class="input-field col s12">
        {{ Form::label('properties[header]', 'Header') }}
        {{ Form::text('properties[header]', $properties->header ?? '', [
                'placeholder' => 'Banner Content'
           ])
        }}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {{ Form::label('properties[url]', 'Url') }}
        {{ Form::text('properties[url]', $properties->url ?? '', [
                'placeholder' => 'Url'
           ])
        }}
    </div>
</div>
<div class="row">
    <fieldset class="mt-1">
        <legend>Filters</legend>
        <div class="col s6">
            {{ Form::label('properties[location_types][]', 'Locations',['class'=>'control-label']) }}
            {{ Form::select('properties[location_types][]', config('real-estate.frw.locations'), $properties->location_types ?? [], [
                    'class'=>'browser-default multi-select',
                    'multiple'
               ])
            }}
        </div>
        <div class="col s6">
            {{ Form::label('properties[attribute_types][]', 'Properties(tabs)',['class'=>'control-label']) }}
            {{ Form::select('properties[attribute_types][]', [], null, [
                    'class'=>'browser-default multi-select',
                    'data-url' => route('api.listings.attributes'),
                    'data-selected' => implode( ',', $properties->attribute_types ?? [] ),
                    'multiple'
               ])
            }}
        </div>
    </fieldset>
</div>

@if(isset($properties->location_types))
    <div class="row">
        <fieldset class="mt-1">
            <legend>Locations</legend>
            @foreach( $properties->location_types as $key => $location )
                <div class="col s12">
                    {{ Form::label("properties[locations][$location][]", $location,['class'=>'control-label']) }}
                    {{ Form::select("properties[locations][$location][]", [], null, [
                            'class'=>'browser-default multi-select',
                            'data-url' => route('api.locations.type', [$location]),
                            'data-selected' => implode(",", $properties->locations->{$location} ?? []),
                            'multiple'
                       ])
                    }}
                </div>
            @endforeach
        </fieldset>
    </div>
@endif
<div class="row">
    <fieldset class="mt-1">
        <legend>Price Settings</legend>
        @set('prices', $properties->prices ?? [])
        @if(count($prices) <= 0)
            @set('prices', json_decode(json_encode(config('real-estate.frw.default_pricing_ranges'))))
        @endif

        @foreach($prices as $key => $price)
            <div class="row dynamic-elem">
                <div class="input-field col s4">
                    {{ Form::label("properties[prices][$key][min]", 'Min') }}
                    {{ Form::text("properties[prices][$key][min]", $price->min ?? '')}}
                </div>
                <div class="input-field col s4">
                    {{ Form::label("properties[prices][$key][max]", 'Max') }}
                    {{ Form::text("properties[prices][$key][max]", $price->max ?? '')}}
                </div>
                <div class="input-field col s2">
                    {{ Form::label("properties[prices][$key][count]", 'Count') }}
                    {{ Form::text("properties[prices][$key][count]", $price->count ?? '' )}}
                </div>
                @if( $price->max == "" )
                    <a href="#"><i class="material-icons dynamic-elem__btn dynamic-elem__add"> add </i></a>
                @else
                    <a href="#"><i class="material-icons dynamic-elem__btn dynamic-elem__delete"> delete </i></a>
                @endif
            </div>
        @endforeach
    </fieldset>
</div>
<div class="row">
    <fieldset>
        <legend>Tabs Settings</legend>
        <div class="row mt-5">
            @set('tabs_config', config('real-estate.frw.single_banner_tabs_properties_filter'))
            @set('tabs', array_combine(array_keys($tabs_config), array_keys($tabs_config)))
            <div class="input-field col s12">
                {{ Form::label('properties[tabs_to_display][]', 'Tabs', ['class'=>'control-label']) }}
                {{ Form::select('properties[tabs_to_display][]', $tabs,
                    $properties->tabs_to_display ?? [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ])
                }}
            </div>
        </div>
        @if(isset($properties->tabs_to_display))
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        @foreach($properties->tabs_to_display as $key => $tab)
                            <li class="tab col s3" @if($key == 0) selected @endif>
                                <a href="#{{ $key }}">{{ $tabs_config[$tab]['display_name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @foreach($properties->tabs_to_display as $key => $tab)
                    @include("real-estate::admin.banners.partials.single-col-block.common.{$tabs_config[$tab]['type']}")
                @endforeach
            </div>
        @endif
    </fieldset>
</div>
