<div class="mb-20">
    <div class="input-field col s6">
        <select name="beds_min">
            <option value="" disabled selected>Min</option>
            @for($min = 2500; $min <= 20000; $min += 2500)
                <option value="{{$min}}">{{$min}}</option>
            @endfor
        </select>
        <label>Lot (min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="beds_max">
            <option value="" disabled selected>Max</option>
            @for($max = 2500; $max <= 20000;$max += 2500)
                <option value="{{$max}}">{{$max}}</option>
            @endfor
        </select>
        <label></label>
    </div>
</div>
