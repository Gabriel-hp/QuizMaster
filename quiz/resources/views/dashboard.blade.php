@extends('master')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Meu Dashboard</h1>

    <div class="row">
        <!-- Card de Resumo -->
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
    
                <div class="card-body">
                    <h5 class="card-title">Total de simulados Realizados</h5>
                    <p class="card-text">Foi Realizado <strong>{{ $totalQuestionsAnswered }}</strong> simulados</p>
                </div>
            </div>
        </div>

        <!-- Card de Resumo -->


        <!-- Card de Total de questionario Respondidas -->
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">

                <div class="card-body">
                <h5 class="card-title ">Soma Total dos Pontos</h5>
                <p class="card-text">Um total de <strong>{{ $totalScore }} </strong> pontos </p>
                </div>
            </div>
        </div>
   
            <!-- Card de Desempenho -->
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">

                <div class="card-body">
                    <h5 class="card-title">Pontuação Média</h5>
                        <h4 class="card-text"> Você possui uma media de <strong>{{ number_format($media, 2) }}</strong> pontos</h4>
                    <canvas id="mediaChart"></canvas>
                </div>
            </div>
        </div>
        </div>


<script>
    var ctx = document.getElementById('mediaChart').getContext('2d');
    var mediaChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pontuação Média'],
            datasets: [{
                label: 'Média de Acertos',
                data: [{{ $media }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)'
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


@endsection
