<?php

namespace App\Libraries;

use GuzzleHttp\Client;
use App\Http\Resources\OngkirResources;
use App\Http\Resources\Provinsi;
use App\Http\Resources\Kota;

class Rajaongkir
{
    private $api_key = '19a8c9405c2331c9cd6e36af32a3fa7e';
    private $base_url = 'https://api.rajaongkir.com/starter/';
    private $idKotaAsal = 501;
    private $idKotaTujuan;
    private $kurir = 'jne';
    private $berat = '1000';
    private $client;

    public function __construct(){
        $this->client = new Client([
                            'base_uri' => $this->base_url,
                            'timeout'  => 5.0,
                            'headers' => [
                                'key' => $this->api_key
                            ]
                        ]);
    }

    public function allProvinsi() {

        return Provinsi::collection(collect($this->http('get', 'province')->results));

    }

    public function allKota() {
        return Kota::collection(collect($this->http('get', 'city')->results));
    }

    public function tujuan($idKotaTujuan){
        
        $this->idKotaTujuan = $idKotaTujuan;

        return $this;
    }

    public function kurir($kurir){
        
        $this->kurir = $kurir;

        return $this;
    }

    public function berat($berat){
        if($berat < 1000){
            $berat = 1000;
        }

        return $this->berat;
    }

    public function getBiaya() {
        
        return new OngkirResources($this->http('post', 'cost', [
            'origin' => $this->idKotaAsal,
            'destination' => $this->idKotaTujuan,
            'weight' => $this->berat,
            'courier' => $this->kurir
        ]));
    }

    private function http($type, $path, $params = []){
        
        if(strtoupper($type) == 'GET'){
            $response = $this->client->request($type, $path, [
                'query' => $params
            ]);
        }else{
            $response = $this->client->request($type, $path, [
                'form_params' => $params,
                'header' => [
                    'content-type' => 'application/x-www-form-urlencoded'
                ]
            ]);
        }
        
        $decode = json_decode($response->getBody());
        
        if($decode->rajaongkir->status->code !== 200){
            throw new Exception("Error!");
        }

        return $decode->rajaongkir;
    }
}