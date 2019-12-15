@set('lot_min',$search_settings['lot_min'] ?? '2500')
@set('lot_max',$search_settings['lot_max'] ?? '20000')
@set('lot_increase',$search_settings['lot_increase'] ?? '2500')
<div class="mb-20">
    <div class="input-field col s6">
        <select name="beds_min">
            <option value="" disabled selected>Min</option>
            @for($lot = $lot_min; $lot <= $lot_max; $lot += $lot_increase)
                <option value="{{$lot}}">{{$lot}}</option>
            @endfor
        </select>
        <label>Lot (min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="beds_max">
            <option value="" disabled selected>Max</option>
            @for($lot = $lot_min; $lot <= $lot_max; $lot += $lot_increase)
                <option value="{{$lot}}">{{$lot}}</option>
            @endfor
        </select>
        <label></label>
    </div>
</div>