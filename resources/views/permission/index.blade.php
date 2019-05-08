@extends('application.layout')

@section('header')
    
@endsection

@section('main')
    <div class="container">

        <form action="/" method="put">

            {{-- <%# Iteração sobre todos os usuários. Relaciona-os com os seus devidos publicadores %> --}}
            <div class="row">
            @foreach(App\User::all() as $user)
                <div class="col s12 m12">
                    <div class="card white z-depth-3">
                        <div class="card-content black-text">
                            <span class="card-title">{{$user->email}}</span>
                            <div>
                                @if($user->publisher_id == 0 )
                                    <select name="publisher_{{$user->id}}" id="publisher_{{$user->id}}">
                                        <option value="">Select a user</option>
                                        @foreach(App\Publisher::without_user() as $publisher)
                                            <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <select name="publisher_{{$user->id}}" id="publisher_{{$user->id}}">
                                        @forelse(App\Publisher::without_user($user->publisher_id) as $publisher)
                                            @if ($user->publisher_id == $publisher->id)
                                                <option value="{{$publisher->id}}" selected>{{$publisher->name}}</option>
                                            @else
                                                <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                            @endif
                                        @empty
                                            <option value="">Select a publisher</option>
                                        @endforelse
                                    </select>
                                @endif
                                </br>
                            </div>
                            <div class="right-align">
                                <a href="/{id}" method="delete">REMOVE</a>
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