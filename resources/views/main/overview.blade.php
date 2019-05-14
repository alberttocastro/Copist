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
            
            @foreach (App\Macro_region::all() as $macro_region)
            <blockquote>
                <h5>{{$macro_region->name}}</h5>
            </blockquote>
            
            <ul class="collapsible popout">
                @foreach ($macro_region->cards as $card)
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i><%= card.name %></div>
                    <div class="collapsible-body">
                        @foreach ($card->addresses as $address)
                            <span>{{$address->street}}</span><br>
                        @endforeach
                    </div>
                </li>
                @endforeach
            </ul>
            @endforeach
        </div>
    </div>

    <!-- ABA 2 -->
    <div id="dashboard" class="col s12">
        <div class="container">

            <h3  ><b>Charts</b></h3>
            <div class="divider"></div>
            <div class="col"></div>
            <h4 class="grey-text text-darken2">By Country</h4>
            
            <canvas id="foreigners-by-country" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById("foreigners-by-country");
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ["Ghana", "Nigeria", "South Africa", "USA", "England", "Japan", "Others"],
                        datasets: [{
                            label: '# foreigners',
                            data: [20, 18, 1, 30, 7, 2, 30],
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(50, 50, 50, 0.2)'
                            ],
                            borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(50, 50, 50, 1)'
                            ],
                            borderWidth: 1
                        }]
                    }
                });
            </script>
            <br>

            <div class="divider"></div>
            {{-- <%# Título %> --}}
            <div class="col"></div>
            <h4 class="grey-text text-darken2">Regions and attendance</h4>

            <canvas id="foreigners-by-region" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById("foreigners-by-region");
                var myChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: ["Centro", "Barra", "Litoral Sul", "Litoral Centro", "Litoral Norte", "Paralela Centro", "Paralela Norte", "Cidade baixa", "Suburbio"],
                        datasets: [
                        {
                            label: "Quantidade",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [30, 40, 23, 10, 4, 5, 6, 5, 5]
                        },
                        {
                            label: "Frequência de Trabalho",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [40, 40, 30, 20, 15, 5, 5, 15, 5]
                        }
                        ]
                    }
                });
            </script>
            
            
        </div>
    </div>
@endsection