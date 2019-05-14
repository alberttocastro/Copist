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
    <div class="container">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <h4><b>Publishers</b></h4>
            </div>
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <div class="row">
                        @foreach (App\Idiom::all() as $idiom)
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-content">
                                    <h5 style="margin-top: 0;">{{$idiom->name}}</h5>
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
                            <i class="material-icons">add_circle_outline</i> Add Idiom
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="nationalities" class="col s12">
    <div class="container">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <h4><b>Publishers</b></h4>
            </div>
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <div class="row">
                        @foreach (App\Nationlity::all() as $nationlity)
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-content">
                                    <h5 style="margin-top: 0;">{{$nationlity->name}}</h5>
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
                            <i class="material-icons">add_circle_outline</i> Add Nationality
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection