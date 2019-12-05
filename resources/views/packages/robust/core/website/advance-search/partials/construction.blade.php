@set('constructions',['Aluminum Siding','Brick','Block','Frame','Elevated','CBS','Concrete','Mixed'])
<div class="mb-20">
    <div class="input-field col s12">
        <select name="construction[]" multiple>
            <option value="" disabled selected>Select Options</option>
            @foreach($constructions as $construction)
                <option value="{{$construction}}">{{$construction}}</option>
            @endforeach
        </select>
        <label>Construction</label>
    </div>
</div>
