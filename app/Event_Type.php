<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Type extends Model
{
    //
    protected $table="event_type";

    protected $guarded = ['id'];
     protected $primaryKey = 'id';

}
