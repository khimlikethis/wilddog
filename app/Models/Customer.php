<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'address',
        'phone_number',
        'salary',
        'email',
        'active_status',
        'active_link',
        'avatar_pic',
    ];
}
