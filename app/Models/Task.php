<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;


    public function scopeUpdateCounter($query, $id){
        $task = Task::findOrFail($id);

        return $query
            ->where('id', $id)
            ->update(['counter' => ++$task->attributes['counter']])
            ;
    }
}
