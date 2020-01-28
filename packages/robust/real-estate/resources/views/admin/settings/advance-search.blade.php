@inject('advancesearch_helper', '\Robust\RealEstate\Helpers\AdvanceSearchHelper')
@set('property_types', $advancesearch_helper->getAugmentedAttributesListByPropertyName('property_type'))
@set('property_statuses', config('real-estate.frw.settings.advance-search')['property_statuses'])
<div class="system-settings__advance-search">
    {{ Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()]) }}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
    <fieldset>
        <legend>Advance Search Filters</legend>
        <div class="row multi-select-container">
            <div class="col s6">
                {{ Form::label('first_block', 'First Block', ['class' => 'control-label' ]) }}
                {{ Form::select('first_block[]', $advancesearch_helper->getAdvanceSearchFilters(),
                   $settings['first_block'] ?? [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ])
                }}
            </div>
            <div class="col s6">
                {{ Form::label('second_block', 'Second Block', ['class' => 'control-label' ]) }}
                {{ Form::select('second_block[]', $advancesearch_helper->getAdvanceSearchFilters(),
                    $settings['second_block'] ?? [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ])
                }}
            </div>
        </div>
        <div class="row multi-select-container mt-1">
            <div class="col s6">
                {{ Form::label('third_block', 'Third Block', ['class' => 'control-label' ]) }}
                {{ Form::select('third_block[]',  $advancesearch_helper->getAdvanceSearchFilters(),
                    $settings['third_block'] ?? [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ])
                }}
            </div>
            <div class="col s6">
                {{ Form::label('fourth_block', 'Fourth Block', ['class' => 'control-label' ]) }}
                {{ Form::select('fourth_block[]',  $advancesearch_helper->getAdvanceSearchFilters(),
                    $settings['fourth_block'] ?? [],
                    [
                    'class'=>'browser-default multi-select',
                    'multiple'
                    ])
                }}
            </div>
        </div>
        <fieldset class="mt-3">
            <legend>Sort Block Filters</legend>
            <div class="col s3 sort-container__root">
                <legend>First Block</legend>
                <ul class="collection sort-container__list" data-update-item="first_block_order">
                    @foreach(sort_array_by_array($settings['first_block'], $settings['first_block_order'] ? explode(',', $settings['first_block_order']) : []) as $key => $first_block_item)
                        <li class="sort-container__item collection-item"
                            data-id="{{ $first_block_item }}"
                            data-order="{{ $key }}"
                        >
                            <i class="sort-container__handle material-icons">zoom_out_map</i> {{ $first_block_item }}
                        </li>
                    @endforeach
                    {{ Form::hidden('first_block_order', $settings['first_block_order'] ?? '') }}
                </ul>
            </div>
            <div class="col s3 sort-container__root">
                <legend>Second Block</legend>
                <ul class="collection sort-container__list" data-update-item="second_block_order">
                    @foreach(sort_array_by_array($settings['second_block'], $settings['second_block_order'] ? explode(',', $settings['second_block_order']) : []) as $key => $second_block_item)
                        <li class="sort-container__item collection-item"
                            data-id="{{ $second_block_item }}"
                            data-order="{{ $key }}"
                        >
                            <i class="sort-container__handle material-icons">zoom_out_map</i> {{ $second_block_item }}
                        </li>
                    @endforeach
                    {{ Form::hidden('second_block_order', $settings['second_block_order'] ?? '') }}
                </ul>
            </div>
            <div class="col s3 sort-container__root">
                <legend>Third Block</legend>
                <ul class="collection sort-container__list" data-update-item="third_block_order">
                    @foreach(sort_array_by_array($settings['third_block'], explode(',', $settings['third_block_order'] ?? '')) as $key => $third_block_item)
                        <li class="sort-container__item collection-item"
                            data-id="{{ $third_block_item }}"
                            data-order="{{ $key }}"
                        >
                            <i class="sort-container__handle material-icons">zoom_out_map</i> {{ $third_block_item }}
                        </li>
                    @endforeach
                    {{ Form::hidden('third_block_order', $settings['third_block_order'] ?? '') }}
                </ul>
            </div>
            <div class="col s3 sort-container__root">
                <legend>Fourth Block</legend>
                <ul class="collection sort-container__list" data-update-item="fourth_block_order">
                    @foreach(sort_array_by_array($settings['fourth_block'], $settings['fourth_block_order'] ? explode(',', $settings['fourth_block_order']) : []) as $key => $fourth_block_item)
                        <li class="sort-container__item collection-item"
                            data-id="{{ $fourth_block_item }}"
                            data-order="{{ $key }}"
                        >
                            <i class="sort-container__handle material-icons">zoom_out_map</i> {{ $fourth_block_item }}
                        </li>
                    @endforeach
                    {{ Form::hidden('fourth_block_order', $settings['fourth_block_order'] ?? '') }}
                </ul>
            </div>
        </fieldset>
    </fieldset>
    <fieldset class="mt-2">
        <legend>Type of Properties & Property Status</legend>
        <div class="row">
            <div class="col s6">
                {{ Form::label('property_types', 'Property Types', ['class' => 'control-label' ]) }}
                {{ Form::select('property_types[]', $property_types,
                     $settings['property_types'] ?? [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ])
                }}
            </div>
            <div class="col s6">
                {{ Form::label("property_statuses", 'Property Statuses', ['class' => 'control-label' ]) }}
                {{ Form::select("property_statuses[]", array_combine($property_statuses, $property_statuses),
                    $settings['property_statuses'] ?? [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ])
                }}
            </div>
        </div>
        <fieldset class="mt-3">
            <legend>Default Values For Filters</legend>
            <div class="col s4">
                {{ Form::label("default_values[cities]", 'Cities', ['class' => 'control-label' ]) }}
                {{ Form::select("default_values[cities][]", [],
                    [],
                    [
                        'data-url' => route('api.locations.type', ['cities']),
                        'data-selected' => implode(",", $settings['default_values']['cities'] ?? []),
                        'class'=>'browser-default multi-select ad-search-field',
                        'multiple'
                    ])
                }}
            </div>
            <div class="col s4">
                {{ Form::label("default_values[property_type]", 'Property Type', ['class' => 'control-label' ]) }}
                {{ Form::select("default_values[property_type][]", $property_types,
                     $settings['default_values']['property_type'] ?? [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ])
                }}
            </div>
            <div class="col s4">
                {{ Form::label("default_values['status']", 'Property Status', ['class' => 'control-label' ]) }}
                {{ Form::select("default_values[status][]",  $property_types,
                    $settings['default_values']['status'] ?? [],
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ])
                }}
            </div>
        </fieldset>
        <div class="row">
            <div class="col s12 m6 sort-container__root">
                <fieldset class="mt-2">
                    <legend>Sort Property Types</legend>
                    <ul class="collection sort-container__list" data-update-item="property_types_order">
                        @foreach(sort_array_by_array($settings['property_types'], isset($settings['property_types_order']) ? explode(',', $settings['property_types_order']) : []) as $key => $property_type)
                            <li class="sort-container__item collection-item"
                                data-id="{{ $property_type }}"
                                data-order="{{ $key }}"
                            >
                                <i class="sort-container__handle material-icons">zoom_out_map</i> {{ $property_type }}
                            </li>
                        @endforeach
                        {{ Form::hidden('property_types_order', $settings['property_types_order'] ?? '') }}
                    </ul>
                </fieldset>
            </div>
            <div class="col s12 m6 sort-container__root">
                <fieldset class="mt-2">
                    <legend>Sort Property Statuses</legend>
                    <ul class="collection sort-container__list" data-update-item="property_statuses_order">
                        @foreach(sort_array_by_array($settings['property_statuses'], isset($settings['property_statuses_order']) ? explode(',', $settings['property_statuses_order']) : []) as $key => $status)
                            <li class="sort-container__item collection-item"
                                data-id="{{ $status }}"
                                data-order="{{ $key }}"
                            >
                                <i class="sort-container__handle material-icons">zoom_out_map</i> {{ $status }}
                            </li>
                        @endforeach
                        {{ Form::hidden('property_statuses_order', $settings['property_statuses_order'] ?? '') }}
                    </ul>
                </fieldset>
            </div>
        </div>
    </fieldset>
    <div class="form-group form-material mt-3 row">
        <div class="col s12">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
