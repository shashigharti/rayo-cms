<div class="mb-20">
    <div class="input-field col s12">
        <select name="cities[]" multiple>
            <option value="" disabled selected>Select Options</option>
            @if(isset($locations['cities']))
                @foreach($locations['cities'] as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            @endif
        </select>
        <label>City</label>
    </div>
</div>
