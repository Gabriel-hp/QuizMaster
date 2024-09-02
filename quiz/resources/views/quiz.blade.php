@extends('master')

@section('content')

<form method="POST" action="{{ route('process.quiz') }}" class="quiz-form">
    @csrf
    @foreach ($questions as $index => $question)
        <div class="question-container mt-4">
            <p class="question-number">Questão {{ $index + 1 }}</p>
            <p class="question-text">{{ $question->question }}</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{ $question->id }}" value="A" id="optionA{{ $question->id }}">
                <label class="form-check-label" for="optionA{{ $question->id }}">
                    {{ $question->option_a }}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{ $question->id }}" value="B" id="optionB{{ $question->id }}">
                <label class="form-check-label" for="optionB{{ $question->id }}">
                    {{ $question->option_b }}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{ $question->id }}" value="C" id="optionC{{ $question->id }}">
                <label class="form-check-label" for="optionC{{ $question->id }}">
                    {{ $question->option_c }}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{ $question->id }}" value="D" id="optionD{{ $question->id }}">
                <label class="form-check-label" for="optionD{{ $question->id }}">
                    {{ $question->option_d }}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{ $question->id }}" value="E" id="optionE{{ $question->id }}">
                <label class="form-check-label" for="optionE{{ $question->id }}">
                    {{ $question->option_d }}
                </label>
            </div>
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary submit-btn">finalizar</button>
</form>



@endsection