<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activitylog extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'log',
        'u_id',
        
    ];
}
