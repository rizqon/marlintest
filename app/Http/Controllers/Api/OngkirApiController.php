<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\Rajaongkir;

class OngkirApiController extends Controller
{
    public $ongkir;

    public function __construct()
    {
        $this->ongkir = new Rajaongkir;
    }
    public function getKota()
    {
        return response()->json($this->ongkir->allKota());
    }

    public function getProvinsi()
    {
        return response()->json($this->ongkir->allProvinsi());
    }

    public function getOngkir(Request $request)
    {
        return response()->json($this->ongkir->tujuan($request->idKotaTujuan)->getBiaya());
    }
}
