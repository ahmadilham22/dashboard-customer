<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class EngineXServer extends Model
{
    use SoftDeletes;
    protected $table        = 'operasional_enginexserver';
    protected $primaryKey   = 'id';
    protected $guarded = [];

    public function engine(){
        return $this->belongsTo(Engine::class,'id_engine','id_engine')->withDefault(function(){
            return new Engine;
        });
    }

    public function server(){
        return $this->belongsTo(Server::class,'id_server','id_server')->withDefault(function(){
            return new Server;
        });
    }
}
