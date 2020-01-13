<fieldset class="mt-2">
    <legend>Sub Menus</legend>
    <div class="row">
        <div class="col s4">
            {{ Form::label('title', 'Menu Title') }}
        </div>
        <div class="col s6">
            {{ Form::label('url', 'URL') }}
        </div>
    </div>
    <div class="row dynamic-elem">
        <div class="input-field col s4">
            {{ Form::text('properties[title]', $properties->title ?? '', [
               'placeholder' => 'Menu Title',
               'required'  => 'required'
               ])
            }}
        </div>
        <div class="input-field col s6">
            {{ Form::text('properties[url]', $properties->url ?? '', [
               'placeholder' => 'Menu Url'
               ])
            }}
        </div>
        <a href="#"><i class="material-icons dynamic-elem__btn dynamic-elem__add"> add </i></a>
        <a href="#"><i class="material-icons dynamic-elem__btn dynamic-elem__delete hide"> delete </i></a>
    </div>
</fieldset>

