<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view" style="padding-top: 4vh; min-height: 104px; background-color: #303f9f">

            <div style="line-height: 1rem">
                <span class="white-text" style="font-size: x-large">
                    @if(Auth::user()->publisher != null)
                    <b>{{Auth::user()->publisher->name}}</b>
                    @endif
                </span> <br>
                <span class="white-text" >
                    ({{Auth::user()->name}})
                </span>
            </div>
            <div style="line-height: 2rem; margin-top: 2vh">
                <span class="white-text">
                    <b>{{Auth::user()->email}}</b>
                </span>
            </div>
        </div>
    </li>
    <li>
        <a href="/"> <i class="material-icons left">home</i> Home </a>
    </li>
    <li>
        <a href="{{route('overview')}}"><i class="material-icons left">show_chart</i> Overview </a>
    </li>
    <li>
        <a href="{{route('help')}}"><i class="material-icons left">help</i> Help </a>
    </li>
    @can('is_user_admin')
    <div class="divider"></div>
    <li>
        <a href="{{route('assignments')}}"><i class="material-icons left">assignment</i>Assign </a>
    </li>
    <li>
        <a href="{{route('territory_management')}}"><i class="material-icons left">person_add</i> Management </a>
    </li>
    <li>
        <a href="{{route('permissions')}}"><i class="material-icons left">lock_open</i> Permissions </a>
    </li>

    <div class="divider"></div>
    <li>
        <a href="{{route('db_service')}}"><i class="material-icons left">dvr</i> Database - Service </a>
    </li>
    <li>
        <a href="{{route('db_public')}}"><i class="material-icons left">dvr</i> Database - Public </a>
    </li>
    @endcan
    <div class="divider"></div>
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons left">exit_to_app</i>{{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
