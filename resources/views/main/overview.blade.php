@extends('layouts.app')

@section('header')
<ul class="tabs tabs-transparent">
    <li class="tab">
        <a href="#dashboard">Insights</a>
    </li>
    <li class="tab">
        <a href="#all" class="active">Addresses</a>
    </li>

</ul>
@endsection

@section('main')
{{-- <%#Script dos gráficos%> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>



<!-- ABA 1 -->
<div id="all" class="col s12">
    <div id="vue">
        <all-addresses></all-addresses>
        <all-addresses-without-map></all-addresses-without-map>
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