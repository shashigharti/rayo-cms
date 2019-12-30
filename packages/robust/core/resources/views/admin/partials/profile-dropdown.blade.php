<a data-toggle="dropdown" href="#" class="dropdown-toggle">
    <img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="{{Auth::user()->name}}'s Photo"/>
								<span class="user-info">
									<small>Welcome,</small>
                                    {{Auth::user()->name}}
								</span>

    <i class="ace-icon fa fa-caret-down"></i>
</a>
<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
    <li>
        <a href="#">
            <i class="ace-icon fa fa-cog"></i>
            Settings
        </a>
    </li>
    <li>
        <a href="profile.html">
            <i class="ace-icon fa fa-user"></i>
            Profile
        </a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="{{ url('/logout') }}">
            <i class="ace-icon fa fa-power-off"></i>
            Logout
        </a>
    </li>
</ul>