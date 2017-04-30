<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use App\Navbar;
use App\Category;
class CategoriesController extends HomeController
{
    public function category(){
       $left_nav = parent::leftnavbar();
       $alias = Route::getCurrentRoute()->getPath();
       $category_id = Navbar::select('id')->where('alias',$alias)->first();
       $data = Category::select('name','alias','avatar')->where('main_category_id',$category_id->id)->get();

       $response = array('navbars' => $this->navbars,
                    'data' => $data,
                    'navbar_items' => $left_nav,
                    'key_alias'=>$alias);

        return view('categories',$response);
    }
 }
