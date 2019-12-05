@set('styles',['Colonial','Cape Cod','Contemporary','European','Ranch'])
<div class="mb-20">
    <div class="input-field col s12">
        <select name="style[]" multiple>
            <option value="" disabled selected>Select Options</option>
            @foreach($styles as $style)
                <option value="{{$style}}">{{$style}}</option>
            @endforeach
        </select>
        <label>Style</label>
    </div>
</div>
