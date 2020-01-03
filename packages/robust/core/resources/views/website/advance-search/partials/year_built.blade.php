@set('year_min',$search_settings['year_min'] ?? '1900')
@set('year_max',$search_settings['year_max'] ?? '2020')
@set('year_increase',$search_settings['year_increase'] ?? '10')

<div class="mb-20">
    <div class="input-field col s6" >
        <select name="year_min" data-selected="{{$query_params['year_min'] ?? ''}}" class="ad-search-field">
            <option value="" selected disabled>Min</option>
            @for($year = $year_min; $year <= $year_max; $year += $year_increase)
                <option value="{{$year}}">{{$year}}</option>
            @endfor
        </select>
        <label>Year Built(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="year_max" data-selected="{{$query_params['year_max'] ?? ''}}" class="ad-search-field">
            <option value="" selected disabled>Max</option>
            @for($year = $year_min; $year <= $year_max; $year += $year_increase)
                <option value="{{$year}}">{{$year}}</option>
            @endfor
        </select>
    </div>
</div>
