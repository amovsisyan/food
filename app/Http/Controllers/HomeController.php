<?php

namespace App\Http\Controllers;
use App\Cocktail;
use App\Food;
use App\Mslide;
use App\Navbar;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public $navbars;
    public function __construct(){
        $this->navbars = Navbar::all();     
    }

    public function index(){
        $slides = Mslide::all();

        $mostpop_s = DB::table('most_pop')->
        leftJoin('categories', function ($join) {
            $join->on('categories.id', '=', 'most_pop.categ_id');
        })->
        leftJoin('navbars', function ($join) {
            $join->on('categories.main_category_id', '=', 'navbars.id');
        })
            ->select('most_pop.avatar', 'most_pop.alias', 'most_pop.name',
                'categories.alias as cat_alias','navbars.alias as nav_alias')
            ->get();

        $most_foods = Food::where('status',2)->
        leftJoin('categories', function ($join) {
            $join->on('categories.id', '=', 'foods.categ_id');
        })->
        leftJoin('navbars', function ($join) {
            $join->on('categories.main_category_id', '=', 'navbars.id');
        })
            ->select('foods.avatar', 'foods.alias', 'foods.name',
                'categories.alias as cat_alias','navbars.alias as nav_alias')
            ->get();

        $most_cocktails = Cocktail::where('status',2)->
        leftJoin('categories', function ($join) {
            $join->on('categories.id', '=', 'cocktails.categ_id');
        })->
        leftJoin('navbars', function ($join) {
            $join->on('categories.main_category_id', '=', 'navbars.id');
        })
            ->select('cocktails.avatar', 'cocktails.alias', 'cocktails.name',
                'categories.alias as cat_alias','navbars.alias as nav_alias')
            ->get();

        return view('welcome',
            ['navbars' => $this->navbars,
            'slides' => $slides,
            'mostpop_s' => $mostpop_s,
            'most_foods' => $most_foods,
            'most_cocktails' => $most_cocktails]
        );
    }

    public function leftnavbar(){
        $data = Category::select( 'categories.name as cat_name', 'navbars.name as nav_name',
            'categories.alias as cat_alias','navbars.alias as nav_alias' )
            ->leftJoin('navbars', function ($join) {
                $join->on('navbars.id', '=', 'categories.main_category_id');
            })->get();
        $arr_data = [];

        foreach ($data as $d){
            $arr_data [$d->nav_alias][$d->nav_alias] = $d->nav_name;
            $arr_data [$d->nav_alias]['params'][$d->cat_alias] = $d ->cat_name;
        }

//        dd($arr_data);

        return $arr_data;

        //SELECT categories.name as cat_name, navbars.name as nav_name
        // FROM `categories`
        // left JOIN navbars on navbars.id = categories.main_category_id
    }

    public function leftnavbar_food_cur($type){

        $data = Category::select('categories.id as cat_id','categories.name as cat_name', 'navbars.name as nav_name','foods.name as food_name',
            'categories.alias as cat_alias','navbars.alias as nav_alias','foods.alias as f_alias')
            ->leftJoin('navbars', function ($join) {
                $join->on('navbars.id', '=', 'categories.main_category_id');
            })->leftJoin('foods', function ($join) use($type) {
                $join->on('categories.id', '=', 'foods.categ_id')
                ->where ('categories.alias',$type);
            })->get();
//        dd($data);
        $arr_data = [];


//        SELECT categories.id as cat_id, categories.name as cat_name, navbars.name as nav_name,foods.name as food_name
//         FROM `categories`
//         left JOIN navbars on navbars.id = categories.main_category_id
//         left JOIN foods on categories.id = foods.categ_id

        foreach ($data as $d){
            if(!empty($d ->food_name)){
                $arr_data [$d->nav_alias][$d ->nav_alias] = $d ->nav_name;
                $arr_data [$d->nav_alias]['params'] [$d ->cat_alias][$d ->cat_alias] = $d->cat_name;
                $arr_data [$d->nav_alias]['params'] [$d ->cat_alias]['params'][$d ->f_alias] = $d ->food_name;
            }else{
                $arr_data [$d->nav_alias][$d ->nav_alias] = $d ->nav_name;
                $arr_data [$d->nav_alias]['params'] [$d ->cat_alias][$d ->cat_alias] = $d ->cat_name;
            }

        }

//        dd($arr_data);

        return $arr_data;
    }


    public function leftnavbar_cockt_cur($type){

        $data = Category::select('categories.id as cat_id','categories.name as cat_name', 'navbars.name as nav_name','cocktails.name as cockt_name',
            'categories.alias as cat_alias','navbars.alias as nav_alias','cocktails.alias as c_alias')
            ->leftJoin('navbars', function ($join) {
                $join->on('navbars.id', '=', 'categories.main_category_id');
            })->leftJoin('cocktails', function ($join) use($type) {
                $join->on('categories.id', '=', 'cocktails.categ_id')
                    ->where ('categories.alias',$type);
            })->get();

        $arr_data = [];


//        SELECT categories.id as cat_id, categories.name as cat_name, navbars.name as nav_name,foods.name as food_name
//         FROM `categories`
//         left JOIN navbars on navbars.id = categories.main_category_id
//         left JOIN foods on categories.id = foods.categ_id

        foreach ($data as $d){
            if(!empty($d ->cockt_name)){
                $arr_data [$d->nav_alias][$d ->nav_alias] = $d ->nav_name;
                $arr_data [$d->nav_alias]['params'] [$d ->cat_alias][$d ->cat_alias] = $d->cat_name;
                $arr_data [$d->nav_alias]['params'] [$d ->cat_alias]['params'][$d ->c_alias] = $d ->cockt_name;
            }else{
                $arr_data [$d->nav_alias][$d ->nav_alias] = $d ->nav_name;
                $arr_data [$d->nav_alias]['params'] [$d ->cat_alias][$d ->cat_alias] = $d ->cat_name;
            }

        }


        return $arr_data;
    }
}
