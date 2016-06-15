<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Court extends Authenticatable
{

    protected $table = "courts";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active'
    ];

    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
