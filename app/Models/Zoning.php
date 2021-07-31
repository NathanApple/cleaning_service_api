<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zoning extends Model
{
    use HasFactory;
    //
    public function task(){
        return $this->belongsTo(Task::class, 'task_id');
    }

    use SoftDeletes;
}
