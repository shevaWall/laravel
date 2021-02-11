<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Task;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnValue;

class ElectronicQueueController extends Controller
{
    /**
     * отображение списка доступных задач
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $tasks = $this->getTasks();

        return view('electronic_queue')->with('tasks', $tasks);
    }

    /**
     * обновление счетчика задач
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addTask($id){
        Task::updateCounter($id);
        $tasks = $this->getTasks();

        Log::create([
            'task_id'   => $id,
            'status'    => 0
        ]);

        return view('electronic_queue')->with('tasks', $tasks);
    }

    /**
     * get all Tasks
     * @return Task[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getTasks(){
        return Task::all();
    }

    /**
     * принимает в работу последнее доступное задание со статусом 0
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function goWork(){
        $firstId = Log::where('status', 0)->first();
        Log::goWork();

        $tasks = $this->getTasks();

        return view('electronic_queue')
            ->with('worktask_id', $firstId->id)
            ->with('tasks', $tasks)
            ;
    }

    /**
     * отображение очереди невыполненных задач
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function queue(){
        $logs = Log::with('taskName')
            ->where('logs.status', 0)
            ->get()
        ;

        return view('queue')
            ->with('logs', $logs)
        ;
    }

}
