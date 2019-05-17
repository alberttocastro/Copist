@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row">
        <form action="{{route('update_territory', ['id'=> $address->id])}}" method="post" class="col s12">
            @csrf
            @method('put')
            <div class="row">
                <div class="input-field s12">
                    <label for="neighborhood">Neighborhood</label>
                    <input type="text" name="neighborhood" id="neighborhood" value="{{$address->neighborhood}}">
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    <label for="street">Street</label>
                    <input type="text" name="street" id="street" value="{{$address->street}}">
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$address->name}}">
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    <label for="comments">Comments</label>
                    <input type="text" name="comments" id="comments" value="{{$address->comments}}">
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    <label for="references">References</label>
                    <input type="text" name="references" id="references" value="{{$address->references}}">
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    Nationality
                    <select name="nationality_id" id="nationality_id">
                        <option value="0">Choose a nationality</option>
                        @foreach (App\Nationality::all() as $nationality)
                        <option value="{{$nationality->id}}" @if ($nationality->id == $address->nationality_id) selected
                            @endif>{{$nationality->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    Idiom
                    <select name="idiom_id" id="idiom_id">
                        <option value="0">Choose a idiom</option>
                        @foreach (App\Idiom::all() as $idiom)
                        <option value="{{$idiom->id}}" @if ($idiom->id == $address->idiom_id) selected
                            @endif>{{$idiom->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    Second idiom
                    <select name="second_language_id" id="second_lanugage_id">
                        <option value="0">Choose a second idiom</option>
                        @foreach (App\Idiom::all() as $idiom)
                        <option value="{{$idiom->id}}" @if ($idiom->id == $address->second_language_id) selected
                            @endif>{{$idiom->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    Allow us to visit?
                    <div class="switch">
                        <label>
                            No
                            <input id="is_visitable" name="is_visitable" type="checkbox" @if ($address->is_visitable)
                            checked
                            @endif>
                            <span class="lever"></span>
                            Yes
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    Is a valid address?
                    <div class="switch">
                        <label>
                            No
                            <input id="is_valid" name="is_valid" type="checkbox" @if ($address->is_valid) checked
                            @endif>
                            <span class="lever"></span>
                            Yes
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    Return Visit
                    <select name="publisher_id" id="publisher_id">
                        <option value="0">Is not being visited</option>
                        @foreach (App\Publisher::all() as $publisher)
                        <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    Cards
                    <select name="card_id" id="card_id">
                        <option value="0">No card</option>
                        @foreach (App\Card::all() as $card)
                        <option value="{{$card->id}}">{{$card->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field s12">
                    Address Type
                    <select name="address_type_id" id="address_type_id">
                        <option value="0">Undefined</option>
                        @foreach (App\Address_type::all() as $address_type)
                        <option value="{{$address_type->id}}">{{$address_type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn waves-effect waves-light">Update</button>
        </form>
    </div>
</div>
@endsection
