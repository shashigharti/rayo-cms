<h3 class="title-more-detail" id="my-info">My info</h3>
<div>
   <div class="col-md-6">
      <div class="profile-inner">
         <div class="row">
            <h3 class="title-detail info-form"> Personal info</h3>
         </div>
         <form action="{{route('website.realestate.profile.update')}}" method="POST">
             @csrf
            <div class="form-group row">
               <label for="txtuser" class=" control-label">Firstname</label>
               <input type="text" class="form-control" placeholder="firstname"
                     name="firstname" value="{{$lead->firstname ?? ''}}">
            </div>
            <div class="form-group row">
               <label for="txtuser" class="control-label">Lastname</label>
                <input type="text" class="form-control" placeholder="lastname"
                     name="lastname" value="{{$lead->lastname}}">
            </div>
            <div class="form-group row">
               <label for="inputEmail" class="control-label">Email</label>
               <input type="email" class="form-control" name="email"
                     placeholder="email" value="{{$lead->email}}">
            </div>
            <div class="form-group row">
               <label for="inputEmail" class="control-label">Phone</label>
               <input type="text" class="form-control" name="phone_number"
                     placeholder=""
                     value="{{$lead->phone_number ?? ''}}">
            </div>
            <div class="form-group row">
               <label></label>
               <div>
                  <button type="submit" class="btn btn-xs btn-theme">Save</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="col-md-6">
      <div class="profile-inner">
         <div class="row">
            <h3 class="title-detail info-form">Change password</h3>
         </div>
         <form class="form-horizontal" action="" method="POST">
            <div class="form-group row">
               <label for="inputPassword" class="control-label">Old Password</label>
               <input type="password" class="form-control" name="old_password"
                     placeholder="" value="">
            </div>
            <div class="form-group row">
               <label for="inputPassword2" class="col-sm-3 control-label">New Password</label>
               <input type="password" class="form-control" name="new_password"
                     placeholder="">
            </div>
            <div class="form-group row">
               <label for="inputPassword3" class="col-sm-3 control-label">Confirm New Password</label>
               <input type="password" class="form-control" name="confirm_password"
                     placeholder="">
            </div>
            <div class="form-group row">
               <label></label>
               <div>
                  <button type="submit" class="btn btn-xs btn-theme">Save Password</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
