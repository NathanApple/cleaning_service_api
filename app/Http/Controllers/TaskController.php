<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function create(Request $request){
        $task = new Task();
        $task->task_location = $request->task_location;
        $task->task_code = $request->task_code;
        $task->task_category = $request->task_category;

        $task->save();
        return response()->json($task);
    }
}
