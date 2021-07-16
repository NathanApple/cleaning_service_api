<?php

namespace App\Http\Controllers;

use App\Models\ZoningDetail;
use Illuminate\Http\Request;

class ZoningDetailController extends Controller
{
    public function create(Request $request){
        $detail = new ZoningDetail();
        $detail->zoning_id = $request->zoning_id;
        $detail->detail_title = $request->detail_title;

        $detail->save();
        return response()->json($detail);
    }
}
