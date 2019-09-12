<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    public function article()
    {
        return $this->belongsTo('App\Article',"id","id_article");
    }

    public $fillable = ['created_at'];

}
