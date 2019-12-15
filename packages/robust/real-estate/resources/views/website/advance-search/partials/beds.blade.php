@set('beds_min',$search_settings['beds_min'] ?? '1')
@set('beds_max',$search_settings['beds_max'] ?? '5')
@set('beds_increase',$search_settings['beds_increase'] ?? '1')
<div class="mb-20">
    <div class="input-field col s6">
        <select name="beds_min">
            <option value="">Min</option>
            @for($beds = $beds_min; $beds <= $beds_max; $beds += $beds_increase)
                <option value="{{$beds}}">{{$beds}}</option>
            @endfor
        </select>
        <label>Beds(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="beds_max">
            <option value="">Max</option>
            @for($beds = $beds_min; $beds <= $beds_max; $beds += $beds_increase)
                <option value="{{$beds}}">{{$beds}}</option>
            @endfor
        </select>
        <label></label>
    </div>
</div>
