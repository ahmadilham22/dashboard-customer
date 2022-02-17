<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ServerXGroup extends Model
{
    use SoftDeletes;
    protected $table        = 'operasional_serverxgroup';
    protected $primaryKey   = 'id';
    protected $guarded = [];

    public function server(){
        return $this->belongsTo(Server::class,'id_server','id_server');
    }

    public function group(){
        return $this->belongsTo(GroupServer::class,'id_group_server','id_group_server');
    }
}
