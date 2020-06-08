<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id','subject_id','title','slug','body'];
    protected $with=["user","subject"];

    public function user(){
      return $this->belongsTo("App\User","user_id");
    }

    public function subject(){
      return $this->belongsTo("App\Subject","subject_id");
    }

    public function getRouteKeyName(){
      return "slug";
    }

}
