@inject('tabs_helper', 'Robust\RealEstate\Helpers\TabsHelper')
@set('subdivisions', $tabs_helper->neighborhoods('cities', $properties->locations->cities))
<div class="row">
    <div id="{{ $tab }}" class="col s12">
        <div class="row">
            @foreach ($subdivisions as $pkey => $subdivision)
                <div class="input-field col s4">
                    <div class="input-field col s7">
                        {{ Form::label('Slug', 'Slug') }}
                        {{ Form::text("properties[tabs][$tab][subdivisions][$pkey][slug]", $tabs[$tab]['subdivisions'][$pkey]['slug'] ?? $subdivision->slug ?? '') }}
                    </div>
                    <div class="input-field col s2">
                        {{ Form::label('Count', 'Count') }}
                        {{ Form::text("properties[tabs][$tab][subdivisions][$pkey][count]", $tabs[$tab]['subdivisions'][$pkey]['count'] ?? 0) }}
                    </div>
                    <div class="input-field col s2">
                        {{ Form::label('Hide', 'Hide') }}
                        {{ Form::checkbox("properties[tabs][$tab][subdivisions][$pkey][hide]", true, $tabs[$tab]['subdivisions'][$pkey]['hide'] ?? false) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
