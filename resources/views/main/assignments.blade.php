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
        @forelse(App\Macro_region::all() as $macroregion)
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

        @empty
        {{-- Caso não tenha uma macro-região cadastrada --}}

        <div class="valign-wrapper">
            <div>
                <h2 class="center-align">There aren't macro-regions yet.</h2>
                <h5 class="center-align">Please, go to the database to create one.</h5>
            </div>
        </div>

        @endforelse
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

    <div class="container">
        @forelse ($working_cards as $macro_region_id => $cards)
        <blockquote>
            <h4>
                {{App\Macro_region::find(1)->name}}
            </h4>
        </blockquote>

        @foreach ($cards as $card)
        <ul class="collection with-header z-depth-3">
            <li class="collection-header">
                <div class="row mb-0 valign-wrapper">
                    <div class="col s9">
                        <h4>
                            {{$card->name}}
                        </h4>
                    </div>
                    <div class="col s3">
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('remove_assignment_to_territory').submit();">Received</a>
                        <form id="remove_assignment_to_territory" action="{{route('remove_assignment_to_territory')}}"
                            method="POST" style="display: none;">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="card_id" value="{{$card->id}}">
                        </form>
                    </div>
                </div>
            </li>
            @foreach ($card->get_people_assigned_to_the_card() as $user)
            <li class="collection-item">
                @if ($user->publisher != null)
                {{$user->publisher->name}}
                @else
                Unknown
                @endif
                <div class="right">
                    <div class="center">
                        <b>{{strftime('%m/%d/%Y', App\Assignment::where('user_id', $user->id)->where('card_id', $card->id)->where('completion_date', null)->first()->created_at->timestamp)}}</b>
                    </div>
                </div>
            </li>
            @endforeach
            <li class="collection-item center" style="padding: 0% 0% 0% 0%">
                <a href="#modal-assign-territory"
                    class="btn-flat waves-effect waves-light modal-trigger add-publisher-button">
                    <span id="{{$card->id}}"> + Add publisher</span>
                </a>
            </li>
        </ul>
        @endforeach
        @empty

        <div class="valign-wrapper">
            <div style="width: 100%">
                <h2 class="center-align">Oh no!</h2>
                <h5 class="center-align">No cards at work.</h5>
            </div>
        </div>

        @endforelse

    </div>

</div>

@yield('modal',view('main.modal.choose_publisher'))
@endsection
