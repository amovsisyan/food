<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Category;
class FoodController extends HomeController
{
    public function all($type){
        $left_nav = parent::leftnavbar_food_cur($type);
        $type_id_obj = Category::select('id','alias')->where('alias',$type)->first();
        $path_alias = $type_id_obj->alias;
        $type_id = $type_id_obj->id;
        $foods = Food::where('categ_id',$type_id)
            ->select('name', 'alias', 'avatar', 'cook_time', 'recept_by', 'all_text')
            ->get();
        foreach ($foods as $food){
            $food->all_text = substr($food->all_text, 0, 300);
        }
        $data = array('navbars' => $this->navbars,
                  'foods' => $foods,
                   'path_alias'=>$path_alias,
                   'navbar_items'=>$left_nav);
        return view('food_current_category',$data);
    }
    
    public function current($type,$alias){
        $left_nav = parent::leftnavbar_food_cur($type);
        $type_id_obj = Category::select('id', 'alias')->where('alias',$type)->first();
        $path_alias = $type_id_obj->alias;

        $obj = Food::where('alias',$alias)
            ->where('categ_id', $type_id_obj->id)
            ->select('name', 'alias', 'avatar', 'cook_time', 'recept_by', 'all_text', 'ingredients')
            ->first();
        $obj->ingredients = explode(';',$obj->ingredients);
        $data = array('navbars' => $this->navbars,
            'obj' => $obj,
            'path_alias'=>$path_alias,
            'navbar_items'=>$left_nav);
        return view('food_current',$data);
    }
}
