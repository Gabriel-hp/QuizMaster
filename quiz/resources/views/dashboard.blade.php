
@extends('master')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Meu Dashboard</h1>

    <div class="row">
        <!-- Card de Resumo -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Resumo Geral</div>
                <div class="card-body">
                    <h5 class="card-title">Total de Quizzes Realizados</h5>
                    <p class="card-text">10</p>
                </div>
            </div>
        </div>

        <!-- Card de Desempenho -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Desempenho Médio</div>
                <div class="card-body">
                    <h5 class="card-title">Pontuação Média</h5>
                    <p class="card-text">85%</p>
                </div>
            </div>
        </div>

        <!-- Card de Questões Respondidas -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Questões Respondidas</div>
                <div class="card-body">
                    <h5 class="card-title">Total de Questões Respondidas</h5>
                    <p class="card-text">150</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Card de Último Quiz -->
        <div class="col-md-6">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">Último Quiz</div>
                <div class="card-body">
                    <h5 class="card-title">Quiz de Raciocínio Lógico</h5>
                    <p class="card-text">Pontuação: 90%</p>
                    <p class="card-text">Data: 28/08/2024</p>
                </div>
            </div>
        </div>

        <!-- Card de Próximo Quiz -->
        <div class="col-md-6">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">Próximo Quiz</div>
                <div class="card-body">
                    <h5 class="card-title">Escolha um novo quiz para começar!</h5>
                    <a href="{{ route('quiz') }}" class="btn btn-primary">Novo Quiz</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




@endsection