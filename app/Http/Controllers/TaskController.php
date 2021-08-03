<?php

namespace App\Http\Controllers;

use App\Http\Traits\TaskTrait;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    use TaskTrait;

    public function create(Request $request){
        $task = $this->createTask($request->all());
        return response()->json($task);
    }

    public function view(Request $request){
        // $user_tasks = DB::table('user_tasks')

        // ->whereDate('datetime_start', Carbon::today())
        // ->where('user_id', $user_id)
        // ->get();
    
        $query = Task::query();

        if (isset($request->task_category)){
            $query->where('task_category', $request->task_category);
        }

        if (isset($request->task_location)) {
            $query->where('task_location', 'like', "%$request->task_location%");
        }

        $task = $query->get();

        return response()->json(compact('task'));
    }

    
}
