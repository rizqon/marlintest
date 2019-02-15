<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Kota extends JsonResource
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
            'id' => $this->city_id,
            'nama_kota' => $this->city_name,
            'kode_pos' => $this->postal_code,
            'type' => $this->type,
            'provinsi_id' => $this->province_id
        ];
    }
}
