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
    <div id="vue2">
        <unassigned-cards></unassigned-cards>
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