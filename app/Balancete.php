<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balancete extends Model
{
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
