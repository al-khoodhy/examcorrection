@extends('voyager::master')

@section('content')
<!-- create.blade.php -->
<!-- Form Task -->
<form method="post" action="{{ route('tasks.store') }}">
    @csrf
    <!-- Input untuk Task -->
    <input type="text" name="subjects_id" placeholder="Subject ID"><br>
    <input type="text" name="user_id" placeholder="User ID"><br>
    <input type="text" name="task_title" placeholder="Task Title"><br>
    <input type="text" name="number_of_questions" placeholder="Number of Questions"><br>
    <input type="datetime-local" name="start_time" placeholder="Start Time"><br>
    <input type="datetime-local" name="end_time" placeholder="End Time"><br>
    <input type="text" name="slug" placeholder="Slug"><br>
    <input type="text" name="classroom" placeholder="Classroom"><br>

    <!-- Input untuk Pertanyaan -->
    <div id="questions">
        <div class="question">
            <input type="text" name="questions[0][question]" placeholder="Question">
            <input type="text" name="questions[0][answer_key]" placeholder="Answer Key">
            <input type="number" name="questions[0][weight]" placeholder="Weight">
        </div>
    </div>
    <button type="button" id="addQuestion">Add Question</button>
    <button type="submit">Submit</button>
</form>

<script>
    // Script untuk menambahkan inputan pertanyaan secara dinamis
    let questionIndex = 1; // Indeks awal pertanyaan

    document.getElementById('addQuestion').addEventListener('click', function() {
        var questionDiv = document.createElement('div');
        questionDiv.classList.add('question');
        questionDiv.innerHTML = `
            <input type="text" name="questions[${questionIndex}][question]" placeholder="Question">
            <input type="text" name="questions[${questionIndex}][answer_key]" placeholder="Answer Key">
            <input type="number" name="questions[${questionIndex}][weight]" placeholder="Weight">
        `;
        document.getElementById('questions').appendChild(questionDiv);
        
        questionIndex++; // Tambahkan indeks untuk pertanyaan berikutnya
    });
</script>



@stop
