<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\UserTask;
use App\Models\Zoning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTaskController extends Controller
{
    public function create(Request $request){
        $user_id = $request->user_id;
        $task_id = $request->task_id;
        $datetime_start = $request->datetime_start;
        $datetime_end = $request->datetime_end;

        // $userTask = new UserTask();
        // $userTask->user_id = $user_id;
        // $userTask->task_id = $task_id;
        // $userTask->datetime_start = $datetime_start;
        // $userTask->datetime_end = $datetime_end;

        // $userTask->save();

        // TODO Mass Assign to user task from all the task etc etc

        // Mass Assign Zoning Reports
        $zoning_data = Zoning::all()->where('task_id', $task_id);

        $zoning = array();

        foreach ($zoning_data as $data) {
            
        }

        return response()->json(compact('task'));
        // return response()->json($userTask);
    }
}
