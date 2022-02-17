<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function guzzlePost($body, $server, $authorization = false)
    {
        $arr_post = [   
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json'
            ],
            'body' => json_encode($body)
        ];

        if($authorization !== false){
            $arr_post['headers']['Authorization'] = $authorization;
        }

        $client = new \GuzzleHttp\Client();

        $response = $client->request("POST", $server, $arr_post);
        $data = json_decode($response->getBody()->getContents());

        return $data;
    }

    public static function getSourceCount($from,$to,$source,$query="content:*")
    {
        $from = Carbon::createFromFormat('Y-m-d', $from)->format('d/m/Y');
        $to = Carbon::createFromFormat('Y-m-d', $to)->format('d/m/Y');
        $range = $from.'-'.$to;
        $body = [
            "query" => $query,
            "range" => $range,
            "source" => $source,
        ];

        // if (strpos($source, 'dw_') !== false) {
        //     $host = config('app.api_es_dw')."api/source/count";
        // } else {
            $host = config('app.api_es')."api/source/count";
        // }

        $api_data = Self::guzzlePost($body, $host);

        if($api_data->status){
            return $api_data->data->total;
        }

        return 0;
    }

    public static function getAmortization($from, $value, $period, $type='year')
    {
        $amortization = $value/$period;
        $start = Carbon::createFromFormat('Y-m-d', $from);
        if($type == 'month'){
            $diff = $start->diffInMonths(now());
        } else {
            $diff = $start->diffInYears(now());
        }
        $current_value = $value-($amortization*$diff);
        $current_value_label = 'Rp. '.number_format($current_value,2,",",".");
        $amortization_label = 'Rp. '.number_format($amortization,2,",",".");

        $ret = (object)[
            'amortization' => $amortization,
            'current_value' => $current_value,
            'amortization_label' => $amortization_label,
            'current_value_label' => $current_value_label,
        ];

        return $ret;
    }
}
