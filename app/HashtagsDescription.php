<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HashtagsDescription extends Model
{
    protected $table = 'hashtags_description';

    public function products(){
        return $this->hasMany('App\Hashtag');
    }
}
