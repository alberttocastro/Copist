@extends('layouts.app')

@section('header')
<ul class="tabs tabs-transparent">
    <li class="tab">
        <a href="#publishers" class="active">Publishers</a>
    </li>
    <li class="tab">
        <a href="#macroregions">Macro Region</a>
    </li>
    <li class="tab">
        <a href="#cards">Cards</a>
    </li>
    <li class="tab">
        <a href="#addresstype">Address Types</a>
    </li>
</ul>
@endsection

@section('main')
@if (\Session::has('message'))
{{\Session::get('message')}}
@endif

<div id="publishers" class="col s12">
    <div id="vue">
        <all-publishers></all-publishers>
    </div>
</div>{{-- END div#publishers --}}
<div id="macroregions" class="col s12">
    <div id="vue2">
        <all-macro-regions></all-macro-regions>
    </div>
</div> {{-- END div#macro-region--}}
<div id="cards" class="col s12">
    <div id="vue3">
        <all-cards></all-cards>
    </div>
</div> {{-- END  div#cards--}}
<div id="addresstype" class="col s12">
    <div id="vue4">
        <all-address-types></all-address-types>
    </div>
</div> {{-- END div#address-types--}}
@endsection