<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Provinsi extends JsonResource
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
            'id' => $this->province_id,
            'provinsi' => $this->province
        ];
    }
}
