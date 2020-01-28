<div>
    <a href="#" class='popup-trigger'>Lead Review</a>
</div>
<div>
    <a href="#"
       data-lead="{{$lead->id}}"
       data-url="{{route('admin.leads.modal')}}"
       data-type="notes"
       data-action="{{route('admin.notes.store')}}"
       data-mode="Edit"
       data-view="notes"
       data-value=""
       class="lead-modal_trigger">+ Add Notes</a>
</div>