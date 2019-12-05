@set('styles',$search_helper->getFeatures('styles'))
<div class="mb-20">
    <div class="input-field col s12">
        <select name="style[]" multiple class="advance-search_features" data-url="{{route('website.realestate.styles')}}">
            <option value="" disabled selected>Select Options</option>
        </select>
        <label>Style</label>
    </div>
</div>
