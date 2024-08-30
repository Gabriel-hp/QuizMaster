<form action="{{ route('questions.store') }}" method="POST">
    @csrf
    <label for="question_text">Enunciado:</label>
    <input type="text" name="question_text" required>

    <label for="option_a">Alternativa A:</label>
    <input type="text" name="option_a" required>

    <label for="option_b">Alternativa B:</label>
    <input type="text" name="option_b" required>

    <label for="option_c">Alternativa C:</label>
    <input type="text" name="option_c" required>

    <label for="option_d">Alternativa D:</label>
    <input type="text" name="option_d" required>

    <label for="correct_option">Alternativa correta:</label>
    <select name="correct_option" required>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
    </select>

    <button type="submit">Criar Questão</button>
</form>
