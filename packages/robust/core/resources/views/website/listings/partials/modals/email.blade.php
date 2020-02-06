<div id="emailModal" class="modal listing--modal">
    <form method="post" id="email-form" action="" data-url="{{route('website.realestate.leads.email.friend',['slug' => $result->slug])}}">
        @csrf
        <div class="row modal-header">
            <button type="button" class="modal-close"> <span>×</span> </button>
            <h4 class="modal-title">Show {{$result->listing_name}} To A Friend</h4>
        </div>
        <div class="modal-content">
            <div class="form-group row">
                <label>Send To Email:</label>
                <input type="email" name="email_to" class="form-control" value="" placeholder="" required="">
            </div>
            <div class="form-group row">
                <label>Subject:</label>
                <p>Check out this interesting property</p>
            </div>
            <div class="form-group row">
                <label>Message:</label>
                <p>I found a property at {{$result->listing_name}} . Asking Price {{$result->system_price}}$</p>
                <div class="email-modal-image">
                    <img src="{{$image ? $image->url :  ''}}" alt="">
                </div>
            </div>
            <div class="form-group row">
                <textarea  name="message" class="form-control" placeholder="Type your message here" required=""></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> <div class="loader-01"></div> Submit </button>
        </div>
    </form>
</div>
