@extends('layouts.app')

@section('header')
<ul class="tabs tabs-transparent">
    <li class="tab">
        <a href="#nationalities" class="active">Nationalities</a>
    </li>
    <li class="tab">
        <a href="#idioms">Idioms</a>
    </li>
</ul>
@endsection

@section('main')
<div id="idioms" class="col s12">
    <div id="vue">
        <idioms-view></idioms-view>
    </div>
</div> {{-- End div#idioms --}}
<div id="nationalities" class="col s12">
    <div id="vue2">
        <nationalities-view></nationalities-view>
    </div>
</div> {{-- End - div#nationalities --}}
@endsection
