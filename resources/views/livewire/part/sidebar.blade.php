<div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
        <li class="{{ (Route::currentRouteName() == 'dashboard' ? 'active' : '') }}">
            <a href="{{ route('dashboard') }}">
                <i class="now-ui-icons design_app"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="{{ (Route::currentRouteName() == 'device' ? 'active' : '') }}">
            <a href="{{ route('device') }}">
                <i class="now-ui-icons tech_mobile"></i>
                <p>Devices</p>
            </a>
        </li>
    </ul>
</div>