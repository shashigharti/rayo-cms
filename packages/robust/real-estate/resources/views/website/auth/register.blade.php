<div id="modal__register" class="modal">
    <form method="post" id="register--form" action="" data-url="{{route('website.realestate.leads.register')}}">
        @csrf
        <div class="row modal-header">
            <button type="button" class="modal-close"> <span>×</span> </button>
            <h4 class="modal-title">To Continue..</h4>
        </div>
        <div class="modal-content">
            <p class="center-align">To access Advanced MLS Information, you must enter your info below</p>
            <div class="form-group row">
                <input type="text" name="firstname" class="form-control" value="" placeholder="First Name" required="">
            </div>
            <div class="form-group row">
                <input type="text" name="lastname" class="form-control" value="" placeholder="Last Name" required="">
            </div>
            <div class="form-group row">
                <input type="email" name="email" class="form-control" value="" placeholder="Email" required="">
            </div>
            <div class="form-group row">
                <input type="password" name="password" class="form-control" value="" placeholder="Password" required="">
            </div>
            <p class="agree-to-terms">By registering on our site you agree to the website terms.We protect your personal privacy and email security. View our <a href="">privacy policy</a>
            </p>
        </div>
        <div class="modal-footer">
            <a href="" id="login--link" type="text" class="btn btn-default pull-left load-register-form"> Already a member ? Login </a>
            <button type="submit" class="btn btn-primary">
                <div class="loader-01"></div> Register </button>
        </div>
    </form>
</div>