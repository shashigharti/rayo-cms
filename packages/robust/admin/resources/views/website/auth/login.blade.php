<div id="modal__login" class="modal">
    <form method="post" id="login--form" data-url="{{route('website.auth.login.post')}}">
        @csrf
        <div class="row modal-header">
            <button type="button" class="modal-close"> <span>×</span> </button>
            <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-content">
            <p class="center-align">To access Advanced MLS Information, login below</p>
            <div class="form-group row">
                <input type="email" class="form-control" name="email" value="" placeholder="E-Mail Address" required="">
            </div>
            <div class="form-group row">
                <input type="password" class="form-control" name="password" value="" placeholder="Password" required="">
            </div>
            <div class="form-group row">
                <input type="checkbox"> Remember Me
            </div>
        </div>
        <div class="modal-footer">
            <a href="" id="register--link" type="text" class="btn btn-default pull-left load-register-form"> Not yet registered ? Register here </a>
            <a href="https://scottingraham.com/user/password/reset" class="pull-left btn btn-default"> Password recovery </a>
            <button type="submit" class="btn btn-primary">
                <div class="loader-01"></div> Login </button>
        </div>
    </form>
</div>