<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use App\Models\StudentAnswer;
use App\Models\Status;
use App\Http\Controllers\Voyager\VoyagerBaseController;

class UjianController extends VoyagerBaseController
{


    public function index(Request $request)
    {
        //url     
        $url = $request->getPathInfo();
        // Parsing URL
        $path = parse_url($url, PHP_URL_PATH);

        // Membagi path dengan delimiter '/'
        $parts = explode('/', $path);

        // Mengambil nilai slug
        $slug = end($parts);
        // dd($slug);
        $selfUser = Auth::user()->role->name;
        $task_title = "Ujian Esai Online";
        $valuee = 3;
        $questions = DB::table('tasks')
            ->join('questions', 'tasks.id', '=', 'questions.task_id')
            ->where('tasks.slug', $slug)
            ->select('questions.question','tasks.task_title','questions.id','tasks.id')
            ->get();
        // dd($questions);
        $title = $questions->first()->task_title;
        $task_id = $questions->first()->id;
        // dd($questions);
        if(Auth::user()->role->name == 'mahasiswa'){
            $view = 'ujian';
        }

        // dd($selfUser);
        return Voyager::view($view, compact(
            'questions',
            'title',
            'selfUser',
            'task_id'
        ));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $answers = $request->input('answers');
        $task_id = $request->input('task_id');

        // Simpan data ke tabel answers
        foreach ($answers as $key => $answer) {
            StudentAnswer::create([
                'question_id' => $answer['question_id'],
                'user_id' => $user_id,
                'answer' => $answer['answer']
            ]);
        }

        Status::where('user_id', $user_id)
                ->where('task_id', $task_id)
                ->update(['status' => 'proses']);
        
        return redirect()->back()->with('success', 'Task berhasil ditambahkan.');
    }

}
