<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use App\Navbar;
use App\Category;
class Categories extends HomeController
{
    public function food(){
       $left_nav = parent::leftnavbar();

       $alias = Route::getCurrentRoute()->getPath();
       $category_id = Navbar::select('id')->where('alias',$alias)->first();
       $foods = Category::select('name','alias','avatar')->where('main_category_id',$category_id->id)->get();
       $data = array('navbars' => $this->navbars,
                  'foods' => $foods,
                    'navbar_items' => $left_nav);
        return view('food_category',$data);
    }
    
    public function cocktail(){
        $left_nav = parent::leftnavbar();

       $alias = Route::getCurrentRoute()->getPath();
       $category_id = Navbar::select('id')->where('alias',$alias)->first();
       $cocktails = Category::select('name','alias','avatar')->where('main_category_id',$category_id->id)->get();
       $data = array('navbars' => $this->navbars,
                  'cocktails' => $cocktails,
                    'navbar_items' => $left_nav);
       return view('cocktail_category',$data);
    }
    
 }
