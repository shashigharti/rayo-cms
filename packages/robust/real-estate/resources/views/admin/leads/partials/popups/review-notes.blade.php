<div>
    <a href="{{route('admin.leads.review',['id'=>$lead->id])}}" target="_blank">Lead Review</a>
</div>
<div>
    <a href="#"
       data-lead="{{$lead->id}}"
       data-url="{{route('admin.leads.modal')}}"
       data-type="notes"
       data-action="{{route('admin.notes.store')}}"
       data-mode="Edit"
       data-view="notes"
       data-value="{{$lead->agent->id ?? ''}}"
       class="lead-modal_trigger">+ Add Notes</a>
</div>
