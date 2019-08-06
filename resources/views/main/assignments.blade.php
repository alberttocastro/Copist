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
<div id="all" class="col s12">
    <cards-unassigned-view></cards-unassigned-view>
</div>
<div id="dashboard" class="col s12">
    <cards-assigned-view v-on:assignment-change="update_assigned_cards()"></cards-assigned-view>
</div>

@endsection