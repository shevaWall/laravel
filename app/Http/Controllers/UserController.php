<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Debugbar;

class UserController extends Controller
{
    public function user($id = null){
        Debugbar::info($id);
        if($id){
            return view('user', compact('id'));
        }else{
            return view('user')->with('msg', "Пользователь не зарегистрирован");
        }
    }
}
