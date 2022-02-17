<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Storage;

class AssetReport extends Model
{
    use SoftDeletes;
    protected $guarded = [];

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

    public function client()
    {
        return $this->belongsTo(AssetClient::class, 'client_id');
    }
}
