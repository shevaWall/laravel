<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeGoWork($query){
        return $query->where('status', 0)->first()->update(['status'=>1]);
    }

    /**
     * scope для невыполненных задач (в очереди)
     * @param $query
     * @return mixed
     */
    public function scopeIsQueued($query){
        return $query->where('status', 0);
    }

    public function scopeIsDone($query){
        return $query->where('status', 1);
    }

    /**
     * добавление отношений модели Task к модели Log. Одно невыполненное задание из таблицы Logs может иметь одно название задания из таблицы Tasks.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function taskName(){
        return $this->hasOne(Task::class, 'id', 'task_id');
    }
}
