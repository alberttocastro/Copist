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
        <div class="container">
            
            <?php $assignments = App\Assignment::all(); ?>
            @foreach($assignments as $assignment)
                <?php 
                    $card = $assignment->card;
                ?>
                {{-- Cartão --}}
                <div class="row">
                    <div class="col s12 m10 l8 xl8 offset-xl2 offset-l2 offset-m1">
                        <div class="card grey lighten-5 z-depth-2">
                            <?php // Conteúdo do cartão  ?>
                            <div class="card-content indigo-text text-darken-4">
                                
                                {{-- Header --}}
                                <span class="card-title">
                                    <div class="row">
                                        <div class="col s2" style="padding-left: 0%"><i class="material-icons medium">location_on</i></div>
                                        <div class="col s10" style="vertical-align:middle;">
                                            <h4 style="margin-top: 0px">
                                                {{ $card->name }}
                                            </h4>
                                        </div>
                                    </div>
                                </span>
                                
                                <?php  $addresses = $card->addresses ?>
                                @if($addresses != null)
                                <ul class="collapsible z-depth-0">
                                    @foreach($addresses as $address)
                                    <li>
                                        {{-- TODO: Address done? --}}
                                        <div class="collapsible-header <?php //= address.done?(assignment.id) ? "blue lighten-4" : nil ?>">
                                            <i class="material-icons">contacts</i>{{ $address->street }}
                                        </div>
                                        <div class="collapsible-body">
                                            <div class="row valign-wrapper">
                                                <div class="col s9">
                                                    <p>Name: {{ $address->name }}</p> 
                                                    <p>Country: {{ $address->nationality->name }} </p>
                                                    <p>Ref:  {{ $address->references }} </p>
                                                    <p>Obs: {{ $address->comments }} </p> <br>
                                                </div>
                                                <div class="col s3">
                                                    <a href="{{route('view_territory', ['id'=>$address->id])}}">View</a>
                                                    {{-- TODO: View address --}}
                                                </div>
                                            </div>
                                            <div>
                                            <a id="{{ $address->id }}" class="waves-effect waves-light btn modal-trigger blue darken-3 report-visit" href="#report-visit">Report</a>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                                @endif
                                
                            </div>
                            
                            {{-- Ações do cartão --}}
                            <div class="card-action">
                                <a href="/" class="black-text waves-effect waves-teal btn-flat" method="post"><b>Done</b></a>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
            @endforeach        
            {{-- <% end %> --}}
            
            {{--  Modal de relatar visita  --}}
            <div id="report-visit" class="modal" style="min-height: 100%">
                <form action="{{route('create_address_report')}}" method="POST">
                    {{ csrf_field() }}
                    <input id="publisher_id" name="publisher_id" type="hidden" value="{{Auth::user()->publisher_id}}" />
                    <input id="address_id" name="address_id" type="hidden" />
                    <div class="modal-content">
                        <h4>ADD A REPORT</h4> <br>
                        <div class="input-field col s12">
                            <input type="text" name="date" placeholder="Date" class="datepicker"/>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" name="comment"/>
                            <label for="textarea1">Your report</label>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                            <input type="submit" value="Send" class="modal-close waves-effect waves-green btn-flat">
                        </div>
                    </div>
                    {{-- <% end %> --}}
                </form>
            </div>
            
        </div>
        
    </div>
    {{-- Fim da ABA de territórios designados --}}
    
    {{-- ABA de informações --}}
    <div id="info" class="col s12 m12 l12" >
        <div class="container">
            
            {{-- cartão --}}
            <div class="row">
                <div class="col s12 m10 l8 xl8 offset-xl2 offset-l2 offset-m1">
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title red-text"><b>DO NOT CALL</b></span>
                            
                            <?php $do_not_calls = App\User::find(1)->do_not_call_info();?>
                            @foreach($do_not_calls as $do_not_call)
                            {{-- TODO: Pegar os não visitar de maneira dinâmica --}}
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
        <form action="{{route('create_suggested_address')}}" method="POST">
            {{ csrf_field() }}
            <div class="modal-content">
                <h4>Add a new territory</h4> <br>
                <div class="input-field col s12">
                    <input type="text" name="street">
                    <label for="textarea-address">Address</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="neighborhood">
                    <label for="textarea-reference">Reference</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="name">
                    <label for="textarea-notes">Name <i>(Optional)</i></label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="comments" >
                    <label for="textarea-notes">Notes</label>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                <input name="commit" type="submit" value="Send" class="waves-effect waves-green btn-flat" >
            </div>
        </form>
    </div>
    {{-- Fim da ABA de informações --}}
@endsection