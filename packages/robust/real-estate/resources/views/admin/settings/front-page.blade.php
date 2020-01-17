@inject('banner_helper', 'Robust\RealEstate\Helpers\BannerHelper')
<style>
    .dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }
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
        <div class="col s12 m6 dd">
            <fieldset class="mt-2">
                <legend>Sort Banners</legend>
                <ul class="collection dd-item">
                    @set('singleColBlocks', $banner_helper->getBannersByType(['single-col-block']))
                    @foreach($singleColBlocks as $key => $banner)
                        @set('properties',json_decode($banner->properties))
                        <li class="dd-item collection-item" data-id="{{$key}}">
                            <i class="dd-handle material-icons">zoom_out_map</i> {{ $properties->header }}
                        </li>
                    @endforeach
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
