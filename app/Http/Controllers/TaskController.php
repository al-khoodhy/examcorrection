<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use App\Models\User;
use App\Models\Task;
use App\Models\Status;
use App\Models\Question;
use App\Http\Controllers\Voyager\VoyagerBaseController;

class TaskController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        // dd($request);
        // Validasi data yang diterima dari form
        $request->validate([
            'subjects_id' => 'required|integer',
            'user_id' => 'required|integer',
            'task_title' => 'required|string',
            'number_of_questions' => 'required|integer',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'slug' => 'required|string',
            'classroom' => 'required|string',
        ]);

        // Simpan data ke tabel Tasks
        $task = Task::create([
            'subjects_id' => $request->subjects_id,
            'user_id' => $request->user_id,
            'task_title' => $request->task_title,
            'number_of_questions' => $request->number_of_questions,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'slug' => $request->slug,
            'classroom' => $request->classroom,
        ]);
        
        // Ambil semua user yang memiliki classroom yang sama dengan task yang baru ditambahkan
        $users = \App\Models\User::where('classroom', $request->classroom)->get();

        // Buat status baru untuk setiap user yang memiliki classroom yang sama
        foreach ($users as $user) {
            Status::create([
                'user_id' => $user->id,
                'task_id' => $task->id,
                'status' => 'kerjakan',
            ]);
        }

        // Jika task berhasil dibuat, lanjutkan untuk menambahkan pertanyaan
    if ($task) {
        // Ambil data pertanyaan dari form
        $questions = $request->input('questions');
        // dd($questions);
        // Iterasi setiap pertanyaan dan simpan ke dalam tabel Questions
        foreach ($questions as $questionData) {
            $question = new Question();
            $question->task_id = $task->id;
            // dd($questionData);
            $question->question = $questionData['question'];
            $question->answer_key =$questionData['answer_key'];
            $question->weight = $questionData['weight'];
            $question->save();
        }
    }
        
        return redirect()->back()->with('success', 'Task berhasil ditambahkan.');
    }
}
