<div class="mb-20">
    <div class="input-field col s12">
        <select name="counties[]" multiple>
            <option value="" disabled selected>Select Options</option>
            @if(isset($locations['counties']))
                @foreach($locations['counties'] as $county)
                    <option value="{{$county->id}}">{{$county->name}}</option>
                @endforeach
            @endif
        </select>
        <label>Country</label>
    </div>
</div>
