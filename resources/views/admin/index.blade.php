@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <h1>Panel de control</h1>
@stop

@section('content')
    <p>Bienvenido al panel de control</p>
    <div class="container" style="text-align: Center; ">

        <div class="card col-sm-8 d-inline-flex" style="width: 25rem;margin:20px ; ">
            <div class="card-body">
                <h5 class="card-title">grafica facturación:</h5>
                <canvas id="myChart" width="40" height="40"></canvas>
            </div>
        </div>
        <div class="card col-sm-8 d-inline-flex" style="width: 25rem;margin:20px ; ">
            <div class="card-body">
                <h5 class="card-title">distribución de gastos 2021:</h5>
                <canvas id="myChart2" width="40" height="40"></canvas>

            </div>

        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script>
                console.log('Hi!');

            </script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [

                            <?php
                            foreach($facturasingresos as $d): ?>
                            "<?php echo $d->mes; ?>",
                            <?php
                            endforeach; ?>
                        ],
                        datasets: [{
                            label: 'Facturación 2021',
                            data: [ <?php foreach(
                                $facturasingresos as $d): ?>
                                "<?php echo $d->aggregate; ?>",
                                <?php
                                endforeach; ?>
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });


                var ctx = document.getElementById('myChart2');
                var myChart2 = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: [ <?php foreach($facturasgastos as $f): ?>
                            "<?php echo $f->Observaciones; ?>",
                            <?php
                            endforeach; ?>
                        ],
                        datasets: [{
                            label: '# of Votes',
                            data: [ <?php foreach($facturasgastos as $f): ?>
                                "<?php echo $f->aggregate; ?>",
                                <?php
                                endforeach; ?>
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

            </script>
            @livewireScripts

        @stop
