<?php

namespace App\Http\Controllers;

use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElectronicQueueController extends Controller
{
    private $r;

    public function index(Request $request){
        $this->r = $request->query();

        if(count($this->r) == 0)
            return $this->showTasks();

        if(isset($this->r['addTask'])){
            $id = $this->r['addTask'];
            $this->addTask($id);
            return $this->showTasks();
        }

        if(isset($this->r['workTask'])==null){
            $tasks = $this->Tasks();
            $worktask_id = $this->workTask();

            return view('electronic_queue')->with([
                'worktask_id' => $worktask_id,
                'tasks' => $tasks
            ]);
        }
    }

    /**
     * возвращает коллекцию с выборкой всех задач и счетчиком у них
     * @return \Illuminate\Support\Collection
     */
    private function Tasks(){
        return DB::table('tasks')->select('id', 'name', 'counter')->get();
    }

    /**
     * возвращает View для отображения всех текущих задач с их количеством
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    private function showTasks(){
        $tasks = $this->Tasks();
        return view('electronic_queue')->with('tasks', $tasks);
    }

    /**
     * @param $id - id задачи, которую нужно добавить
     * обновление счетчика в таблице tasks и добавление информации в таблицу logs
     */
    private function addTask($id){
        DB::table("tasks")
            ->where('id', $id)
            ->increment('counter');

        DB::table('logs')
            ->insert([
                'task_id' => $id,
                'status' => 0,
                'created_at' => now()
            ]);

//        return redirect('/');
    }

    /**
     * Переводит из status 0 в status 1 первого элемента в выборке из таблицы logs. Возвращает id этого элемента
     * @param null $id
     * @return mixed
     */
    private function workTask($id=null){
        $worktask_id = DB::table('logs')
            ->select('id')
            ->where('status', 0)
            ->first();

        DB::table('logs')
            ->where('id', $worktask_id->id)
            ->update([
                'status' => 1
            ]);

        return $worktask_id->id;
    }
}
