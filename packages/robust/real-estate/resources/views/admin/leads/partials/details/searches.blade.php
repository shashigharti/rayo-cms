
<div class="row">
    @include("real-estate::admin.leads.partials.details.overview-info")
    <div class="col s9">
        <div class="panel card">
            <div class="col s12">
                <div class="row">
                    <div class="col s12">
                       <h5>Searches</h5>
                    </div>
                </div>
            </div>

            @foreach($model->searches as $search)
                <div class="col s12">
                <div class="row">
                    <div class="col s12">
                        <p><strong>{{$model->first_name}}</strong> saved a search <strong>{{$search->name}} search</strong> with frequency {{$search->frequency}} and following criteria:</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 tag-block">
                        @set('contents',json_decode($search->content,true))
                        @foreach($contents as $key => $content)
                            @if($content)
                                <div class="chip">
                                  {{config('rws.advance-search.' . $key .'.display_name') ?? $key}} : {{is_array($content) ?  implode(',',$content) : $content}}
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col s12">
                        <p>{{$search->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col s12 right-align">
                        <a href="#search" class="btn btn-small amber">
                          Delete
                        </a>
                        <a href="#search" class="btn btn-small cyan">
                          Edit
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
