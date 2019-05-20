@extends('layouts.app')

@section('header')
<ul class="tabs tabs-transparent">
    <li class="tab">
        <a href="#dashboard" class="active">Insights</a>
    </li>
    <li class="tab">
        <a href="#all">Addresses</a>
    </li>

</ul>
@endsection

@section('main')
{{-- <%#Script dos gráficos%> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>



<!-- ABA 1 -->
<div id="all" class="col s12">
    <div class="container">

        @if (App\Address::all()->count() != 0)
        @if (App\Macro_region::all()->count() > 0)
        <h4>Macro Region and Addresses</h4>
        @foreach (App\Macro_region::all() as $macro_region)
        <blockquote>
            <h5>{{$macro_region->name}}</h5> <span>({{$macro_region->addresses_quantity()}})</span>
        </blockquote>

        <ul class="collapsible popout">
            @foreach ($macro_region->cards as $card)
            <li>
                <div class="collapsible-header"><i class="material-icons">place</i>{{$card->name}}</div>
                <div class="collapsible-body">
                    @foreach ($card->addresses as $address)
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">{{$address->neighborhood}}</span>
                            <div class="row">
                                <div class="col s8">
                                    <p><b>{{$address->name}}</b></p>
                                    <p>{{$address->street}}</p>
                                </div>
                                <div class="s4">
                                    <a href="{{route('edit_territory',['id'=>$address->id])}}"
                                        class="waves-effect waves-light btn right">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </li>
            @endforeach
        </ul>
        @endforeach
        @endif
        <div class="divider"></div>
        {{-- Cards without macro-region --}}
        @if (App\Card::where('macro_region_id', 0)->get()->count() > 0)
        <h4>Addresses without Macro Region</h4>
        <ul class="collapsible popout">
            @foreach (App\Card::where('macro_region_id', 0)->get() as $card)
            <li>
                <div class="collapsible-header"><i class="material-icons">place</i>{{$card->name}}</div>
                <div class="collapsible-body">
                    @foreach ($card->addresses as $address)
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">{{$address->neighborhood}}</span>
                            <div class="row">
                                <div class="col s8">
                                    <p><b>{{$address->name}}</b></p>
                                    <p>{{$address->street}}</p>
                                </div>
                                <div class="s4">
                                    <a href="{{route('edit_territory',['id'=>$address->id])}}"
                                        class="waves-effect waves-light btn right">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </li>
            @endforeach
            {{-- Addresses sem card --}}
            <li>
                <div class="collapsible-header"><i class="material-icons red-text">place</i><span
                        class="red-text"><b>Addresses without cards</b></span></div>
                <div class="collapsible-body">
                    @foreach (App\Address::where('card_id', 0)->get() as $address)
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">{{$address->neighborhood}}</span>
                            <div class="row">
                                <div class="col s8">
                                    <p><b>{{$address->name}}</b></p>
                                    <p>{{$address->street}}</p>
                                </div>
                                <div class="s4">
                                    <a href="{{route('edit_territory',['id'=>$address->id])}}"
                                        class="waves-effect waves-light btn right">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </li>
        </ul>
        @endif
        @else
        {{-- Quando não tem endereços --}}
        <div class="valign-wrapper">
            <div style="width: 100%">
                <h2 class="center-align">No addresses yet</h2>
                <h5 class="center-align">To register a new one, go to the <b>database</b>.</h5>
                <p class="center-align"><i>Don't forget to create a Macro-region</i></p>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- ABA 2 -->
<div id="dashboard" class="col s12">
    <div class="container">

        <h3><b>Charts</b></h3>
        <div class="divider"></div>
        <div class="col"></div>
        <div class="row">
            <div class="col l10 m6">
                <h4>Addresses</h4>
            </div>
            <div class="col l2 m3 offset-m3">
                <span class="right">
                    <h4>{{App\Address::where('is_valid', true)->count()}}</h4>
                </span>
            </div>
        </div>
        <div class="divider"></div>
        <h4 class="grey-text text-darken2">By Country</h4>

        <canvas id="foreigners-by-country" width="20rem" height="10rem"></canvas>
        <script>
            var ctx = document.getElementById("foreigners-by-country");
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: <?php echo $nationality_names ?>,
                        datasets: [{
                            label: '# foreigners',
                            data:<?php echo $nationality_quantities ?>,
                            borderWidth: 1
                        }]
                    }
                });
        </script>
        <br>

        <div class="divider"></div>

    </div>
</div>
@endsection
