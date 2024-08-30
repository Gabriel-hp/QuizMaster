@extends('master')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Resultado do Quiz</h2>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Seu Resultado:</h3>
                    <p class="display-4 font-weight-bold 
                        @if($score < 5) text-danger
                        @elseif($score < 7) text-warning
                        @else text-success
                        @endif">
                        {{ $score }} de 10
                    </p>
                    
                    @if($score < 5)
                        <p class="card-text text-danger">Não desanime! Continue praticando para melhorar seu desempenho.</p>
                    @elseif($score < 7)
                        <p class="card-text text-warning">Bom esforço! Com mais prática, você pode melhorar ainda mais.</p>
                    @else
                        <p class="card-text text-success">Parabéns! Continue praticando para manter e melhorar seu desempenho.</p>
                    @endif
                    
                    <a href="{{ route('quiz') }}" class="btn btn-lg btn-primary mt-3">Tentar Novamente</a>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header bg-secondary text-white">
                    <h3 class="mb-0">Revisão das Questões</h3>
                </div>
                <div class="card-body">
                    @foreach($questions as $index => $question)
                        <div class="question-review mb-4">
                            <p><strong>Questão {{ $index + 1 }}:</strong> {{ $question->question }}</p>
                            <p><strong>Sua Resposta:</strong> 
                                <span class="@if($userAnswers[$question->id] == $question->correct_option) text-success @else text-danger @endif">
                                    {{ $userAnswers[$question->id] ?? 'Não respondida' }}
                                </span>
                            </p>
                            <p><strong>Resposta Correta:</strong> <span class="text-success">{{ $question->correct_option }}</span></p>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
