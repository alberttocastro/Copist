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
    <li class="divider"></li>
    {{-- TODO: link para database --}}
    <li>
        <a href="/">Database</a>
    </li>
</ul>
@endcan