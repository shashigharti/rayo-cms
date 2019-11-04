@if($data != '')
    <p>Sample Data Table</p>
    <div class="row" style="width: 100%; height: 250px; overflow: auto;">
        {!! $data !!}
    </div>
@endif
@if(count($field_details) > 0)
    <table class="table">
       <thead>
           <th>System Name</th>
           <th>Standard Name</th>
           <th>Long Name</th>
           <th>Max Length</th>
       </thead>
        <tbody>
            @foreach($field_details as $field_detail)
                <tr>
                    <td>{{$field_detail->system_name}}</td>
                    <td>{{$field_detail->standard_name}}</td>
                    <td>{{$field_detail->long_name}}</td>
                    <td>{{$field_detail->max_length}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="form-group form-material">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary theme-btn']) }}
    </div>
@else
    <div class="form-group form-material row">
        <div class="col-sm-12">
            {!! Form::label('data', 'data', ['class' => 'control-label required' ])  !!}
            {{ Form::textarea('data', null, [
                   'class'       => 'form-control editor',
                   'placeholder' => 'Sample Data'
               ]) }}
        </div>
    </div>
    <div class="form-group form-material row">
        <div class="">
            <div class="col-sm-6">
                {{ Form::label('file', 'File', ['class' => 'control-label required' ]) }}
                {{ Form::file('file', [
                        'class'=> 'form-control'
                    ]) }}
            </div>
        </div>
    </div>
    <div class="form-group form-material">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary theme-btn']) }}
    </div>
@endif

