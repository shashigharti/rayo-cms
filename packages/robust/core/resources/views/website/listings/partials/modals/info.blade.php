<div id="infoModal" class="modal">
    <form method="post" id="info-form" action="" data-url="{{route('website.realestate.leads.email.agent',['slug'=>$result->slug])}}">
        @csrf
        <div class="row modal-header">
            <button type="button" class="modal-close"> <span>×</span> </button>
            <h4 class="modal-title">Show {{$result->listing_name}} To A Agent</h4>
        </div>
        <input type="text" hidden value="{{$result->id}}" name="listing_id">
        <div class="modal-content">
            <div class="form-group row">
                <label>Subject:</label>
                <p>Send me more info about this listing</p>
            </div>
            <div class="form-group row">
                <label>Message:</label>
                <p>Please send me more info about {{$result->listing_name}} . Asking Price {{$result->system_price}}$</p>
            </div>
            <div class="email-modal-image">
                <img src="{{$image ? $image->url :  ''}}" alt="">
            </div>
            <div class="form-group row">
                <textarea  name="message" row="10" class="form-control" placeholder="Comments or Questions" required=""></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> <div class="loader-01"></div> Submit </button>
        </div>
    </form>
</div>
