<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeaveTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'leave_type' => $this->leave_type,
            'day' => $this->day,
            'effect_salary' => $this->effect_salary,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
