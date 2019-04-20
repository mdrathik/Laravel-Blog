<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'body','views','tag','published','category_id','user_id'
    ];


    public function user(){
       return $this->belongsTo('App\User');
    }

    public function Category(){
        return $this->belongsTo('App\Category','category_id','cat_id');
    }

    public function Comments() {
        return $this->hasMany('App\Comment','post_id','id');
    }

    public function getCommentCountAttribute(){
        return $this->Comments->count();
    }

    public function commenters() {
        return $this->hasManyThrough('App\User', 'App\Comment','users.id','comments.id');
    }


}
