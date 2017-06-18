<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function products(Request $request, $category, $type, $alias)
    {
        $left_nav = parent::leftnavbar_prod_cur($type);
        $type_obj = Category::select('id', 'alias')
            ->where('alias', $type)->first();

        $obj = Product::select('id', 'name', 'alias', 'avatar', 'cook_time', 'recept_by', 'all_text', 'ingredients')
            ->where('alias', $alias)
            ->where('categ_id', $type_obj->id)
            ->first();
        $obj->ingredients = explode(';', $obj->ingredients);
        $obj_hashtag = $obj->hashtags()->first();
        $obj->hashtag = [
            'name' => $obj_hashtag->hashtag,
            'descript' => $obj_hashtag->hashtag_description()->first()->name
        ];

        $data = array(
            'navbars'       => $this->navbars,
            'obj'           => $obj,
            'navbar_items'  => $left_nav
        );
        return response()
            -> view('current_product', $data);
    }
}
