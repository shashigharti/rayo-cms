@set('interiors',['Bar','Built-in-shelves','Close Cabinets','Cook Island'])
<div class="mb-20">
    <div class="input-field col s12">
        <select name="interiors[]" multiple>
            <option value="" disabled selected>Select Options</option>
            @foreach($interiors as $interior)
                <option value="{{$interior}}">{{$interior}}</option>
            @endforeach
        </select>
        <label>Interior</label>
    </div>
</div>
