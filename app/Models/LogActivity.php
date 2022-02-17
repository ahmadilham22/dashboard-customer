<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    // protected $fillable = [
    //     'user_id',
    //     'activity'
    // ];
    protected $table = 'log_activity';
    protected $fillable = [
        'user_id',
        'activity'
    ];
}