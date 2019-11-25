 <nav class="navbar navbar-expand-lg navbar-light">
    <a href="#"><img src="assets/website/images/Logo.jpg" alt="logo"></a>
    <a href="#" data-target="mobile-demo" class="mobile-menu-btn"><i class="fa fa-bars"></i></a>
    <ul id="mobile-demo" class="dropdown-content">
        <li><a class="nav-link" href="#">Home</a></li>
        <li><a class="nav-link" href="#">Areas</a></li>
        <li><a class="nav-link" href="{{route('website.realestate.homes-for-sale')}}">Homes For Sale</a></li>
        <li><a class="nav-link" href="{{route('website.realestate.sold-homes')}}">Sold Homes</a></li>
        <li><a class="nav-link" href="{{route('website.realestate.market.reports', ['type' => 'cities'])}}">Market Stats</a></li>
        <li><a class="nav-link" href="#">Login</a></li>
        <li><a class="nav-link" href="#">Register</a></li>
    </ul>
    <ul class="right hide-on-med-and-down">
        <li><a class="nav-link" href="#">Home</a></li>
        <li><a class="nav-link" href="#">Areas</a></li>
        <li><a class="nav-link" href="#">Homes For Sale</a></li>
        <li><a class="nav-link" href="#">Sold Homes</a></li>
        <li><a class="nav-link" href="{{route('website.realestate.market.reports', ['type' => 'cities'])}}">Market Stats</a></li>
        <li class="nav-btn">
            <a class="nav-link waves-effect waves-light modal-trigger" href="#loginmodal">Login</a>
            <div id="loginmodal" class="modal">
                <div class="row modal-header">
                    <button type="button" class="modal-close"> <span>×</span> </button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-content">
                    <p class="center-align">To access Advanced MLS Information, login below</p>
                    <div class="form-group row">
                        <input id="email" type="email" class="form-control" name="email" value="" placeholder="E-Mail Address" required="">
                    </div>
                    <div class="form-group row">
                        <input type="password" class="form-control" name="email" value="" placeholder="Password" required="">
                    </div>
                    <div class="form-group row">
                        <input type="checkbox">
                            Remember Me
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" type="text" class="btn btn-default pull-left load-register-form"> Not yet registered ? Register here </a>
                    <a href="https://scottingraham.com/user/password/reset" class="pull-left btn btn-default"> Password recovery </a>
                    <button type="submit" class="btn btn-primary"> <div class="loader-01"></div> Login </button>
                </div>
            </div>
        </li>
        <li class="nav-btn">
            <a class="nav-link waves-effect waves-light modal-trigger" href="#registermodal">Register</a>
                <div id="registermodal" class="modal">
                    <div class="row modal-header">
                        <button type="button" class="modal-close"> <span>×</span> </button>
                        <h4 class="modal-title">To Continue..</h4>
                    </div>
                    <div class="modal-content">
                        <p class="center-align">To access Advanced MLS Information, you must enter your info below</p>
                        <div class="form-group row">
                            <input type="text" class="form-control" value="" placeholder="First Name" required="">
                        </div>
                        <div class="form-group row">
                            <input type="text" class="form-control" value="" placeholder="Last Name" required="">
                        </div>
                        <p class="agree-to-terms">By registering on our site you agree to the website terms.We protect your personal privacy and email security. View our <a href="">privacy policy</a>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a href="" type="text" class="btn btn-default pull-left load-register-form"> Already a member ? Login </a>

                        <button type="submit" class="btn btn-primary"> <div class="loader-01"></div> Register </button>
                    </div>
                </div>
        </li>
    </ul>
</nav>
