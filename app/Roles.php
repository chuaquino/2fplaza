<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
  public function users()
   {
       return $this->belongsTo('App\Users');
   }
}