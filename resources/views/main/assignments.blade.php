@extends('layouts.app')

@section('header')
<ul class="tabs tabs-transparent">
    <li class="tab">
        <a href="#dashboard" class="active">At Work</a>
    </li>
    <li class="tab">
        <a href="#all">Unassigned</a>
    </li>
</ul>
@endsection

@section('main')
@if(\Session::has('message'))
<p>
    {{\Session::get('message')}}
</p>
@endif
{{-- ABA Dos territórios não designados --}}
<div id="all" class="col s12">
    <div class="container">
        <div id="vue2">
            <unassigned-cards></unassigned-cards>
        </div>
        @if (App\Card::where('macro_region_id',0)->get()->count() > 0)
        <blockquote>
            <h4>Cards without Macro Region</h4>
        </blockquote>
        @foreach(App\Card::where('macro_region_id',0)->get() as $card)
        <ul class="collection with-header z-depth-3">
            <li class="collection-header">
                <div class="row valign-wrapper" style="margin-bottom: 0;">
                    <div class="col s8">
                        <h4> {{$card->name}}</h4>
                    </div>
                    <div class="col s4">
                        <a id="{{$card->id}}"
                            class="waves-effect waves-teal btn-flat modal-trigger add-publisher-button"
                            href="#modal-assign-territory">Assign</a>
                    </div>
                </div>
            </li>
            @foreach($card->addresses as $address)
            <li class="collection-item"> {{$address->street}}</li>
            @endforeach
        </ul>
        @endforeach
        @endif
    </div>
</div>
{{-- Fim da aba dos territórios designados --}}



<!-- ABA 2 -->
<div id="dashboard" class="col s12">

    <div id="vue">
        <assigned-cards></assigned-cards>
    </div>

</div>

@yield('modal',view('main.modal.choose_publisher'))
@endsection
