<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cocktail;
use App\Category;
class CocktailController extends HomeController
{
    public function all($type){
        $left_nav = parent::leftnavbar_cockt_cur($type);
        $type_id_obj = Category::select('id', 'alias')->where('alias',$type)->first();
        $path_alias = $type_id_obj->alias;
        $type_id = $type_id_obj->id;
        $cocktails = Cocktail::where('categ_id',$type_id)
            ->select('name', 'alias', 'avatar', 'cook_time', 'recept_by', 'all_text')
            ->get();
        foreach ($cocktails as $cocktail){
            $cocktail->all_text = substr($cocktail->all_text, 0, 300);
        }
        $data = array('navbars' => $this->navbars,
            'cocktails' => $cocktails,
            'path_alias'=>$path_alias,
            'navbar_items'=>$left_nav);
        return view('cocktail_current_category',$data);
    }

    public function current($type,$alias){
        $left_nav = parent::leftnavbar_cockt_cur($type);
        $type_id_obj = Category::select('id', 'alias')->where('alias',$type)->first();
        $path_alias = $type_id_obj->alias;

        $obj = Cocktail::where('alias',$alias)
            ->where('categ_id', $type_id_obj->id)
            ->select('name', 'alias', 'avatar', 'cook_time', 'recept_by', 'all_text', 'ingredients')
            ->first();
        $obj->ingredients = explode(';',$obj->ingredients);
        $data = array('navbars' => $this->navbars,
            'obj' => $obj,
            'path_alias'=>$path_alias,
            'navbar_items'=>$left_nav);
        return view('cocktail_current',$data);
    }
}
