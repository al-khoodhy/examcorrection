<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\TaskController;
use App\Libraries\OpenAI;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
use TCG\Voyager\Http\Controllers;



Route::get('/test', function () {
    $guru= "Komputer";
    $kunci_jawaban = "  Artificial intelligence (AI) is basically intelligence demonstrated by machines, in contrast to the natural intelligence displayed by humans and animals. AI research is concerned with developing machines that are able to perform tasks that typically require human intelligence, such as visual perception, speech recognition, decision-making, and learning.";
    $jawaban_siswa = "Artificial intelligence (AI) is the simulation of human intelligence processes by machines, especially computer systems.";
    
    $query = "
    Context:Kamu adalah Guru $guru yang sedang mengoreksi essay siswa.bandingkan kunci jawaban dan jawaban siswa.nilai dengan range 0 sampai 100 untuk jawaban siswa dengan format json {['siswa':'ID_SISWA','nilai':'NILAI_SISWA']} 

    kunci jawaban:
    $kunci_jawaban
    
    jawaban siswa 1:
    $jawaban_siswa
    
    jawaban siswa 2:
    $jawaban_siswa
    
    jawaban siswa 3:n
    $jawaban_siswa

    ";

        echo $query;
        die;
    $gpt = new OpenAI;
    $response = $gpt->prompt($query);
    dd($response);
});

Route::group(['prefix' => 'app'], function () {
    
    Voyager::routes();
    // Route::get('assessments/{slug}', ['uses' => 'UjianController@index','as' => 'index']);
    
    Route::get('assignment/{slug}', [UjianController::class, 'index']);
    
    Route::get('assignments/view/{slug}', [AssignmentController::class, 'indexFind']);
    Route::get('assessments/view/{slug}', [AssessmentController::class, 'indexFind']);
    

    Route::post('/assignment', [UjianController::class, 'store'])->name('ujian.store');
    Route::post('/assessment', [TaskController::class, 'store'])->name('tasks.store');

// Jika Anda ingin membuat halaman form untuk menambahkan task
Route::get('/assessment/add', function () {
    return view('vendor.voyager.assessments.add');
})->name('tasks.create');
});


