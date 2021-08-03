<?php

namespace App\Http\Controllers;

use App\Http\Traits\TaskTrait;
use App\Http\Traits\ZoningDetailTrait;
use App\Http\Traits\ZoningTrait;
use App\Models\ZoningDetail;
use Illuminate\Http\Request;

class ZoningDetailController extends Controller
{
    use ZoningDetailTrait;
    use ZoningTrait;

    public function create(Request $request){
        $detail = $this->createDetail($request->all());
        return response()->json($detail);
    }

    public function instantCreate(Request $request){
        $new_request = array_merge($request->all(), ['zoning_name' => ($request->zoning_name ?: $request->detail_title)]);
        $instantData = $this->instantCreateZoning($new_request);

        $new_request = [
            'zoning_id' => $instantData['zoning']['id'],
            'detail_title' => $request->detail_title,
        ];

        $detail = $this->createDetail($new_request);
        $task = $instantData['task'];
        $zoning = $instantData['zoning'];
        return response()->json(compact('task', 'zoning', 'detail'), 201);
    }

    
}
