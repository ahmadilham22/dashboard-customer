<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AssetDataCollection extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function lastData()
    {
        return $this->hasOne('App\Models\HistoryDataCollection','data_collection_id')->orderBy('date','desc');
    }

    public function histories()
    {
        return $this->hasMany('App\Models\HistoryDataCollection','data_collection_id')->orderBy('date','desc');
    }

    public function scopeByUser($query, User $user)
    {
        // If role admin show all data
        if (!$user->isAdmin()) {
            return $query->where('user_id', $user->id);
        }

        return $query;
    }

    protected function getValueAttribute(){
        return $this->price_per_data*$this->total_data;
    }

    public function getValueLabelAttribute()
    {
        if($this->value){
            return 'Rp. '.number_format($this->value,2,",",".");
        }
    }

    public function getPricePerDataLabelAttribute()
    {
        if($this->price_per_data){
            return 'Rp. '.number_format($this->price_per_data,2,",",".");
        }
    }

    public function getTotalDataAttribute($value)
    {
        if($this->lastData){
            return $this->lastData->total_data;
        }

        return $value;
    }

    public function getTotalDataLabelAttribute()
    {
        if($this->total_data){
            return number_format($this->total_data,0,",",".");
        }
    }

    public function getListSource()
    {
        $data = [
            'news',
            'media_public',
            'media_cybersecurity',
            'twitter',
            'twitter_retweet',
            'facebook',
            'youtube',
            'instagram',
            'facebook_comment',
            'instagram_comment',
            'dw_forum',
            'dw_forum_reply',
            'dw_raidforum',
            'dw_raidforum_reply',
            'dw_kilos',
            'dw_white_house',
            'dw_zone_h',
            'dw_blackhatworld_detail',
            'dw_blackhatworld_list',
            'dw_exploitdb_detail',
            'dw_exploitdb_list',
            'dw_hackthissite_detail',
            'dw_hackthissite_list',
            'dw_nulled_detail',
            'dw_nulled_list',
            'dw_seclists_detail',
            'dw_seclists_list',
            'dw_zerosec_detail',
            'dw_zerosec_list'
        ];

        return $data;
    }

    public function generateData($date=null)
    {
        $dataCollections = Self::get();
        if(!$date){
            $date = now()->subDay(1)->format('Y-m-d');
        }

        $dateBefore = Carbon::createFromFormat('Y-m-d', $date)->subDay(1)->format('Y-m-d');
        $controller = new Controller;

        foreach($dataCollections as $item){
            $from = '1970-01-01';
            $totalData = $controller->getSourceCount($from,$date,$item->source);
            $newData = $controller->getSourceCount($date,$date,$item->source);
            $dataBefore = HistoryDataCollection::where('data_collection_id',$item->id)->where('date', $dateBefore)->first();
            if($dataBefore){
                $missingData = $dataBefore->total_data + $newData - $totalData;
            } else {
                $missingData = 0;
            }

            HistoryDataCollection::firstOrCreate(
                [
                    'data_collection_id' => $item->id,
                    'date' => $date,
                ],
                [
                    'total_data' => $totalData,
                    'new_data' => $newData,
                    'missing_data' => $missingData
                ]
            );
        }
    }
}
