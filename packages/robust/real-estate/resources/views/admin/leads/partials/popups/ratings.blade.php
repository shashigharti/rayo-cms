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
                <div class="row viewed-lead">
                    <div class="col s8">
                        <div>
                            <i aria-hidden="true" class="fa fa-star-o"></i>
                            <i aria-hidden="true" class="fa fa-star-o"></i>
                            <i aria-hidden="true" class="fa fa-star-o"></i>
                            <i aria-hidden="true" class="fa fa-star-o"></i>
                            <i aria-hidden="true" class="fa fa-star-o"></i>
                        </div>
                        <div>
                            No Rating Given
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</div>
