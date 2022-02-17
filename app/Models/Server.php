<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Server extends Model
{
    use SoftDeletes;
    protected $table        = 'operasional_server';
    protected $primaryKey   = 'id_server';
    protected $guarded = [];
}
