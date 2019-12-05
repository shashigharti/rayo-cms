<div class="mb-20">
    <div class="input-field col s12">
        <select name="zip[]" multiple class="advance-search_location" data-url="{{route('website.realestate.zips')}}">
            <option value="" disabled selected>Select Options</option>
            @if(isset($locations['zips']))
                @foreach($locations['zips'] as $zips)
                    <option value="{{$zips->id}}">{{$zips->name}}</option>
                @endforeach
            @endif
        </select>
        <label>Zip</label>
    </div>
</div>
