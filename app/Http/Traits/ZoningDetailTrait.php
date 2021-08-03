<?php

namespace App\Http\Traits;

use App\Models\ZoningDetail;

/**
 * 
 */
trait ZoningDetailTrait
{
    public function createDetail($request){
        $detail = new ZoningDetail();
        $detail->zoning_id = $request['zoning_id'];
        $detail->detail_title = $request['detail_title'];

        $detail->save();
        return $detail;
    }
}
