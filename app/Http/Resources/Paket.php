<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Paket extends JsonResource
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
            'nama' => $this->service,
            'deskripsi' => $this->description,
            'harga' => number_format($this->cost[0]->value),
            'estimasi' => $this->cost[0]->etd . ' Hari'
        ];
    }
}