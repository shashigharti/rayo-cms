@inject('advancesearch_helper', '\Robust\RealEstate\Helpers\AdvanceSearchHelper')
<div class="row">
    <div class="input-field col s12">
        {{ Form::label('properties[header]', 'Header', ['class' => 'required' ]) }}
        {{ Form::text('properties[header]', $properties->header ?? '', [
           'placeholder' => 'Banner Content'
           ])
        }}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {{ Form::label('properties[url]', 'Url', ['class' => 'required' ]) }}
        {{ Form::text('properties[url]', $properties->url ?? '', [
           'placeholder' => 'Url'
           ])
        }}
    </div>
</div>

<div class="row">
    <fieldset class="mt-2">
        <legend>Price Settings</legend>
        <div class="input-field col s4">
            {{ Form::label('properties[price_settings][min]', 'Min') }}
            {{ Form::text('properties[price_settings][min]', '')}}
        </div>
        <div class="input-field col s4">
            {{ Form::label('properties[price_settings][max]', 'Max') }}
            {{ Form::text('properties[price_settings][max]', '')}}
        </div>
        <div class="input-field col s4">
            {{ Form::label('properties[price_settings][increment]', 'Increment') }}
            {{ Form::text('properties[price_settings][increment]', '')}}
        </div>
    </fieldset>
</div>


<div class="row">
    <div class="input-field col s12 mt-3">
        {{ Form::label('properties[tabs][]', 'Tabs', ['class' => 'control-label' ]) }}
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
