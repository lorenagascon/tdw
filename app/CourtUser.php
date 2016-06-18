<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CourtUser extends Authenticatable
{
    protected $table = "courts_users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id', 'reservation_date', 'courts_id', '2nd_player', '3rd_player', '4th_player'
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
