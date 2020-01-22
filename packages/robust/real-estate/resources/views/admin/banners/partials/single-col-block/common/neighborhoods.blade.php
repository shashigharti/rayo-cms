@inject('tabs_helper', 'Robust\RealEstate\Helpers\TabsHelper')
@if(isset($properties->locations))
    @set('subdivisions', $tabs_helper->neighborhoods('cities', $properties->locations->cities))
    <div class="row">
        <div id="{{ $tab }}" class="col s12">
            <div class="form-group form-material row">
                <div class="col s6">
                    {{ Form::label("properties[tabs][$tab][display_name]", 'Display Name', ['class' => 'control-label' ]) }}
                    {{ Form::text("properties[tabs][$tab][display_name]", $tabs[$tab]['display_name'] ?? $tabs_config[$tab]['display_name']) }}
                </div>
                {{ Form::hidden("properties[tabs][$tab][type]", $tabs[$tab]['type'] ?? $tabs_config[$tab]['type']) }}
            </div>
            <div class="form-group form-material row">
                <div class="col s12">
                    {{ Form::label("properties[tabs][$tab][page_title]", 'Page Title', ['class' => 'control-label' ]) }}
                    {{ Form::text("properties[tabs][$tab][page_title]", $tabs[$tab]['page_title'] ?? '') }}
                </div>
            </div>
            <div class="row">
                @foreach ($subdivisions as $pkey => $subdivision)
                    <div class="col s12">
                        <div class="input-field inline__input-field col s5">
                            {{ Form::label('Slug', 'Slug') }}
                            {{ Form::text("properties[tabs][$tab][subdivisions][$pkey][slug]", $tabs[$tab]['subdivisions'][$pkey]['slug'] ?? $subdivision->slug ?? '') }}
                        </div>
                        <div class="input-field inline__input-field col s5">
                            {{ Form::label('Count', 'Count') }}
                            {{ Form::text("properties[tabs][$tab][subdivisions][$pkey][count]", $tabs[$tab]['subdivisions'][$pkey]['count'] ?? 0) }}
                        </div>
                        <div class="input-field col s2 mt-4">
                            {{ Form::checkbox("properties[tabs][$tab][subdivisions][$pkey][hide]", true, $tabs[$tab]['subdivisions'][$pkey]['hide'] ?? false) }}
                            {{ Form::label('Hide', 'Hide') }}
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
