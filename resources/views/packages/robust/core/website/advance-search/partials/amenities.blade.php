@set('amenities',['Basketball','Beach Club Available','Bike','Jog','Gold Course','Tennis','Boating','Clubhouse'])
<div class="mb-20">
    <div class="input-field col s12">
        <select name="amenities[]" multiple>
            <option value="" disabled selected>Select Options</option>
            @foreach($amenities as $amenity)
                <option value="{{$amenity}}">{{$amenity}}</option>
            @endforeach
        </select>
        <label>Amenities</label>
    </div>
</div>
