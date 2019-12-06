<div class="mb-20">
    <div class="input-field col s6">
        <select name="bathrooms_min">
            <option value="" disabled selected>Min</option>
            @for($min = 1; $min < 6;$min++ )
                <option value="{{$min}}">{{$min}}</option>
            @endfor
        </select>
        <label>Bathrooms(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="bathrooms_max">
            <option value="" disabled selected>Max</option>
            @for($max = 1; $max < 6;$max++ )
                <option value="{{$max}}">{{$max}}</option>
            @endfor
        </select>
        <label></label>
    </div>
</div>
