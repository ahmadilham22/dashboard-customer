<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class AssetDomain extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function getPriceLabelAttribute()
    {
        if($this->price){
            return 'Rp. '.number_format($this->price,2,",",".");
        }
    }

    public function getValueLabelAttribute()
    {
        if($this->value){
            return 'Rp. '.number_format($this->value,2,",",".");
        }
    }
}
