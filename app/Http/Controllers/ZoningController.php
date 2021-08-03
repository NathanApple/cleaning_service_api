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
        $response = $this->instantCreateZoning($request->all());
        return response()->json($response);
    }
}
