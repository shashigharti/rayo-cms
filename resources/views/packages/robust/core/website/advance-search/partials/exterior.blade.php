@set('exteriors',['Auto Sprinkler','Awnings','Built-in-grill','Cabana'])
<div class="mb-20">
    <div class="input-field col s12">
        <select name="exteriors[]" multiple>
            <option value="" disabled selected>Select Options</option>
            @foreach($exteriors as $exterior)
                <option value="{{$exterior}}">{{$exterior}}</option>
            @endforeach
        </select>
        <label>Exterior</label>
    </div>
</div>
