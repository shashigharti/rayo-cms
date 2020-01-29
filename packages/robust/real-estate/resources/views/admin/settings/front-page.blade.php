@inject('banner_helper', 'Robust\RealEstate\Helpers\BannerHelper')
@set('market_report_settings', config('real-estate.frw.market-report'))

<div class="system-settings__menu">
    {{ Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()]) }}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
    @set('menus', settings('real-estate', 'menus'))
    @foreach($menus as $menu)
        <div class="form-group form-material row">
            <fieldset>
                <legend>{{ucwords($menu)}} (Ordering)</legend>
                <div class="col s2 input-field">
                    {{ Form::checkbox("{$menu}_sort_order_desc", true, $settings["{$menu}_sort_order_desc"] ?? '', [
                            'class' => 'form-control'
                        ])
                    }}
                    {{ Form::label("{$menu}_sort_order_desc", 'Sort Descending') }}
                </div>
                <div class="col s10 input-field">
                    {{ Form::label("{$menu}_order", ucwords($menu). " to skip default sort", ['class' => 'control-label' ]) }}
                    {{ Form::text("{$menu}_order", $settings["{$menu}_order"] ?? '', [
                            'class' => 'form-control',
                            'placeholder' => "Add {$menu} Example: \'st-johns,st-joseph\' "
                        ])
                    }}
                </div>
            </fieldset>
        </div>
    @endforeach
    <div class="form-group form-material row">
        <fieldset class="mt-2">
            <legend>Hide Locations From Dropdown Menu</legend>
            @foreach($menus as $menu)
                <div class="col s6 input-field">
                    {{ Form::label("hide_{$menu}", ucwords($menu)) }}
                    {{ Form::text("hide_{$menu}", $settings["hide_{$menu}"] ?? '', [
                            'class' => 'form-control',
                            'placeholder' => 'Comma separated values E.g \'boca rotan, west palm beach\''
                        ])
                    }}
                </div>
            @endforeach
        </fieldset>
    </div>
    <div class="row">
        <fieldset class="mt-2">
            <legend>Hide zips of counties</legend>
            @set('counties', $location_helper->getLocations(['type' => 'counties']))
            @foreach($counties['counties'] as $key => $county)
                <div class="col s3">
                    {{ Form::checkbox("zips_hide[counties][$key][slug]", $county->slug, $settings['zips_hide']['counties'][$key]['slug'] ?? false) }}
                    {{ Form::label('Hide', $county->slug) }}
                </div>
            @endforeach
        </fieldset>
    </div>
    <div class="row">
        <div class="col s12 m6">
            <fieldset class="mt-2">
                <legend>Market Survey Data Mapping</legend>
                @foreach($market_report_settings['fields-mapping'] as $key => $field)
                    {{ $key }}
                    {{ Form::text("market_report_fields_mapping[$key]", $settings['market_report_fields_mapping'][$key] ?? $field, [
                            'class' => 'form-control'
                        ])
                    }}
                @endforeach
            </fieldset>
        </div>
        <div class="col s12 m6 sort-container__root">
            <fieldset class="mt-2">
                <legend>Sort Banners</legend>
                <ul class="collection sort-container__list" data-update-item="single_col_banner_order">
                    @set('singleColBlocks', $banner_helper->getBannersByType(['single-col-block']))
                    @if(isset($settings['single_col_banner_order']) && ($settings['single_col_banner_order'] !== ''))
                        @set('singleColBlocks', $banner_helper->sortBannersByArray($singleColBlocks, explode(",", $settings['single_col_banner_order'] ?? "")))
                    @endif
                    @foreach($singleColBlocks as $key => $banner)
                        @set('properties', json_decode($banner->properties))
                        <li class="sort-container__item collection-item" data-id="{{ $banner->id }}"
                            data-order="{{ $key }}">
                            <i class="sort-container__handle material-icons">zoom_out_map</i> {{ $banner->title ?? ''}}
                        </li>
                    @endforeach
                    {{ Form::hidden('single_col_banner_order', $settings['single_col_banner_order'] ?? '') }}
                </ul>
            </fieldset>
        </div>
    </div>
    <div class="form-group form-material mt-3 row">
        <div class="col s12">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
