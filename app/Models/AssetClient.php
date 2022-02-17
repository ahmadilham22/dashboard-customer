<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class AssetClient extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
}
