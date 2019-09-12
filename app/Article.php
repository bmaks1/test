<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_article', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category',"id","id_category");
    }
}
