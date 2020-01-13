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
    <div class="input-field col s12 mt-2">
        {{ Form::label('properties[locations]', 'Locations', ['class' => 'control-label' ]) }}
        {{ Form::select("properties[locations][]", [],
            $properties->locations ?? [],
            [
                'data-url' => route('api.locations'),
                'data-selected' => implode(",", $properties->locations ?? []),
                'class'=>'browser-default multi-select ad-search-field',
                'multiple'
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
