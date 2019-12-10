@set('year_min',$search_settings['year_min'] ?? '1900')
@set('year_max',$search_settings['year_max'] ?? '2020')
@set('year_increase',$search_settings['year_increase'] ?? '10')
<div class="mb-20">
    <div class="input-field col s6">
        <select name="year_min">
            <option value="" disabled selected>Min</option>
            @for($year = $year_min; $year <= $year_max; $year += $year_increase)
                <option value="{{$year}}">{{$year}}</option>
            @endfor
            <option value="2019">2019</option>
        </select>
        <label>Year Built(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="year_max">
            <option value="" disabled selected>Max</option>
            @for($year = $year_min; $year <= $year_max; $year += $year_increase)
                <option value="{{$year}}">{{$year}}</option>
            @endfor
            <option value="2019">2019</option>
        </select>
        <label></label>
    </div>
</div>
