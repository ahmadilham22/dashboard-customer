<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class AssetClippingOnline extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function client()
    {
        return $this->belongsTo(AssetClient::class, 'client_id');
    }

    public function getDateNewsAttribute()
    {
        return $this->start_date_news.' - '.$this->end_date_news;
    }
}
