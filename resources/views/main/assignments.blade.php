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
    <unassigned-cards></unassigned-cards>
</div>
{{-- Fim da aba dos territórios designados --}}



<!-- ABA 2 -->
<div id="dashboard" class="col s12">

    <assigned-cards v-on:assignment-change="update_assigned_cards()"></assigned-cards>

</div>

@yield('modal',view('main.modal.choose_publisher'))
@endsection