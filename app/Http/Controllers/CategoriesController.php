<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Navbar;
use App\Category;
class CategoriesController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function category(Request $request, $category_alias)
    {
       $left_nav = parent::leftnavbar();
       $category_id = Navbar::select('id')->where('alias', $category_alias)->first();
       $data = Category::select('name', 'alias', 'avatar')->where('main_category_id', $category_id->id)->get();

       $response = array(
           'navbars'        => $this->navbars,
           'data'           => $data,
           'navbar_items'   => $left_nav,
       );
        return response()
            -> view('categories', $response);
    }

    public function current_category(Request $request, $category, $type)
    {
        $type_obj = Category::select('id')
            ->where('alias', $type)->first();
        $type_id = $type_obj->id;
        $left_nav = parent::leftnavbar_prod_cur($type);
        $data = Product::select('name', 'alias', 'avatar', 'cook_time', 'recept_by', 'all_text')
            ->where('categ_id', $type_id)->get();

        if(!isset($data)) {
            $result = array(
                'error'     => true,
                'response'  => 'Bad Request');
            return view('current_category', $result);
        } else {
            foreach ($data as $d){
                $d->all_text = substr($d->all_text, 0, 300);
            }
        }
        $result = array(
            'error'         => false,
            'navbars'       => $this->navbars,
            'data'          => $data,
            'navbar_items'  => $left_nav
        );
        return response()
            -> view('current_category',$result);
    }
 }
