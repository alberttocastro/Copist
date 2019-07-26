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
    <div id="vue4">
        <choose-address-card></choose-address-card>
    </div>
</div>
@endsection