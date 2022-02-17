<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{AssetCopyRight, AssetDataCollection, AssetInsight, AssetModel, AssetProduct, AssetSoftware, HistoryDataCollection};
use Illuminate\Support\Facades\Auth;
use Carbon\{Carbon, CarbonPeriod};

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function chartDataCollectionV2(Request $request)
    {
        $from = HistoryDataCollection::orderBy('date')->first()->date;
        $to = now()->subDay(1)->format('Y-m-d');
        $groupBy = $request->groupBy ?? 'date';
        $field = $request->field ?? 'total_data';

        // $period = CarbonPeriod::create()
        $history = HistoryDataCollection::select('*', DB::raw('DATE_FORMAT(date,"%m") as month'))
                    ->orderBy('date')->get();
                    // ->groupBy('data_collection_id');
        $dataCollections = AssetDataCollection::get();
        $period = CarbonPeriod::create(Carbon::createFromFormat('Y-m-d', $from), Carbon::createFromFormat('Y-m-d', $to))->toArray();

        $series = [];
        foreach($dataCollections as $item){
            if($item->total_data){
                $data = [];
                foreach($period as $date){
                    $value = 0;
                    $x = $date->format('d/m/y');
                    $exist = $history->where('data_collection_id', $item->id)->where('date',$date->format('Y-m-d'))->first();
                    if($exist){
                        $value = $exist[$field];
                    }
                    $data[] = [
                        'x' => $x,
                        'value' => $value,
                    ];
                }

                $series[] = [
                    'data' => $data,
                    'name' => $item->name,
                ];
            }

        }

        $ret = [
            'series' => $series
        ];

        return $ret;
    }

    public function chartValuasi(Request $request)
    {
        $product = AssetProduct::get()->sum('value');
        $dataCollection = AssetDataCollection::get()->sum('value');
        $copyRight = AssetCopyRight::get()->sum('value');
        $model = AssetModel::get()->sum('value');
        $software = AssetSoftware::get()->sum('value');

        $series = [
            [
                'data' => [[ 'x'=> 'Valuasi', 'value' => $product]],
                'name' => 'Product',
            ],
            [
                'data' => [[ 'x'=> 'Valuasi', 'value' => $dataCollection]],
                'name' => 'Data Collection',
            ],
            [
                'data' => [[ 'x'=> 'Valuasi', 'value' => $copyRight]],
                'name' => 'Copy Right',
            ],
            [
                'data' => [[ 'x'=> 'Valuasi', 'value' => $model]],
                'name' => 'Model',
            ],
            [
                'data' => [[ 'x'=> 'Valuasi', 'value' => $software]],
                'name' => 'Software',
            ],
        ];

        $ret = [
            'series' => $series
        ];

        return $ret;
    }
}