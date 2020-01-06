<a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown">
    <span class="avatar-status avatar-online">
                                    <img src="{{ getAvatar() }}" alt="avatar">
                                </span>
</a>
<!-- profile-dropdown-->
<ul class="dropdown-content" id="profile-dropdown">
    <li>
        <a class="grey-text text-darken-1" href="user-profile-page.html">
            <i class="material-icons">person_outline</i> Profile
        </a>
    </li>
    <li>
    <a class="grey-text text-darken-1" href="{{route('admin.settings.edit', 'general-setting')}}">
            <i class="material-icons">settings</i> Settings
        </a>
    </li>
    <li>
        <a class="grey-text text-darken-1" href="user-login.html">
            <i class="material-icons">keyboard_tab</i> Logout
        </a>
    </li>
</ul>