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
                <h4><b>Idioms</b></h4>
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
                    <a href="#create-idiom"
                        class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger">
                        <span class="valign-wrapper " style="max-width:fit-content; margin: auto;">
                            <i class="material-icons">add_circle_outline</i> Add Idiom
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="create-idiom" class="modal">
        <form action="{{route('create_idiom')}}" method="post">
            @csrf
            <div class="modal-content">
                <label for="idiom">Idiom name</label>
                <input type="text" name="idiom" id="idiom">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-flat modal-close green-text">Create idiom</button>
            </div>
        </form>
    </div>
</div> {{-- End div#idioms --}}
<div id="nationalities" class="col s12">
    <div class="container">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <h4><b>Nationalities</b></h4>
            </div>
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <div class="row">
                        @foreach (App\Nationality::all() as $nationlity)
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
                    <a href="#create-nationality"
                        class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger">
                        <span class="valign-wrapper " style="max-width:fit-content; margin: auto;">
                            <i class="material-icons">add_circle_outline</i> Add Nationality
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="create-nationality" class="modal bottom-sheet">
        <form action="{{route('create_nationality')}}" method="post">
            @csrf
            <div class="modal-content">
                <label for="nationality">Nationality name</label>
                <input type="text" name="nationality" id="nationlity">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-flat green-text">Create Nationality</button>
            </div>
        </form>
    </div>
</div> {{-- End - div#nationalities --}}
@endsection
