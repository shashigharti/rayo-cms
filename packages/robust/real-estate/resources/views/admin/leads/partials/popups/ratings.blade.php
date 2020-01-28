<div class="column-action__ratings">
    <a href="#" title="Click to see calls detail" class='popup-trigger'>
        <i aria-hidden="true" class="fa fa-star-o"></i>
        <small>
            <sub>{{ $lead->ratings->count() }}</sub>
        </small>
    </a>
    <ul class='popup-content hide'>
        <div class="info-dialog view-box">
            <div class="box-title">
                {{ $lead->first_name }} {{ $lead->last_name }} - Ratings
                <i class="fa fa-times pull-right clickable"></i>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col s8">
                        <div>
                             @foreach(range(1,5) as $id)
                                 <a href="#" class="RatingForm" data-id="{{$id}}" data-lead="{{$lead->id}}"><i aria-hidden="true" class="fa fa-star-o"></i> </a>
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</div>
