<div class="form-group form-material row">
    <div class="">
        <div class="col-sm-6">
            {{ Form::label('status', 'Status', ['class' => 'control-label required' ]) }}
            {{ Form::select('status', ['0' => 'Inactive','1' => 'Active'],$status, [
                    'class'       => 'form-control',
                    'required'    => 'required'
                ]) }}
        </div>
    </div>
</div>
@if(!empty($samples))
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mlsmodal">
        View Sample Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="mlsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div >
                        <table class="table">
                            <thead>
                            <th>Mls Id</th>
                            <th>Sample 1</th>
                            <th>Sample 2</th>
                            <th>Sample 3</th>
                            </thead>
                            <tbody>
                            @foreach($samples as $key =>$sample)
                                <tr>
                                    <td>{{$key}}</td>
                                    @foreach($sample as $data)
                                        <td>{{$data}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="form-group form-material">
    {{Form::label('field','Fields',['class' => 'control-label'])}}
    @forelse($fields as $field => $value)
        <div class="row">
            <div class="">
                <div class="col-sm-3">
                    {{ Form::text('field['.$field.']', $field, [
                             'class'=> 'form-control',
                             'disabled' => 'disabled'
                     ])}}
                </div>
            </div>
            <div class="">
                <div class="col-sm-3">
                    {{ Form::select('value['.$field.']', $mls_keys,$value,[
                             'class'=> 'form-control'
                     ])}}
                </div>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-danger remove-field">Remove</button>
            </div>
        </div>
    @empty
    @endforelse
</div>
<div class="form-group form-material row">
    {{ Form::label('other', 'Additional', ['class' => 'control-label required' ]) }}
    @if(is_array($others) && !empty($others))
        @foreach($others as $other)
            <div class="">
                <div class="col-sm-6">
                    {{ Form::text('other',$other , [
                            'class'=> 'form-control',
                            'disabled' => 'disabled'
                        ]) }}
                </div>
            </div>
            <div class="">
                <div class="col-sm-6">
                    {{ Form::text('additional[' .$other.']', isset($additional[$other]) ? $additional[$other] : null, [
                            'class'=> 'form-control'
                        ]) }}
                </div>
            </div>
        @endforeach
    @endif
</div>
