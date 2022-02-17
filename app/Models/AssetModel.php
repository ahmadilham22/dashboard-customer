<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\User;

class AssetModel extends Model
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

    public function getValueLabelAttribute()
    {
        if($this->value){
            return 'Rp. '.number_format($this->value,2,",",".");
        }
    }
}
