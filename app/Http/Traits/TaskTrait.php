<?php

namespace App\Http\Traits;

use App\Models\Task;
use Illuminate\Http\Client\Request;

/**
 * 
 */
trait TaskTrait
{
    public function createTask($request){
        $task = new Task();
        $task->task_location = $request['task_location'];
        $task->task_code = $request['task_code'];
        $task->task_category = $request['task_category'];

        $task->save();
        return $task;
    }
}
