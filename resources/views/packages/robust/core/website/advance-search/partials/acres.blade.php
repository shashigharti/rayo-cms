<div class="mb-20">
    <div class="input-field col s6">
        <select name="acres_min">
            <option value="" disabled selected>Min</option>
            @for($min = 1; $min < 20;$min++ )
                <option value="{{$min}}">{{$min}}</option>
            @endfor
        </select>
        <label>Acres(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="acres_max">
            <option value="" disabled selected>Max</option>
            @for($max = 1; $max < 20;$max++ )
                <option value="{{$max}}">{{$max}}</option>
            @endfor
        </select>
        <label></label>
    </div>
</div>
