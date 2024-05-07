<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Assessment extends Model
{
    



    public function users()
    {
    return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
