<div class="mb-20">
    <div class="input-field col s12">
        <select name="stories">
            <option value="">Select Options</option>
            @for($min = 1; $min <= 10;$min++ )
                <option value="{{$min}}">{{$min}}</option>
            @endfor
        </select>
        <label>Stories</label>
    </div>
</div>