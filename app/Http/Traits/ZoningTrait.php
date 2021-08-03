<?php

namespace App\Http\Traits;

use App\Models\Zoning;

/**
 * 
 */
trait ZoningTrait
{
    public function createZoning($request){
        $zoning = new Zoning();
        $zoning->task_id = $request['task_id'];
        $zoning->zoning_name = $request['zoning_name'];

        $zoning->save();
        return $zoning;
    }
}
