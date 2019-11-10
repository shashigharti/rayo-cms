<h3 class="title-more-detail" id="my-info">My info</h3>

<div class="row">
    <div class="col-md-6">
        <div class="profile-inner">

            <h3 class="title-detail info-form"> Personal info</h3>
            <form class="form-horizontal" action="" method="POST">

                <div class="form-group">
                    <label for="txtuser" class="col-sm-3 control-label">Firstname</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtname" placeholder="firstname"
                               name="firstname" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtuser" class="col-sm-3 control-label">Lastname</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtname" placeholder="lastname"
                               name="lastname" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail" name="email"
                               placeholder="email" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPhone" name="phone"
                               placeholder="phone #"
                               value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9" style="padding-left:28px">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="profile-inner">
            <h3 class="title-detail info-form">Change password</h3>
            <form class="form-horizontal" action="" method="POST">

                <div class="form-group">
                    <label for="inputPassword" class="col-sm-3 control-label">Old Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="old_password" name="old_password"
                               placeholder="" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-3 control-label">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="new_password" name="new_password"
                               placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Confirm New Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="confirm_password"
                               name="confirm_password" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9" style="padding-left:28px">
                        <button type="submit" class="btn btn-success">Save Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
