<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function create(Request $request){
        $checklist = new Checklist();
        $checklist->zoning_detail_id = $request->zoning_detail_id;
        $checklist->checklist_title = $request->checklist_title;

        $checklist->save();
        return response()->json($checklist);
    }
}
