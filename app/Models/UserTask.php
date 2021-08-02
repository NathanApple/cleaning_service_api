<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTask extends Model
{
    //
    protected $attributes = [
        'user_task_status' => 'Belum dikerjakan',
    ];
    

}
