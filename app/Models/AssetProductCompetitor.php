<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class AssetProductCompetitor extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
}
