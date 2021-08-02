<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistReport extends Model
{
    //
    protected $attributes = [
        "checklist_status" => 0,
    ];

    protected $fillable = [
        "zoning_detail_report_id", "checklist_id"
    ];
}
