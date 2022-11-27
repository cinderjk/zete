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
    </ul>
</div>