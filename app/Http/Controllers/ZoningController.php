<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Zoning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\TaskController;
use App\Http\Traits\TaskTrait;
use App\Http\Traits\ZoningTrait;

class ZoningController extends Controller 
{
    use TaskTrait;
    use ZoningTrait;
    //
    public function create(Request $request){
        $zoning = $this->createTask($request->all());
        return response()->json($zoning);
    }

    public function instantCreate(Request $request){
        
        $new_request = [
            'task_location' => ($request->task_code ?: $request->zoning_name),
            'task_code' => ($request->task_code ?: ''),
            'task_category' => $request->task_category,
        ];
        $task = $this->createTask($new_request);

        $new_request = [
            'task_id' => $task['id'],
            'zoning_name' => $request->zoning_name,
        ];

        $zoning = $this->createZoning($new_request);

        
        // $new_request->replace([
        //     'task_id' => $request->task_id,
        //     'zoning_name' => $request->zoning_name
        // ]);
        // $new = $this->create($new_request);
        
        // $task = new Task();
        // $task->task_location = $request->task_location;
        // $task->task_code = $request->task_code;
        // $task->task_category = $request->task_category;

        // $task->save();

        // $zoning = new Zoning();
        // $zoning->task_id = $request->task_id;
        // $zoning->zoning_name = $request->zoning_name;

        // $zoning->save();
        // return response()->json($task);

        return response()->json(compact('task', 'zoning'));
    }
}
