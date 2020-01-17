@inject('banner_helper', 'Robust\RealEstate\Helpers\BannerHelper')
<style>
    .sort-container__placeholder { border: 1px dashed #0a0a0a ; background-color: #00bcd4}
</style>
<div class="system-settings__menu">
    {{ Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()]) }}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
    @set('menus', settings('real-estate', 'menus'))
    @foreach($menus as $menu)
        <fieldset>
            <legend>{{ucwords($menu)}} (Ordering)</legend>
            <div class="form-group form-material row">
                <div class="col s2 input-field">
                    {{ Form::label("{$menu}_sort_order_desc", 'Sort Descending') }}
                    {{ Form::checkbox("{$menu}_sort_order_desc", true, $settings["{$menu}_sort_order_desc"] ?? '', [
                            'class' => 'form-control'
                        ])
                    }}
                </div>
                <div class="col s10 input-field">
                    {{ Form::label("{$menu}_order", ucwords($menu). " to skip default sort", ['class' => 'control-label' ]) }}
                    {{ Form::text("{$menu}_order", $settings["{$menu}_order"] ?? '', [
                            'class' => 'form-control',
                            'placeholder' => "Add {$menu} Example: \'st-johns,st-joseph\' "
                        ])
                    }}
                </div>
            </div>
        </fieldset>
    @endforeach
    <fieldset class="mt-2">
        <legend>Hide Locations</legend>
        <div class="form-group form-material row">
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
        </div>
    </fieldset>
    <div class="row">
        <div class="col s12 m6 sort-container__root">
            <fieldset class="mt-2">
                <legend>Sort Banners</legend>
                <ul class="collection sort-container__list">
                    @set('singleColBlocks', $banner_helper->getBannersByType(['single-col-block']))
                    @if(isset($settings['single_col_banner_order']) && ($settings['single_col_banner_order'] !== ''))
                        @set('singleColBlocks', $banner_helper->sortBannersByArray($singleColBlocks, explode(",", $settings['single_col_banner_order'] ?? "")))
                    @endif
                    @foreach($singleColBlocks as $key => $banner)
                        @set('properties',json_decode($banner->properties))
                        <li class="sort-container__item collection-item" data-id="{{$banner->id}}" data-order="{{$key}}">
                            <i class="sort-container__handle material-icons">zoom_out_map</i> {{ $properties->header }}
                        </li>
                    @endforeach
                </ul>
                {{ Form::hidden('single_col_banner_order', $settings['single_col_banner_order'] ?? '')}}
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
