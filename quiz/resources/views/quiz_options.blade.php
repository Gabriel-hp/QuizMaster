@extends('master')

@section('content')

<form method="GET" action="{{ route('quiz') }}" class="p-4 bg-light rounded shadow-sm">
    @csrf
    <div class="form-group mb-4">
        <label for="category" class="form-label fw-bold">Escolha a Categoria:</label>
        <select name="category" id="category" class="form-select">
            @foreach($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-4">
        <label for="quantity" class="form-label fw-bold">Quantidade de Perguntas:</label>
        <input type="number" name="quantity" id="quantity" class="form-control" min="1" max="20" value="10">
    </div>

    <button type="submit" class="btn btn-primary w-100">Iniciar Quiz</button>
</form>
@endsection