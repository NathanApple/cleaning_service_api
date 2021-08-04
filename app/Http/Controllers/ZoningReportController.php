<?php

namespace App\Http\Controllers;

use App\Models\ZoningReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ZoningReportController extends Controller
{
    //
    public function view(Request $request){
        // Note some weakness, you can see someone else task without login into them
        // Too lazy to implement security check

        $user_task_id = $request->user_task_id;

        $user_task = DB::table('user_tasks')
            ->select('task_code')
            ->join('tasks', 'tasks.id', '=', 'user_tasks.task_id')
            ->where('user_tasks.id', $user_task_id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($user_task->task_code != $request->task_code) {
            return response()->json([
                "message" => "Code given was empty or incorrect",
            ], 403);
        }

        $zoning_report = DB::table('zoning_reports')
            ->join('zonings', 'zonings.id', '=', 'zoning_reports.zoning_id')
            ->where('user_task_id', $request->user_task_id)
            ->get();
        return response()->json(compact('zoning_report'));
    }
}
