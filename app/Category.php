<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['category_name'];

    public function Posts(){
      return  $this->hasMany('App\Post','category_id','cat_id');
    }

    public function getPostCountAttribute()
    {
        return $this->Posts->count();
    }
}
