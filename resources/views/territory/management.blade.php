@extends('layouts.app')

@section('header')
<ul class="tabs tabs-transparent">
    <li class="tab">
        <a href="#new" class="active">New</a>
    </li>
    <li class="tab">
        <a href="#manage">Manage</a>
    </li>
</ul>
@endsection

@section('main')
@if (\Session::has('message'))
<p>{{\Session::get('message')}}</p>
@endif
<!-- Aba de aceitar endereços novos -->
<div id="new">
    <div id="vue3">
        <territory-suggestion></territory-suggestion>
    </div>

    @yield('accept_addres', view('territory.modal.accept_address'))
</div> <!-- <div id="new"> -->

<!-- Aba para escolher o mapa dos endereços -->
<div id="manage">
    <div class="container">

        @if (App\Address::all()->where('card_id', 0)->count() > 0)
        <blockquote>
            <h4>Address without a map</h4>
        </blockquote>
        @endif

        <!-- Cartão de novo território -->
        @forelse(App\Address::where('card_id', 0)->get() as $address)
        <div class="row">
            <div class="col s12 m6">
                <div class="card grey lighten-5 z-depth-2">
                    <div class="card-content indigo-text text-darken-4">
                        <p>
                            <b>Street:</b> <span>{{ $address->street }}</span>
                        </p>
                        <p>
                            <b>Neighborhood:</b> <span>{{ $address->neighborhood }}</span>
                        </p>
                        @if($address->references != "")
                        <p>
                            <b>Reference:</b> <span>{{ $address->reference }}</span>
                        </p>
                        @endif
                        @if($address->comments != "")
                        <p>
                            <b>Comments:</b> <span> {{$address->comments}} </span>
                        </p>
                        @endif
                    </div>
                    <div class="card-action">
                        <a id="{{$address->id}}" href="#choose-map"
                            class="modal-trigger add-card-to-address-button">Choose card</a>
                    </div>
                </div>
            </div>
        </div>
        @empty

        <div class="valign-wrapper">
            <div style="width: 100%">
                <h2 class="center-align">Nice!</h2>
                <h5 class="center-align">All addresses have their own map.</h5>
                <p class="center-align">That's beautiful!</p>
            </div>
        </div>

        @endforelse

        <form action="{{route('set_map_to_address')}}" method="post">
            @method('put')
            @csrf
            <!-- Modal - Escolher mapa -->
            <div id="choose-map" class="modal">
                <!-- Conteúdo -->
                <div class="modal-content">
                    <input type="hidden" id="address_id" name="address_id">
                    <h4>Choose map</h4> <br>
                    <div class="input-field col s12">
                        <select name="card_id" id="card_id">
                            @foreach (App\Card::all() as $card)
                            <option value="{{$card->id}}">{{$card->name}} - {{$card->number}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Footer -->
                <div class="modal-footer">
                    <input type="submit" value="Confirm" class="modal-close waves-effect waves-green btn-flat">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection