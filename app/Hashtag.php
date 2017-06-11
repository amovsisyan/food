<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $table = 'hashtags';

    public function products(){
        return $this->belongsToMany('App\Products', 'product_hashtag');
    }

    public function hashtag_description(){
        return $this->belongsTo('App\HashtagsDescription', 'hashtag_desc_id');
    }
}
