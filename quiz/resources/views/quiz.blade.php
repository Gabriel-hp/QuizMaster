<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="{{ route('process.quiz') }}">
    @csrf
    @foreach ($questions as $question)
        <p>{{ $question->question }}</p>
        <input type="radio" name="{{ $question->id }}" value="A"> {{ $question->option_a }}<br>
        <input type="radio" name="{{ $question->id }}" value="B"> {{ $question->option_b }}<br>
        <input type="radio" name="{{ $question->id }}" value="C"> {{ $question->option_c }}<br>
        <input type="radio" name="{{ $question->id }}" value="D"> {{ $question->option_d }}<br>
    @endforeach
    <input type="submit" value="Enviar">
</form>

</body>
</html>