<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    use HasFactory;

    public static function getData($num){

      $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
      $api_key = env('CMC_KEY');

      $parameters = [
        'start' => '1',
        'limit' => $num,
        'convert' => 'USD'
      ];

      $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: '.$api_key
      ];
      $qs = http_build_query($parameters);
      $request = "{$url}?{$qs}";

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => $request,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => 1
      ));

      $response = curl_exec($curl);
      $json = json_decode($response);

      curl_close($curl);
      return $json->data;
    }
}
