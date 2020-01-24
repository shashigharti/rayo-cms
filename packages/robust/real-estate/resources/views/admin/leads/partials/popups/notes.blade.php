<div class="column-action__notes">
    <a href="#" title="Click to see notes" class='popup-trigger' href='#'>
        <i aria-hidden="true" class="fa fa-sticky-note-o"></i>
        <small>
            <sub>{{ $lead->notes()->count() }}</sub>
        </small>
    </a>
    <ul class='popup-content hide'>
        <div class="info-dialog view-box">
            <div class="box-title">
                {{ $lead->first_name }} {{ $lead->last_name }} (Notes)
                <i class="fa fa-times pull-right clickable"></i>
            </div>
            <div class="box-content">
                <div class="row viewed-lead">
                    @foreach($lead->notes as $note)
                        <div class="col s12">
                            <div class="vw-lead-price">
                                {{  $note->title}} - {{  $note->created_at->format('D, F d, Y') }}
                                <br>
                                {{ $note->created_at->format('g:i A') }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row vw-view-more">
                    <div class="row">
                        <div class="col s6">
                            <a href="#"
                               data-lead="{{$lead->id}}"
                               data-url="{{route('admin.leads.modal')}}"
                               data-type="notes"
                               data-action="{{route('admin.notes.store')}}"
                               data-mode="Edit"
                               data-view="notes"
                               data-value="{{$lead->agent->id ?? ''}}"
                               class="lead-modal_trigger">
                               <i aria-hidden="true" class="fa fa-plus-circle"></i>Add Notes
                            </a>
                        </div>
                        <div class="col s6 right-align">
                            <a href="#">
                                <i aria-hidden="true" class="fa fa-external-link"></i>View More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</div>
