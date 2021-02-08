<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class NamesController extends Controller
{
    public function index(){

//        $name = Name::find(1);
        $name = Name::namesOnLetter("С")->get();

        dd($name);
    }

    public function show($id){
        $name = Name::findOrFail($id);
        dd($name);
    }

    public function create(){
        $data=[
            'first_name' => 'Григорий',
            'second_name' => 'Фамилия',
        ];

        Name::create($data);
    }

    public function update($id){
        $name = Name::find($id);
        $name->first_name = "WWWWW";
        $name->save();
    }
}
