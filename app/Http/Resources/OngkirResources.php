<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Paket;

class OngkirResources extends JsonResource
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
            'kota_asal' => $this->origin_details->city_name,
            'kota_tujuan' => $this->destination_details->city_name,
            'kurir' => $this->results[0]->name,
            'kode_kurir' => $this->results[0]->code,
            'paket' => Paket::collection(collect($this->results[0]->costs))
        ];
    }
}
