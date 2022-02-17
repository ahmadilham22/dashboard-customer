<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\User;
use App\Http\Controllers\Controller;

class AssetCopyRight extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function scopeByUser($query, User $user)
    {
        // If role admin show all data
        if (!$user->isAdmin()) {
            return $query->where('user_id', $user->id);
        }

        return $query;
    }

    public function getPriceLabelAttribute()
    {
        if($this->price){
            return 'Rp. '.number_format($this->price,2,",",".");
        }
    }

    public function getValueAttribute()
    {
        return $this->getAmortization()->current_value;
    }

    public function getAmortization()
    {
        return Controller::getAmortization($this->date, $this->price,$this->year);
    }
}
