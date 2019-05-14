<ul id="slide-out" class="sidenav">
        <li><div class="user-view">
            <div class="background">
                <img src="http://via.placeholder.com/300x100">
            </div>
            <?php // TODO: Colocar dados do usuário dinamicamente ?>
            <a href="#name"><span class="white-text name">John Doe</span></a>
            <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div></li>
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
        {{-- TODO: link para banco de dados --}}
        <li>
            <a href="/"><i class="material-icons left">dvr</i> Database </a>
        </li>
        @endcan
        <div class="divider"></div>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons left">exit_to_app</i>{{ __('Logout') }}
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
            </form>
        </li>
    </ul>