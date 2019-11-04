
@if(!empty($remaps))
    @foreach($remaps as $key => $value)
        @include('mls::admin.users.partials.remap-field',['key'=>$key,'value' => $value])
     @endforeach
@else
    @include('mls::admin.users.partials.remap-field',['key'=>null,'value' => null])
@endif