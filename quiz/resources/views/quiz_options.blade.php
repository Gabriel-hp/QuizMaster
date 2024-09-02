@extends('master')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Configurar Quiz</h2>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('quiz') }}">
                        @csrf
                        <div class="form-group">
                            <label for="categories">Escolha as Categorias:</label>
                            <div class="form-check">
                                @foreach($categories as $category)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="categories[]" id="category{{ $category }}" value="{{ $category }}">
                                        <label class="form-check-label" for="category{{ $category }}">
                                            {{ $category }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="quantity">Quantidade de Perguntas:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" min="1" max="100" value="10">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Iniciar Quiz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
