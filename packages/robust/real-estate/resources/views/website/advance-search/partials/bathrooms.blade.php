@set('baths_min',$search_settings['baths_min'] ?? '1')
@set('baths_max',$search_settings['baths_max'] ?? '5')
@set('baths_increase',$search_settings['baths_increase'] ?? '1')
<div class="mb-20">
    <div class="input-field col s6">
        <select name="bathrooms_min">
            <option value="">Min</option>
            @for($baths = $baths_min; $baths <= $baths_max; $baths += $baths_increase)
                <option value="{{$baths}}">{{$baths}}</option>
            @endfor
        </select>
        <label>Bathrooms(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="bathrooms_max">
            <option value="">Max</option>
            @for($baths = $baths_min; $baths <= $baths_max; $baths += $baths_increase)
                <option value="{{$baths}}">{{$baths}}</option>
            @endfor
        </select>
        <label></label>
    </div>
</div>
