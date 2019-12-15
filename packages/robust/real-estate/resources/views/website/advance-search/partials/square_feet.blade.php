@set('square_min',$search_settings['square_min'] ?? '1')
@set('square_max',$search_settings['square_max'] ?? '5')
@set('square_increase',$search_settings['square_increase'] ?? '1')
<div class="mb-20">
    <div class="input-field col s6">
        <select name="square_min">
            <option value="">Min</option>
            @for($square = $square_min; $square <= $square_max; $square += $square_increase)
                <option value="{{$square}}">{{$square}}</option>
            @endfor
        </select>
        <label>SquareFeet(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="square_min">
            <option value="">Max</option>
            @for($square = $square_min; $square <= $square_max; $square += $square_increase)
                <option value="{{$square}}">{{$square}}</option>
            @endfor
        </select>
    </div>
</div>
