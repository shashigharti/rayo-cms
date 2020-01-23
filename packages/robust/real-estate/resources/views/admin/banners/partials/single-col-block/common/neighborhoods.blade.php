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
                <fieldset>
                    <legend>Select to hide subdivisions</legend>
                    @foreach ($subdivisions as $pkey => $subdivision)
                        <div class="col s3">
                            @set('c_title', ($tabs[$tab]['subdivisions'][$pkey]['slug'] ?? $subdivision->slug))
                            <div class="input-field">
                                {{ Form::checkbox("properties[tabs][$tab][subdivisions][$pkey][hide]", true, $tabs[$tab]['subdivisions'][$pkey]['hide'] ?? false) }}
                                {{ Form::label('Hide', "$c_title") }}
                            </div>
                            {{ Form::hidden("properties[tabs][$tab][subdivisions][$pkey][slug]", $tabs[$tab]['subdivisions'][$pkey]['slug'] ?? $subdivision->slug ?? '') }}
                            {{ Form::hidden("properties[tabs][$tab][subdivisions][$pkey][count]", $tabs[$tab]['subdivisions'][$pkey]['count'] ?? 0) }}
                        </div>
                    @endforeach
                </fieldset>
            </div>
        </div>
    </div>
@endif
