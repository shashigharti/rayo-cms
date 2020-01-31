<div class="row">
    @include("real-estate::admin.leads.partials.details.overview-info")
    <div class="col s9">
        <div class="panel card">
            <div class="col s12">
                <div class="row">
                    <div class="col s12">
                       <h5>Bookmarks</h5>
                    </div>
                </div>
            </div>

            <div class="col s12">
                @foreach($model->bookmarks as $bookmark)
                    <div class="bookmark--single box-content">
                        <div class="mt-2 mb-2">
                            <div class="mb-2 fs09">
                                 <strong>{{ $model->first_name.' '.$model->last_name }}</strong> bookmarked
                                 <a href="{{$bookmark->url}}" target="_blank">{{ $bookmark->title }}
                                     <i data-v-13ad319a="" aria-hidden="true" class="fa fa-external-link"></i>
                                 </a>.
                            </div>
                            <div class="time-info">
                                <time data-v-13ad319a="" title="{{$bookmark->created_at}}">{{$bookmark->created_at->diffForHumans()}}</time>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
