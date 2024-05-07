<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    
    protected $table = 'tasks';

    protected $fillable = [
        'subjects_id',
        'user_id',
        'task_title',
        'number_of_questions',
        'start_time',
        'end_time',
        'slug',
        'classroom'
    ];



    public function subject()
    {
    return $this->belongsTo(Subject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function assessments()
    {
    return $this->hasOne(Assessment::class);
    }

    public function status()
    {
        return $this->hasOne(Status::class);
    }

}
