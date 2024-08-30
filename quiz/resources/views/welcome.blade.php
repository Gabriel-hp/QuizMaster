@extends('master')

@section('content')

<div class="container mt-5">
    <div class="row text-center">
        <h1 class="display-4 fw-bold">Bem-vindo ao Quiz Master</h1>
        <p class="lead mt-3">Prepare-se para suas provas e concursos com nossos simulados!</p>
        <p class="mb-2">Desafie-se com questões de Português, Raciocínio Lógico e Informática.</p>
        <p class="mb-4">Você terá 10 questões aleatoria e no final confira o seu desempenho</p>
        <h2 class="fw-semibold">Pronto para começar?</h2>
        <a class="btn btn-lg btn-success mt-4" href="{{ route('quiz') }}">Iniciar Novo Quiz</a>
    </div>
</div>


@endsection