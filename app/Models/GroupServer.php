<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class GroupServer extends Model
{
    use SoftDeletes;
    protected $table        = 'operasional_group_server';
    protected $primaryKey   = 'id_group_server';
    protected $guarded = [];
}
