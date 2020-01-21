@set('properties',$model->properties()->whereIn('type',['min_price','max_price','median_price','avg_price','note'])->get()->pluck('value','type')->toArray())
<div class="row">
    <div class="col s12">
        <h5> Price
            <a href="#edit-price" class="modal-trigger">
                <i class="material-icons right">edit</i>
            </a>
            <div id="edit-price" class="modal">
                <div class="modal-content">
                    <form action="{{route('admin.leads.properties.update.price',['id' => $model->id])}}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <span>Edit Prices</span>
                            <a href="#!" class="modal-action modal-close right ">
                                <i class="material-icons">clear</i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        {{ Form::text('min_price', $properties['min_price'] ?? '')}}
                                        {{ Form::label('min_price', 'Min Price', ['class' => 'required' ]) }}
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        {{ Form::text('max_price', $properties['max_price'] ?? '')}}
                                        {{ Form::label('max_price', 'Max Price', ['class' => 'required' ]) }}
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        {{ Form::text('median_price', $properties['median_price'] ?? '')}}
                                        {{ Form::label('median_price', 'Median Price', ['class' => 'required' ]) }}
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        {{ Form::text('avg_price', $properties['avg_price'] ?? '')}}
                                        {{ Form::label('avg_price', 'Average Price', ['class' => 'required' ]) }}
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="input-field">
                                        {{ Form::textarea('note', $properties['note'] ?? '')}}
                                        {{ Form::label('note', 'Note', ['class' => 'required' ]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input href="#" class=" btn theme-btn" type="submit"></input>
                        </div>
                    </form>
                </div>
            </div>
        </h5>
        <div class="mt-7">
            <p>MEDIAN PRICE: <span class="right">{{$properties['median_price'] ?? '-'}}</span></p>
            <p>AVERAGE PRICE: <span class="right">{{$properties['avg_price'] ?? '-'}}</span></p>
            <p>NOTE: <span class="right">{{$properties['note'] ?? '-'}}</span></p>
        </div>
    </div>
</div>
