<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Timezone extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}
