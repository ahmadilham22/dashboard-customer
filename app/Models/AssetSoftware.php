<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\User;
use Storage;

class AssetSoftware extends Model
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

    public function getUrlFileAttribute()
    {
        if($this->file){
            return Storage::disk(config('app.disk'))->url($this->file);
        }
    }

    public function getFileNameAttribute()
    {
        if($this->file){
            $name = collect(explode("/", $this->file));
            return $name->last();
        }
    }
}
