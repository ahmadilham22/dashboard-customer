<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class EngineXDatabase extends Model
{
    use SoftDeletes;
    protected $table        = 'operasional_enginexdatabase';
    protected $primaryKey   = 'id';
    protected $guarded = [];

    public function engine(){
        return $this->belongsTo(Engine::class,'id_engine','id_engine')->withDefault(function(){
            return new Engine;
        });
    }

    public function database(){
        return $this->belongsTo(Database::class,'id_database','id_database')->withDefault(function(){
            return new Database;
        });
    }
}
