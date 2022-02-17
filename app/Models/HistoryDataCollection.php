<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryDataCollection extends Model
{
    protected $guarded = [];

    public function getTotalDataLabelAttribute()
    {
        // if($this->total_data){
            return number_format($this->total_data,0,",",".");
        // }
    }

    public function getNewDataLabelAttribute()
    {
        // if($this->new_data){
            return number_format($this->new_data,0,",",".");
        // }
    }

    public function getMissingDataLabelAttribute()
    {
        // if($this->missing_data){
            return number_format($this->missing_data,0,",",".");
        // }
    }
}
