<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name','slug'];

    public function articles(){
      return $this->hasMany("App\Article","user_id");
    }
}
