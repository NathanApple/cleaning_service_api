<?php

namespace App\Http\Traits;

use App\Models\Zoning;

/**
 * 
 */
trait ZoningTrait
{
    use TaskTrait;

    public function createZoning($request){
        $zoning = new Zoning();
        $zoning->task_id = $request['task_id'];
        $zoning->zoning_name = $request['zoning_name'];

        $zoning->save();
        return $zoning;
    }

    public function instantCreateZoning($request){

        $new_request = [
            'task_location' => ($request['task_location'] ?? $request['zoning_name']),
            'task_code' => ($request['task_code'] ?? ''),
            'task_category' => $request['task_category'],
        ];
        $task = $this->createTask($new_request);

        $new_request = [
            'task_id' => $task['id'],
            'zoning_name' => $request['zoning_name'],
        ];

        $zoning = $this->createZoning($new_request);

        return compact('task', 'zoning');
    }
}
