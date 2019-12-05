<div class="mb-20">
    <div class="input-field col s6">
        <select name="year_min">
            <option value="" disabled selected>Min</option>
            @for($min = 1900; $min <= 2019; $min += 10)
                <option value="{{$min}}">{{$min}}</option>
            @endfor
            <option value="2019">2019</option>
        </select>
        <label>Year Built(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="year_max">
            <option value="" disabled selected>Max</option>
            @for($max = 1900; $max <= 2019;$max += 10)
                <option value="{{$max}}">{{$max}}</option>
            @endfor
            <option value="2019">2019</option>
        </select>
        <label></label>
    </div>
</div>
