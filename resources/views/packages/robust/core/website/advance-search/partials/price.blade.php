<div class="mb-20">
    <div class="input-field col s6">
        <select name="price_min">
            <option value="" disabled selected>Min</option>
            @for($min = 25000; $min <= 1000000; $min += 25000)
                <option value="{{$min}}">${{$min}}</option>
            @endfor
        </select>
        <label>Price(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="price_max">
            <option value="" disabled selected>Max</option>
            @for($max = 25000; $max <= 1000000;$max += 25000)
                <option value="{{$max}}">${{$max}}</option>
            @endfor
        </select>
        <label></label>
    </div>
</div>
