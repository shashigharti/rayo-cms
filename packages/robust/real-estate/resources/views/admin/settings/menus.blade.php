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
                    {{ Form::checkbox("{$menu}_sort_order_desc", $settings["{$menu}_sort_order_desc"] ?? '', [
                            'class' => 'form-control'
                        ])
                    }}
                </div>
                <div class="col s10 input-field">
                    {{ Form::label("{$menu}_order", "{$menu} to skip default sort", ['class' => 'control-label' ]) }}
                    {{ Form::text("{$menu}_order", $settings["{$menu}_order"] ?? '', [
                            'class' => 'form-control',
                            'placeholder' => 'Add counties Example: \'st-johns,st-joseph\' '
                        ])
                    }}
                </div>
            </div>
        </fieldset>
    @endforeach
    <div class="form-group form-material mt-3 row">
        <div class="col s12">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
