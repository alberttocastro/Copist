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
    <div class="container">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <h4><b>Publishers</b></h4>
            </div>
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <div class="row">
                        @foreach (App\Publisher::all() as $publisher)
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-content">
                                    <h5 style="margin-top: 0;">{{ucwords($publisher->name)}}</h5>
                                    <span><b>Email</b> {{$publisher->email}}</span><br>
                                    <span><b>Phone</b> {{$publisher->phone}}</span><br>
                                    <span><b>Neighborhood</b> {{$publisher->neighborhood}}</span><br>
                                    <span><b>Macro Region</b> {{$publisher->macro_region->name}}</span><br>
                                </div>
                                <div class="card-action">
                                    <a class="blue-text text-darken-4" href="#">Edit</a>
                                    <a class="red-text text-darken-4" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="/" class="btn blue accent-4 waves-effect waves-light col s12 center-align">
                        <span class="valign-wrapper " style="max-width:fit-content; margin: auto;">
                            <i class="material-icons">add_circle_outline</i> Add Publisher
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="macroregions" class="col s12">
    <div class="container">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <h4><b>Macro Regions</b></h4>
            </div>
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <div class="row">
                        @foreach (App\Macro_region::all() as $macro_region)
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-content">
                                    <h5 style="margin-top: 0;">{{ucwords($macro_region->name)}}</h5>
                                </div>
                                <div class="card-action">
                                    <a class="blue-text text-darken-4" href="#">Edit</a>
                                    <a class="red-text text-darken-4" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="/" class="btn blue accent-4 waves-effect waves-light col s12 center-align">
                        <span class="valign-wrapper " style="max-width:fit-content; margin: auto;">
                            <i class="material-icons">add_circle_outline</i> Add Macro Region
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cards" class="col s12">
    <div class="container">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <h4><b>Cards</b></h4>
            </div>
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <div class="row">
                        @foreach (App\Card::all() as $card)
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-content">
                                    <h5 style="margin-top: 0;">{{$card->name}}</h5>
                                </div>
                                <div class="card-action">
                                    <a class="blue-text text-darken-4" href="#">Edit</a>
                                    <a class="red-text text-darken-4" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="/" class="btn blue accent-4 waves-effect waves-light col s12 center-align">
                        <span class="valign-wrapper " style="max-width:fit-content; margin: auto;">
                            <i class="material-icons">add_circle_outline</i> Add Card
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="addresstype" class="col s12">
    <div class="container">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <h4><b>Address Types</b></h4>
            </div>
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <div class="row">
                        @foreach (App\Address_type::all() as $address_type)
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-content">
                                    <h5 style="margin-top: 0;">{{$address_type->name}}</h5>
                                </div>
                                <div class="card-action">
                                    <a class="blue-text text-darken-4" href="#">Edit</a>
                                    <a class="red-text text-darken-4" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="/" class="btn blue accent-4 waves-effect waves-light col s12 center-align">
                        <span class="valign-wrapper " style="max-width:fit-content; margin: auto;">
                            <i class="material-icons">add_circle_outline</i> Add Address Type
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection