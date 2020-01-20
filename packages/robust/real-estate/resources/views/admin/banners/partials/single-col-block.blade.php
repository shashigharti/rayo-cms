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
            {{ Form::label('properties[attribute_types][]', 'Properties',['class'=>'control-label']) }}
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
@if(isset($properties->attribute_types))
    <div class="row s6">
        <fieldset class="mt-1">
            <legend>Attributes</legend>
            @foreach( $properties->attribute_types as $key => $attribute )
                <div class="col s12">
                    {{ Form::label("properties[attributes][$attribute][]", $attribute,['class'=>'control-label']) }}
                    {{ Form::select("properties[attributes][$attribute][]", [], null, [
                            'class'=>'browser-default multi-select',
                            'data-url' => route('api.listings.attributes.property_name', [$attribute]),
                            'data-selected' => implode(",", $properties->attributes->{$attribute} ?? []),
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
<div class="row mt-5">
    <div class="input-field col s12">
        {{ Form::label('properties[tabs][]', 'Tabs') }}
        {{ Form::select('properties[tabs][]',
            [
                'condos' =>'condos',
                'neighbourhood' => 'neighbourhood',
                'communities' => 'communities',
                'acreages' => 'acreages',
                'waterfront' => 'waterfront',
                '55plus' => '55+'
            ],
            $properties->tabs ?? [],
            [
                'class'=>'browser-default multi-select',
                'multiple'
            ])
        }}
    </div>
</div>
@if(isset($properties->tabs_data))
    <fieldset class="mt-1">
        <legend>Tabs Settings</legend>
        @foreach($properties->tabs_data as $key => $tabs)
            <h5>{{strtoupper($key)}}</h5>
            @foreach($tabs as $index => $tab)
                <div class="row dynamic-elem">
                    <div class="input-field col s4">
                        {{ Form::label("properties[tabs_data][$key][$index][min]", 'Min') }}
                        {{ Form::text("properties[tabs_data][$key][$index][min]", $tab->min ?? '')}}
                    </div>
                    <div class="input-field col s4">
                        {{ Form::label("properties[tabs_data][$key][$index][max]", 'Max') }}
                        {{ Form::text("properties[tabs_data][$key][$index][max]", $tab->max ?? '')}}
                    </div>
                    <div class="input-field col s2">
                        {{ Form::label("properties[tabs_data][$key][$index][count]", 'Count') }}
                        {{ Form::text("properties[tabs_data][$key][$index][count]", $tab->count ?? '' )}}
                    </div>
                    @if( $price->max == "" )
                        <a href="#"><i class="material-icons dynamic-elem__btn dynamic-elem__add"> add </i></a>
                    @else
                        <a href="#"><i class="material-icons dynamic-elem__btn dynamic-elem__delete"> delete </i></a>
                    @endif
                </div>
            @endforeach
        @endforeach
    </fieldset>
@endif


