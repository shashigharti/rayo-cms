@set('activities',$activity_helper->getAll($model->user->id))
<div class="row">
    @include("real-estate::admin.leads.partials.details.overview-info")
    <div class="col s9">
        <div class="panel card">
            <div class="col s12">
                <div class="row">
                    <div class="col s12">
                        <h5>Distance/Drive</h5>
                    </div>
                </div>
            </div>

            <div class="col s12">
                @foreach($activities as $activity)
                    <div class="bookmark--single box-content">
                        <div class="mt-2 mb-2">
                            <div class="mb-2 fs09">
                                <strong>{{ $model->first_name.' '.$model->last_name }}</strong> {{$activity->title}}
                                @if($activity->url)
                                    in page
                                    <a href="{{$activity->url}}" target="_blank">Visit
                                        <i data-v-13ad319a="" aria-hidden="true" class="fa fa-external-link"></i>
                                    </a>
                                @endif
                                @if($activity->description)
                                    <p>Description : {{$activity->description}}</p>
                                @endif
                            </div>
                            <div class="time-info">
                                <time data-v-13ad319a="" title="{{$activity->created_at}}">{{$activity->created_at->diffForHumans()}}</time>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
