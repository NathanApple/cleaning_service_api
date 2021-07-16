<?php

namespace App\Http\Controllers;

use App\Models\Zoning;
use Illuminate\Http\Request;

class ZoningController extends Controller
{
    //
    public function create(Request $request){
        $zoning = new Zoning();
        $zoning->task_id = $request->task_id;
        $zoning->zoning_name = $request->zoning_name;

        $zoning->save();
        return response()->json($zoning);
    }
}
