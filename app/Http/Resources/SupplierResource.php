<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
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
            'supplier_name' => $this->supplier_name,
            'supplier_email' => $this->supplier_email,
            'supplier_phone' => $this->supplier_phone,
            'supplier_address' => $this->supplier_address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
