<ul id="nav-mobile" class="right hide-on-med-and-down">
    <li>
        <a href="/">My Assignments</a>
    </li>
    <li>
        <a href="{{route('overview')}}">Overview</a>
    </li>
    <li>
        <a href="{{route('help')}}">Help</a>
    </li>
    @can('is_user_admin')
    <li>
        <a class="dropdown-trigger" href="#!" data-target="admin-dropdown">Administration<i
                class="material-icons right">arrow_drop_down</i></a>
    </li>
    @endcan
    <li class="valign-wrapper">
        <a href="#!" class="dropdown-trigger" data-target="user"><span class="material-icons">account_circle</span><span
                class="material-icons">arrow_drop_down</span>
        </a>
    </li>
</ul>

<ul id="user" class="dropdown-content">
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
@can('is_user_admin')
<ul id="admin-dropdown" class="dropdown-content">
    <li>
        <a href="{{route('assignments')}}">Assignments</a>
    </li>
    <li>
        <a href="{{route('territory_management')}}">Management</a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="{{route('permissions')}}">Permissions</a>
    </li>
    <li class="divider">DB</li>
    <li>
        <a href="{{route('db_service')}}">Database - Service</a>
    </li>
    <li>
        <a href="{{route('db_public')}}">Database - Public</a>
    </li>
</ul>
@endcan