<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Zoning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\TaskController;
use App\Http\Traits\TaskTrait;
use App\Http\Traits\ZoningTrait;
use Illuminate\Support\Facades\DB;

class ZoningController extends Controller 
{
    use TaskTrait;
    use ZoningTrait;
    //
    public function create(Request $request){
        $zoning = $this->createTask($request->all());
        return response()->json($zoning);
    }

    public function view(Request $request){
        // $query = DB::table('zonings')
        //             ->where('task_id', $request->task_id)
        //             ->get();

        // $query = Zoning::all()
        //         ->where('task_id', $request->task_id);
        // $message = "";

        if ($request->view == "complete" ) {
            $query = DB::table('zoning_details')
                    ->select('*', 'zoning_details.id as detail_id')
                    ->rightJoin('zonings', 'zoning_details.zoning_id', '=', 'zonings.id' )
                    ->where('task_id', $request->task_id)
                    ->get();

            $zoning = [];

            
            foreach ($query as $key => $item) {
                // Tbh there is some bs error when +1 is removed
                $zoning[$item->zoning_id][$key+1] = $item;
            }
            
            ksort($zoning, SORT_NUMERIC);

        } else {
            $zoning = Zoning::where('task_id', $request->task_id)
                    ->get();
        }

        return response()->json($zoning, 200);
        // return compact('query');

    }

    public function instantCreate(Request $request){
        $response = $this->instantCreateZoning($request->all());
        return response()->json($response);
    }
}
