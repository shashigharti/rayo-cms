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
            <fieldset class="mt-2">
                <legend>Type of Properties & Property Status</legend>
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
            </fieldset>
        </fieldset>
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
        <div class="form-group form-material mt-3 row">
            <div class="col s12">
                {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
            </div>
        </div>
    {{ Form::close() }}
</div>
