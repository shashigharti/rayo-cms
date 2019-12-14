@set('acres_min',$search_settings['acres_min'] ?? '1')
@set('acres_max',$search_settings['acres_max'] ?? '20')
@set('acres_increase',$search_settings['acres_increase'] ?? '1')
<div class="mb-20">
    <div class="input-field col s6">
        <select name="acres_min">
            <option value="">Min</option>
            @for($acre = $acres_min; $acre <= $acres_max; $acre += $acres_increase)
                <option value="{{$acre}}">{{$acre}}</option>
            @endfor
        </select>
        <label>Acres(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="acres_max">
            <option value="">Max</option>
            @for($acre = $acres_min; $acre <= $acres_max; $acre += $acres_increase)
                <option value="{{$acre}}">{{$acre}}</option>
            @endfor
        </select>
        <label></label>
    </div>
</div>
