@extends('application.layout')

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
{{-- ABA Dos territórios não designados --}}
<div id="all" class="col s12">
        <div class="container">
            <?php $macroregions = App\Macro_region::all(); ?>
            @foreach($macroregions as $macroregion)
                <blockquote>
                    @if($macroregion->name == "")
                        <h4>Unnamed Region</h4>
                    @else
                        <h4>{{$macroregion->name}}</h4>
                    @endif
                </blockquote>
                @foreach($macroregion->unassigned_cards() as $card)
                    <ul class="collection with-header z-depth-3">
                        <li class="collection-header">
                            <div class="row valign-wrapper" style="margin-bottom: 0;">
                                <div class="col s8">
                                    <h4> {{$card->name}}</h4>
                                </div>
                                <div class="col s4">
                                    <a id="<%= card.id %>" class="waves-effect waves-teal btn-flat modal-trigger add-publisher-button" href="#modal-assign-territory">Assign</a>
                                </div>
                            </div>
                        </li>
                        @foreach($card->addresses as $address)
                            <li class="collection-item"> {{$address->street}}</li>
                        @endforeach
                    </ul>
                @endforeach
            @endforeach
        </div>
    </div>
    {{-- Fim da aba dos territórios designados --}}
    
    
    
    <!-- ABA 2 -->
    <div id="dashboard" class="col s12">
    
        <div class="container">
            <% @working_cards.keys.each do |macroregion| %>
            <blockquote>
                <h4>
                    <%= macroregion %>
                </h4>
            </blockquote>
    
            <% @working_cards[macroregion].each do |card| %>
            <ul class="collection with-header z-depth-3">
                <li class="collection-header">
                    <div class="row mb-0 valign-wrapper">
                        <div class="col s9">
                            <h4>
                                <%= card.name %>
                            </h4>
                        </div>
                        <div class="col s3">
                            <%= link_to  "Received", finish_all_card_assignments_path(card_id: card.id), method: :post, class:'waves-effect waves-teal btn-flat' %>
                        </div>
                    </div>
                </li>
                <% @assignments = card.people_assigned_to_the_card %>
                <% @assignments.keys.each do |date| %>
                <li class="collection-item">
                    <%= @assignments[date].join(", ") %>
                    <div class="right">
                        <div class="center">
                            <b><%= date %></b>
                        </div>
                    </div>
                </li>
                <% end %>
                <%# Verificar a possibilidade de adição de ver comentários posteriormente  %>
                <%#<li class="collection-item">
                    <div class="row valign-wrapper mb-0">
                        <div class="col s10">
                            João @ Rua Marquês de Caravelas, 55, Ed Montreal, Ap 3
                        </div>
                        <div class="col s2">
                            <div class="center">
                                <a href="#" class=" btn-flat waves-teal btn-flat">
                                    see
                                </a>
                            </div>
                        </div>
                    </div>
                </li> %>
                <li class="collection-item center" style="padding: 0% 0% 0% 0%">
                    <a href="#modal-assign-territory" class="btn-flat waves-effect waves-light modal-trigger" style="height: 100%; width: 100%;">
                        <span> + Add publisher</span>
                    </a>
                </li>
            </ul>
            <% end %>
            <% end %>
    
        </div>
    
    </div>
    
    <%= render  "publisher_choice_assign.html.erb" %>
@endsection