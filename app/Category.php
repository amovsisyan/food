<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function cocktails(){
        return $this->hasMany('App\Cocktail');
    }
    
    public function foods(){
        return $this->hasMany('App\Food');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }
}
