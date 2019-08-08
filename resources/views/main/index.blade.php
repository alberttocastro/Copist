@extends('layouts.app')

@section('header')
<ul class="tabs tabs-transparent">
    <li class="tab">
        <a href="#assigned-territories" class="active">Assignments</a>
    </li>
    <li class="tab">
        <a href="#info">Informations</a>
    </li>
</ul>
@endsection

@section('main')

{{-- ABA de territórios designados para mim  --}}
<div id="assigned-territories" class="col s12">
    <assignment-user-view></assignment-user-view>
</div>
{{-- Fim da ABA de territórios designados --}}

{{-- ABA de informações --}}
<div id="info" class="col s12 m12 l12">
    <div class="container">

        {{-- cartão --}}
        <div class="row">
            <div class="col s12 m10 l8 xl8 offset-xl2 offset-l2 offset-m1">
                <div class="card white">
                    <div class="card-content">
                        <span class="card-title red-text"><b>DO NOT CALL</b></span>

                        <?php $do_not_calls = Auth::user()->do_not_call_info();?>
                        @foreach($do_not_calls as $do_not_call)
                        <h5>{{"MACRO REGION"}}</h5>
                        <p>{{$do_not_call->street}} </p>
                        <div class="divider"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<suggested-address-new-action></suggested-address-new-action>
{{-- Fim da ABA de informações --}}
@endsection