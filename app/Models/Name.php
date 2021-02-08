<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    protected $fillable=[
        'first_name',
        'second_name'
    ];

    public function scopeNamesOnLetterP($query){
        return $query
            ->where('first_name', 'LIKE', 'П%')
            ->orWhere('second_name','LIKE','П%');
    }

    public function scopeNamesOnLetter($query, $letter){
        return $query
            ->where('first_name', 'LIKE',"$letter%")
            ->orWhere('second_name', 'LIKE', "$letter%")
            ;
    }
}
