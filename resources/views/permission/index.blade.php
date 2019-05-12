@extends('layouts.app')

@section('main')
    <div class="container">

        {{-- TODO: Fazer com que ao escolher um usuário, ele não possa ser escolhido novamente --}}

        <form action="{{route('update_permission')}}" method="post">
            <input type="hidden" name="_method" value="put" />
            {{ csrf_field()}}
            {{-- <%# Iteração sobre todos os usuários. Relaciona-os com os seus devidos publicadores %> --}}
            <div class="row">
            @foreach(App\User::all() as $user)
                <div class="col s12 m12">
                    <div class="card white z-depth-3">
                        <div class="card-content black-text">
                            <span class="card-title">{{$user->email}}</span>
                            <div>
                                @if($user->publisher_id == 0 )
                                    <select name="{{$user->id}}" id="{{$user->id}}">
                                        <option value="0" selected>Access denied</option>
                                        @foreach(App\Publisher::without_user() as $publisher)
                                            <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <select name="{{$user->id}}" id="{{$user->id}}">
                                        <option value="0">Access denied</option>
                                        @foreach(App\Publisher::without_user($user->publisher_id) as $publisher)
                                            @if ($user->publisher_id == $publisher->id)
                                                <option value="{{$publisher->id}}" selected>{{$publisher->name}}</option>
                                            @else
                                                <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @endif
                                </br>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

            {{-- <%# Botão para enviar as modificações %> --}}
            <div class="fixed-action-btn">
                <button type="submit" method="put" class="btn-floating btn-large purple darken-2">
                    <i class="material-icons Large">send</i>
                </button>
            </div>

        </form>
    </div>
@endsection