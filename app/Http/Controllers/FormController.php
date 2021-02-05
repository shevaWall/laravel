<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class FormController extends Controller
{
    private $method;

    public function form(){
        $this->method = $_SERVER['REQUEST_METHOD'];

        dump("global method: ".$this->method);

        return view('form')->with('method', $this->method);
    }

}
