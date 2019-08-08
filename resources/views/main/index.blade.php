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

<div class="fixed-action-btn">
    <a class="btn-floating btn-large blue lighten-2">
        <i class="material-icons Large modal-trigger" href="#add-territory-modal">add</i>
    </a>
</div>

{{--  Modal de adicionar endereço --}}
<div id="add-territory-modal" class="modal">
    <form id="add-territory-form" action="{{route('create_suggested_address')}}" method="POST">
        {{ csrf_field() }}
        <div class="modal-content">
            <h4>Add a new territory</h4>
            <span class="error-message display-none">Correct the fields in red</span>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="street" id="street">
                    <label for="street">Address</label>
                    <span class="helper-text">Example: Rua do Meio, 90, Rio
                        Vermelho - Salvador</span>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="neighborhood">
                    <label for="neighborhood">Reference</label>
                    <span class="helper-text">Example: Close to Hostel Rio
                        Vermelho</span>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="name">
                    <label for="name">Name <i>(Optional)</i></label>
                </div>
                <div class="input-field col s12">
                    <textarea type="text" name="comments" class="materialize-textarea"
                        form="add-territory-form"></textarea>
                    <label for="comments">Notes</label>
                    <span class="helper-text">Example: Possibly a foreigner that
                        somebody told us while...</span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
            <input name="commit" type="submit" value="Send" class="waves-effect waves-green btn-flat">
        </div>
    </form>
</div>
{{-- Fim da ABA de informações --}}
@endsection
