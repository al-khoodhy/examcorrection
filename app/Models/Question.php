<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    
    protected $fillable = [
        'task_id',
        'question',
        'answer_key',
        'weight'
    ];

    public function task()
    {
    return $this->belongsTo(Task::class);
    }

    public function student_answers()
    {
        return $this->hasMany(StudentAnswer::class);
    }
    
    public function assignments()
    {
        return $this->hasOne(Assignment::class);
    }

}
