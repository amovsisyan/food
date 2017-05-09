<?php

namespace App\Http\Controllers;

use App\Cocktail;
use App\Food;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use PhpParser\Node\Stmt\Throw_;
use Route;
use App\Navbar;
use App\Category;
class CategoriesController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function category()
    {
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

    public function current_category(Request $request, $type)
    {
        $category = $request->segment(1);
        $type_id_obj = Category::select('id')->where('alias',$type)->first();
        $type_id = $type_id_obj->id;
        switch ($category) {
            case 'food':
                $left_nav = parent::leftnavbar_food_cur($type);
                $data = Food::where('categ_id',$type_id)
                    ->select('name', 'alias', 'avatar', 'cook_time', 'recept_by', 'all_text')
                    ->get();
                break;
            case 'cocktail':
                $left_nav = parent::leftnavbar_cockt_cur($type);
                $data = Cocktail::where('categ_id',$type_id)
                    ->select('name', 'alias', 'avatar', 'cook_time', 'recept_by', 'all_text')
                    ->get();
                break;
        }
        if(!isset($data)) {
            $result = array('error' => true,
                          'response' => 'Bad Request');
            return view('cocktail-section/cocktail_current_category',$result);
        } else {
            foreach ($data as $d){
                $d->all_text = substr($d->all_text, 0, 300);
            }
        }
        $result = array('error' => false,
                      'navbars' => $this->navbars,
                      'data' => $data,
                      'navbar_items'=>$left_nav);
        return view('current_category',$result);
    }
 }
