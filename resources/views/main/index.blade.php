@extends('application.layout')

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
            
                {{-- <%# current_user.assignments_to_do.each do |assignment| %> --}}
                {{-- <% User.first.assignments_to_do.each do |assignment| %> --}}
                {{-- <% puts assignment%> --}}
                {{-- <%# Cartão %> --}}
            
            <div class="row">
                <div class="col s12 m10 l8 xl8 offset-xl2 offset-l2 offset-m1">
                    <div class="card grey lighten-5 z-depth-2">
                        <?php // Conteúdo do cartão  ?>
                        <div class="card-content indigo-text text-darken-4">
                            
                            {{-- <%# Header %> --}}
                            {{-- <% @card = Card.find(assignment.card_id) %> --}}
                            <span class="card-title">
                                <div class="row">
                                    <div class="col s2" style="padding-left: 0%"><i class="material-icons medium">location_on</i></div>
                                    <div class="col s10" style="vertical-align:middle;">
                                        <h4 style="margin-top: 0px">
                                            {{-- <b><%= @card.name %></b> --}}
                                        </h4>
                                    </div>
                                </div>
                            </span>
                            
                            {{-- <%# Endereços %> --}}
                            {{-- <% @addresses = @card.addresses%> --}}
                            {{-- <% if !@addresses.empty? %> --}}
                            <ul class="collapsible z-depth-0">
                                {{-- <% @addresses.each do |address| %> --}}
                                <li>
                                    <div class="collapsible-header <%= address.done?(assignment.id) ? "blue lighten-4" : nil %>">
                                        {{-- <i class="material-icons">contacts</i><%= address.street %> --}}
                                    </div>
                                    <div class="collapsible-body">
                                        <div class="row valign-wrapper">
                                            <div class="col s9">
                                                {{-- <p>Name: <%= address.name %></p>  --}}
                                                {{-- <p>Country: <%= address.nationality.country %></p> --}}
                                                {{-- <p>Ref: <%= address.references %></p> --}}
                                                {{-- <p>Obs: <%= address.comments %></p> <br> --}}
                                            </div>
                                            <div class="col s3">
                                                {{-- <%= link_to  "View", view_path(address_id: address.id) %> --}}
                                            </div>
                                        </div>
                                        <div>
                                            <a id="<%= address.id %>" class="waves-effect waves-light btn modal-trigger blue darken-3 report-visit" href="#report-visit">Report</a>
                                        </div>
                                    </div>
                                </li>
                                {{-- <% end %> --}}
                                
                            </ul>
                            {{-- <% end %> --}}
                            
                        </div>
                        
                        {{-- <%# Ações do cartão %> --}}
                        <div class="card-action">
                            {{-- <%= link_to declare_concluded_path(id: assignment.id), class:'black-text waves-effect waves-teal btn-flat', method: :post do %><b>Done</b> <% end %> --}}
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>        
            {{-- <% end %> --}}

            {{-- <%# Modal de relatar visita %> --}}
            <div id="report-visit" class="modal" style="min-height: 100%">
                {{-- <%= form_tag receive_report_path do %> --}}
                {{-- <%= hidden_field_tag :address_id, 0 %> --}}
                {{-- <%# TODO: Trocar as partes do código comentadas %> --}}
                {{-- <%#= hidden_field_tag :publisher_id, current_user.id %> --}}
                {{-- <%= hidden_field_tag :publisher_id, Publisher.first.id %> --}}
                <div class="modal-content">
                    <h4>Add a report</h4> <br>
                    <div class="input-field col s12">
                        {{-- <%= text_field_tag :date, '', class:'datepicker' %> --}}
                    </div>
                    <div class="input-field col s12">
                        {{-- <%= text_field_tag :comment, '' %> --}}
                        <label for="textarea1">Your report</label>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                        {{-- <%= submit_tag "Send", class:"waves-effect waves-green btn-flat" %> --}}
                    </div>
                </div>
                {{-- <% end %> --}}
            </div>
            
        </div>
        
    </div>
{{-- Fim da ABA de territórios designados --}}

{{-- ABA de informações --}}
    <div id="info" class="col s12 m12 l12" >
        <div class="container">
            
            {{-- <%#cartão%> --}}
            <div class="row">
                <div class="col s12 m10 l8 xl8 offset-xl2 offset-l2 offset-m1">
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title red-text"><b>DO NOT CALL</b></span>
                            {{-- <%# current_user.do_not_call_info.each do |info| %> --}}
                            {{-- <% User.first.do_not_call_info.each do |info| %> --}}
                            {{-- <h5><%= info[0].nil? ? nil : info[0].macroreg %></h5> --}}
                            {{-- <% if !info[1].nil? %> --}}
                            {{-- <% info[1].each do |address| %> --}}
                            {{-- <p><%= link_to "#{address.street}", "#" %></p> --}}
                            <div class="divider"></div>
                            {{-- <% end %> --}}
                            {{-- <% end %> --}}
                            {{-- <% end %> --}}
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

    {{-- <%# Modal de adicionar endereço %> --}}
    <div id="add-territory-modal" class="modal">
        {{-- <%= form_tag create_suggested_address_path do %> --}}
        <div class="modal-content">
            <h4>Add a new territory</h4> <br>
            <div class="input-field col s12">
                {{-- <%= text_field_tag :street, "" %> --}}
                <label for="textarea-address">Address</label>
            </div>
            <div class="input-field col s12">
                {{-- <%= text_field_tag :neighborhood, "" %> --}}
                <label for="textarea-reference">Reference</label>
            </div>
            <div class="input-field col s12">
                {{-- <%= text_field_tag :name, "" %> --}}
                <label for="textarea-notes">Name <i>(Optional)</i></label>
            </div>
            <div class="input-field col s12">
                {{-- <%= text_field_tag :comments, "" %> --}}
                <label for="textarea-notes">Notes</label>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
            {{-- <%= submit_tag 'Send', class:'waves-effect waves-green btn-flat' %> --}}
        </div>
        {{-- <% end %> --}}
    </div>
{{-- Fim da ABA de informações --}}
@endsection