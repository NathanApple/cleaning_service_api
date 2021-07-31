<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZoningDetail extends Model
{
    //
    public function zoning(){
        return $this->belongsTo(Zoning::class, 'zoning_id');
    }

    use SoftDeletes;
}
