<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
     protected $table="event";

    protected $guarded = ['id'];
     protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    
  
}
