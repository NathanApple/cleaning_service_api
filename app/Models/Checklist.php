<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checklist extends Model
{
    public function zoning_detail(){
        return $this->belongsTo(ZoningDetail::class, 'zoning_detail_id');
    }
    //
    use SoftDeletes;
}
