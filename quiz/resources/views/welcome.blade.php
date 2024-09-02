@extends('master')

@section('content')

<div class="container mt-5">
    <div class="row text-center">
        <h1 class="display-4 fw-bold text-primary">Bem-vindo ao Quiz Master</h1>
        <p class="lead mt-3 text-secondary">Prepare-se para suas provas e concursos com nossos simulados!</p>
        <p class="mb-2 text-muted">Desafie-se com questões de Português, Raciocínio Lógico e Informática.</p>
        <p class="mb-4 text-muted">Você terá 10 questões aleatórias e, no final, poderá conferir o seu desempenho.</p>
        <h2 class="fw-semibold text-success">Pronto para começar?</h2>
        <a class="btn btn-lg btn-success mt-4 px-5" href="{{ route('quiz') }}">Iniciar Novo Quiz</a>
    </div>

    <hr class="my-5">

    <div class="row text-center">
        <h2 class="display-5 text-primary">Personalize Sua Experiência</h2>
        <p class="lead mt-3 text-secondary">Escolha a matéria e a quantidade de questões para um quiz sob medida.</p>
        <p class="mb-2 text-muted">Vamos experimentar?</p>
        <a class="btn btn-lg btn-outline-success mt-4 px-5" href="/quiz/select">Iniciar Quiz Personalizado</a>
    </div>
</div>



@endsection