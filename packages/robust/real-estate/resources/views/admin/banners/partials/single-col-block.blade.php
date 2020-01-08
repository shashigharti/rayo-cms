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
    <div class="input-field col s12">
        {{ Form::label('properties[prices]', 'Locations', ['class' => 'control-label' ]) }}
        {{ Form::select("properties[prices][]", [
                '10000-20000' => '10000-20000',
                '20000-30000' => '20000-30000',
                '30000-40000' => '30000-40000',
                '40000-50000' => '40000-50000',
                '50000-60000' => '50000-60000',
                '60000-70000' => '60000-70000',
                '70000-80000' => '70000-80000',
                '80000-90000' => '80000-90000',
                '90000-100000' => '90000-100000',
            ],
            $properties->prices ?? [],
            [
                'data-selected' => implode(",", $properties->prices ?? []),
                'class'=>'browser-default multi-select ad-search-field',
                'multiple'
            ])
        }}
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
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
