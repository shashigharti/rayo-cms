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
        <div class="input-field col s6">
            {{ Form::label('properties[location_types][]', 'Locations') }}
            {{ Form::select('properties[location_types][]', config('real-estate.frw.locations'), $properties->location_types ?? [], [
                    'class'=>'browser-default multi-select',
                    'multiple'
               ])
            }}
        </div>
        <div class="input-field col s6">
            {{ Form::label('properties[attribute_types][]', 'Properties') }}
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
                <div class="input-field col s12">
                    {{ Form::label("properties[locations][$key][]", $location) }}
                    {{ Form::select("properties[locations][$key][]", [], null, [
                            'class'=>'browser-default multi-select',
                            'data-url' => route('api.listings.attributes'),
                            'data-selected' => implode(",", $properties->locations->{$key} ?? []),
                            'multiple'
                       ])
                    }}
                </div>
            @endforeach
        </fieldset>
    </div>
@endif
@if(isset($properties->attribute_types))
    <div class="row">
        <fieldset class="mt-1">
            <legend>Attributes</legend>
            @foreach( $properties->attribute_types as $key => $attribute )
                <div class="input-field col s12">
                    {{ Form::label("properties[attributes][$attribute][]", $attribute) }}
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
        <div class="input-field col s4">
            {{ Form::label('properties[price_settings][min]', 'Min') }}
            {{ Form::text('properties[price_settings][min]', $properties->price_settings->min ?? '')}}
        </div>
        <div class="input-field col s4">
            {{ Form::label('properties[price_settings][max]', 'Max') }}
            {{ Form::text('properties[price_settings][max]', $properties->price_settings->max ?? '')}}
        </div>
        <div class="input-field col s4">
            {{ Form::label('properties[price_settings][increment]', 'Increment') }}
            {{ Form::text('properties[price_settings][increment]', $properties->price_settings->increment ?? '')}}
        </div>
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
