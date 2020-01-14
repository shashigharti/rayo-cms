@inject('advancesearch_helper', '\Robust\RealEstate\Helpers\AdvanceSearchHelper')
<div class="row">
    <div class="input-field col s12">
        {{ Form::label('header', 'Header', ['class' => 'required' ]) }}
        {{ Form::text('properties[header]', $properties->header ?? '', [
           'placeholder' => 'Banner Content'
           ])
        }}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {{ Form::label('url', 'Url', ['class' => 'required' ]) }}
        {{ Form::text('properties[url]', $properties->url ?? '', [
           'placeholder' => 'Url'
           ])
        }}
    </div>
</div>

<div class="row">
    <div class="input-field col s12 mt-3">
        {{ Form::label('tabs', 'Tabs', ['class' => 'control-label' ]) }}
        {{ Form::select('properties[tabs][]',
            [
                'condos' =>'condos',
                'neighbourhood' => 'neighbourhood',
                'communities' => 'communities',
                'acreages' => 'acreages',
                'waterfront' => 'waterfront'
            ],
            $properties->tabs ?? [],
            [
                'class'=>'browser-default multi-select',
                'multiple'
            ])
        }}
    </div>
</div>
