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
    @if(\Session::has('message'))
        <p>
            {{\Session::get('message')}}
        </p>
    @endif
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
                                    <a id="{{$card->id}}" class="waves-effect waves-teal btn-flat modal-trigger add-publisher-button" href="#modal-assign-territory">Assign</a>
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
            @foreach ($working_cards as $macro_region_id => $cards)
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
                                    <a href="{{route('remove_assignment_to_territory')}}" >Received</a>
                                </div>
                            </div>
                        </li>
                        @foreach ($card->get_people_assigned_to_the_card() as $user)
                            <li class="collection-item">
                                {{$user->email}}
                                <div class="right">
                                    <div class="center">
                                        <b>{{strftime('%m/%d/%Y', App\Assignment::where('user_id', $user->id)->where('card_id', $card->id)->where('completion_date', null)->first()->created_at->timestamp)}}</b>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <li class="collection-item center" style="padding: 0% 0% 0% 0%">
                            <a href="#modal-assign-territory" class="btn-flat waves-effect waves-light modal-trigger add-publisher-button" >
                                <span id="{{$card->id}}"> + Add publisher</span>
                            </a>
                        </li>
                    </ul>
                @endforeach
            @endforeach
    
        </div>
    
    </div>
    
    @yield('modal',view('main.modal.choose_publisher'))
@endsection