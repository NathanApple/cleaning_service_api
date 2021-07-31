<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZoningReport extends Model
{
    //
    protected $fillable = ['user_task_id', 'zoning_id'];
    use SoftDeletes;
}
