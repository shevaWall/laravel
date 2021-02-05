<?php

namespace App\Http\Controllers;

use Debugbar;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function user ($id)
    {
        Debugbar::info("param 1: ". $id);
        return view('user', compact('id'));
    }
}
