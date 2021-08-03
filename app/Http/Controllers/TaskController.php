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

    
}
