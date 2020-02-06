<div id="noteModal" class="modal">
    <form method="post" action="" data-url="{{route('website.realestate.leads.notes')}}">
        @csrf
        <div class="row modal-header">
            <button type="button" class="modal-close"> <span>×</span> </button>
            <h4 class="modal-title">Add Note to Listing</h4>
        </div>
        <div class="modal-content">
            <div class="form-group row">
                <textarea type="text" name="note"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit </button>
        </div>
    </form>
</div>
