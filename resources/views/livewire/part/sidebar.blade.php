<div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
        <li class="{{ (Route::currentRouteName() == 'dashboard' ? 'active' : '') }}">
            <a href="{{ route('dashboard') }}">
                <i class="now-ui-icons design_app"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="{{ in_array(Route::currentRouteName(), ['device', 'add-device']) ? 'active' : '' }}">
            <a href="{{ route('device') }}">
                <i class="now-ui-icons tech_mobile"></i>
                <p>Devices</p>
            </a>
        </li>
        <li class="{{ in_array(Route::currentRouteName(), ['message', 'add-message']) ? 'active' : '' }}">
            <a href="{{ route('message') }}">
                <i class="now-ui-icons ui-2_chat-round"></i>
                <p>Messages</p>
            </a>
        </li>
        <li
            class="{{ in_array(Route::currentRouteName(), ['contact', 'add-contact', 'edit-contact', 'group']) ? 'active' : '' }}">
            <a data-toggle="collapse" href="#contacts">
                <i class="now-ui-icons business_badge"></i>
                <p>
                    Contacts <b class="caret"></b>
                </p>
            </a>
            <div class="collapse {{ in_array(Route::currentRouteName(), ['contact', 'add-contact', 'edit-contact', 'group']) ? 'show' : '' }} "
                id="contacts">
                <ul class="nav">
                    <li
                        class="{{ in_array(Route::currentRouteName(), ['contact', 'add-contact', 'edit-contact']) ? 'active' : '' }}">
                        <a href="{{ route('contact') }}">
                            <span class="sidebar-mini-icon">L</span>
                            <span class="sidebar-normal"> List </span>
                        </a>
                    </li>
                    <li class="{{ in_array(Route::currentRouteName(), ['group']) ? 'active' : '' }}">
                        <a href="{{ route('group') }}">
                            <span class="sidebar-mini-icon">G</span>
                            <span class="sidebar-normal"> Groups </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="{{ in_array(Route::currentRouteName(), ['docs']) ? 'active' : '' }}">
            <a href="{{ route('docs') }}">
                <i class="now-ui-icons education_agenda-bookmark"></i>
                <p>Docs</p>
            </a>
        </li>
    </ul>
</div>