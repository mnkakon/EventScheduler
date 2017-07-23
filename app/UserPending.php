<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPending extends Model
{
    //]
    protected $table="userpending";

    protected $guarded = ['id'];
     protected $primaryKey = 'id';
     protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
