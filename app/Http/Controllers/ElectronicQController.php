<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElectronicQController extends Controller
{
    public function index(){
        $logs = DB::table('tasks')
            ->leftJoin('logs','logs.task_id', '=', 'tasks.id')
            ->where('logs.status', '<>', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('electronic_q')->with('logs', $logs);
    }
}
