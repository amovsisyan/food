<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function carousel(){
        return $this->hasOne('App\Carousel');
    }

    public function hashtags(){
        return $this->belongsToMany('App\Hashtag', 'product_hashtag', 'product_id', 'hashtag_id');
    }
}
