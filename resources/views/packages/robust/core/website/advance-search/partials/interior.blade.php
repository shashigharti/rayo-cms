@set('interiors',$search_helper->getFeatures('interiors'))
<div class="mb-20">
    <div class="input-field col s12">
        <select name="interiors[]" multiple class="advance-search_features" data-url="{{route('website.realestate.interiors')}}">
            <option value="" disabled selected>Select Options</option>
        </select>
        <label>Interior</label>
    </div>
</div>
