<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Database extends Model
{
    use SoftDeletes;
    protected $table        = 'operasional_database';
    protected $primaryKey   = 'id_database';
    protected $guarded = [];

    public function server(){
        return $this->belongsTo(Server::class,'id_server','id_server');
    }
}
