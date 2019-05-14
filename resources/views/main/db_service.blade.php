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
<div id="publishers" class="col s12">
    <div class="row">
        <div class="col s6 offset-s3">
            <h4>Publishers</h4>
        </div>
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <div class="row">
                    @foreach (App\Publisher::all() as $publisher)
                    <div class="col s12 m6">
                        <div class="card-panel">
                            <h5 style="margin-top: 0;">{{ucwords($publisher->name)}}</h5>
                            <span><b>Email</b> {{$publisher->email}}</span><br>
                            <span><b>Phone</b> {{$publisher->phone}}</span><br>
                            <span><b>Neighborhood</b> {{$publisher->neighborhood}}</span><br>
                            <span><b>Macro Region</b> {{$publisher->macro_region->name}}</span><br>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div id="macroregions" class="col s12">
    4
</div>
<div id="cards" class="col s12">
    5
</div>
<div id="addresstype" class="col s12">
    6
</div>
@endsection