<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Engine extends Model
{
    use SoftDeletes;
    protected $table        = 'operasional_engine';
    protected $primaryKey   = 'id_engine';
    protected $guarded = [];
}
