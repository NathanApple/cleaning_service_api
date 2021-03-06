<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\ChecklistReport;
use App\Models\Task;
use App\Models\UserTask;
use App\Models\Zoning;
use App\Models\ZoningDetail;
use App\Models\ZoningDetailReport;
use App\Models\ZoningReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserTaskController extends Controller
{
    public function create(Request $request){
        $user_id = $request->user_id;
        $task_id = $request->task_id;
        $datetime_start = $request->datetime_start;
        $datetime_end = $request->datetime_end;

        $userTask = new UserTask();
        $userTask->user_id = $user_id;
        $userTask->task_id = $task_id;
        $userTask->datetime_start = $datetime_start;
        $userTask->datetime_end = $datetime_end;

        $userTask->save();

        // TODO Mass Assign to user task from all the task etc etc

        // Mass Assign Zoning Reports
        $zoning_data = Zoning::all()->where('task_id', $task_id);

        $zoning= [];
        $zoning_detail = [];
        $checklist = [];
        $userTaskId = $userTask['id'];

        $zoning_counter = 0;
        $zoning_detail_counter = 0;
        $checklist_counter = 0;
        foreach ($zoning_data as $zd) {
            $zoning_counter++;
            $zoning_report = ZoningReport::create(['user_task_id' => $userTaskId,
                                    'zoning_id' => $zd['id']]);

            $zoning_report_data = ZoningDetail::get()->where('zoning_id', $zd['id']);
            // $zoning_report_data = DB::table('zoning_details')
            //                                     ->where('zoning_id', $zd['id'])
            //                                     ->get();

            foreach ($zoning_report_data as $zrd) {
                $zoning_detail_counter++;
                $zoning_detail_report = ZoningDetailReport::create(['zoning_report_id' => $zoning_report['id'], 
                'zoning_detail_id' => $zrd['id']]);

                // For checklist
                $checklist_data = Checklist::get()->where('zoning_detail_id', $zrd['id']);
                
                foreach ($checklist_data as $cd) {
                    $checklist_counter++;
                    $checklist_report = ChecklistReport::create(["zoning_detail_report_id" => $zoning_detail_report['id'],
                    'checklist_id' => $cd['id']]);
                }
                
            }

        }

        return response()->json(["message" => "Success",
                            "zoning_report_inserted" => $zoning_counter,
                            "detail_report_inserted" => $zoning_detail_counter,
                            "checklist_inserted" => $checklist_counter], 201);
        // return response()->json($userTask);
    }

    public function viewTodayTask(){
        $user_id = Auth::user()->id;

        $user_tasks = DB::table('user_tasks')
            ->select('*','user_tasks.id as user_task_id')
            ->join('tasks', 'tasks.id', '=', 'user_tasks.task_id')
            ->whereDate('datetime_start', Carbon::today())
            ->where('user_id', $user_id)
            ->get();
        // $user_tasks = UserTask::get()->whereDate('datetime_start', Carbon::today())
        // ->where('user_id', $user_id);

        $user_tasks->transform(function($i) {
            if ($i->task_code != "") {
                $i->using_code = true;
                // set($i->using_code );
            } else {
                $i->using_code = false;
            }

            unset($i->task_code);
            return $i;
        });
        return compact('user_tasks');
    }
}
